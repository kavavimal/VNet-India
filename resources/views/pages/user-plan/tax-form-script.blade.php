<div class="modal fade bd-example-modal-sm-tax" id="tax_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-1" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle-1">Add Taxation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="plan-tax-submit" data-url="{{route('tax-store')}}" data-id="id" data-name="tax-name">
                <div class="modal-body">
                    <input type="hidden" id="tax-id" class="id" name="id" value="0" />
                    <input type="hidden" id="type" name="type" value="add" />
                    <input type="hidden" id="sub_menu_id" name="sub_menu_id" value="{{$plan->plan_product_id ?? ''}}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fname">Taxation Type</label>
                                <input type="text" name="tax_type" id="tax_type" class="form-control">
                                <div class="error" style="color:red;" id="tax_type_error"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fname">Tax Percentage</label>
                                <input type="text" name="tax_percentage" id="tax_percentage" class="form-control">
                                <div class="error" style="color:red;" id="tax_percentage_error"></div>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary erp-plan-tax-form">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade bd-Delete-modal-sm" id="tax_delete_modal" tabindex="-1" role="dialog" aria-labelledby="delete-tax" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete-tax">Confirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <strong>Are you sure to delete this Taxation?</strong>
                <span id="tax_name_show" class="d-block"></span>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="tax_remove_url" name="tax_remove_url" value="{{route('tax-delete')}}" />
                <input type="hidden" id="tax_id_delete" name="tax_id_delete" value="" />
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger confirm-delete-item-tax">Yes Delete</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on("click", ".erp-plan-tax-form", function() {
        $(".plan-tax-submit").submit();
    });

    function refreshTaxationTableRows() {
        let tax = $('#taxation').val();
        let taxPer = $('#taxation').find(':selected').attr('data-tax');

        // let taxPer = $('#taxation').is(':selected').attr('data-tax');
        let billing_cycle = [];
        $('.taxation_billing_list_wrap').find('table tbody').empty();
        $("input:checkbox[name='billing_cycle[]']:checked").each(function(){
            let selectedid = $(this).val();
            let selectedName = $(this).attr('data-name');
            let selectedAmount = $(this).attr('data-amount');
            billing_cycle.push($(this).val());

            let itemTax = selectedAmount * taxPer / 100;
            let finalAmount =  parseFloat(selectedAmount) + parseFloat(itemTax);
            let item = `<tr id="taxation-billingPrice-`+selectedid+`">
            <td>`+selectedName+`</td>
            <td>`+selectedAmount+`</td>    
            <td>`+itemTax+`</td>
            <td>`+finalAmount+`</td>
            </tr>`
            $('.taxation_billing_list_wrap').find('table tbody').append(item);
        })
    }
    $(document).ready(function(){
        refreshTaxationTableRows();
    });
    $(document).on('change', "input:checkbox[name='billing_cycle[]']", function () {
        refreshTaxationTableRows();
    });
    $(document).on('change', "#taxation", function () {
        refreshTaxationTableRows();
    });
    // save tax
    $(".plan-tax-submit").submit(function(e) {
        e.preventDefault();
        var submit_url = $(this).attr("data-url");
        var data_id = $(this).attr("data-id");
        var data_name = $(this).attr("data-name");
        $.ajax({
            url: submit_url,
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                id: $('#tax-id').val(),
                tax_type: $('#tax_type').val(),
                tax_percentage: $('#tax_percentage').val(),
                sub_menu_id: $('#sub_menu_id').val(),
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('.error').text('');
                    let data = response.data;
                    if (data && data.id > 0)
                    if($('#type').val() === 'add'){
                        $('.tax_list_wrap').find('#taxation').append(`<option data-id="`+data.id+`" value="`+data.id+`">`+data.tax_name+` - `+data.tax_percentage+` % </option>`)
                        // $('.tax_list_wrap').append(`
                        //     <div class="form-check" id="tax-`+data.id+`">
                        //         <input class="form-check-input tax" type="checkbox" value="` + data.id + `" id="taxation-` + data.id + `" name="taxation[]">
                        //         <label class="form-check-label mr-4 mb-2" for="taxation-` + data.id + `">`+data.tax_name+ ' - ' +data.tax_percentage+` %</label>
                        //         <button type="button" class="btn btn-outline-primary btn-sm edit-item-tax mr-1" data-id="`+data.id+`" data-name="`+data.tax_name+`" data-percentage=`+data.tax_percentage+` data-toggle="modal" title="Edit"><i class="nav-icon i-pen-4"></i></button>
                        //         <button type="button" class="btn btn-outline-primary btn-sm delete-item-tax" data-id="`+data.id+`" data-name="`+data.tax_name+`" data-percentage=`+data.tax_percentage+` data-toggle="modal" title="Delete"><i class="nav-icon i-remove"></i></button>
                        //     </div>
                        // `);
                    } else {
                        $('.tax_list_wrap').find('#taxation').find("[data-id='"+data.id+"']").replaceWith(`<option data-id="`+data.id+`" value="`+data.id+`">`+data.tax_name+` - `+data.tax_percentage+` % </option>`)
                        // $('.tax_list_wrap').find('#tax-'+data.id).replaceWith(`
                        //     <div class="form-check" id="tax-`+data.id+`">
                        //         <input class="form-check-input tax" type="checkbox" value="` + data.id + `" id="taxation-` + data.id + `" name="taxation[]">
                        //         <label class="form-check-label mr-4 mb-2" for="taxation-` + data.id + `">`+data.tax_name+ ' - ' +data.tax_percentage+` %</label>
                        //         <button type="button" class="btn btn-outline-primary btn-sm edit-item-tax mr-1" data-id="`+data.id+`" data-name="`+data.tax_name+`" data-percentage=`+data.tax_percentage+` data-toggle="modal" title="Edit"><i class="nav-icon i-pen-4"></i></button>
                        //         <button type="button" class="btn btn-outline-primary btn-sm delete-item-tax" data-id="`+data.id+`" data-name="`+data.tax_name+`" data-percentage=`+data.tax_percentage+` data-toggle="modal" title="Delete"><i class="nav-icon i-remove"></i></button>
                        //     </div>
                        // `);
                    }
                    $('#type').val('add');
                    $('#tax-id').val('');
                    $('#tax_name').val('');
                    $('#tax_modal').modal('hide');
                } else if (response.error) {
                    response.error['tax_type'] ? $('#tax_type_error').text(response.error['tax_type']) : $('#tax_type_error').text('');
                    response.error['tax_percentage'] ? $('#tax_percentage_error').text(response.error['tax_percentage']) : $('#tax_percentage_error').text('');
                }
            }
        });
    });

    // edit tax
    $(document).on("click", ".tax_list_wrap .edit-item-tax", function() {
        let id = $(this).attr('data-id');
        let tax_name = $(this).attr('data-name');        
        let percentage = $(this).attr('data-percentage');        
        $('.plan-tax-submit').attr('data-id',id).attr('data-name',tax_name);
        $('#tax-id').val(id);
        $('#type').val('edit');
        $('#tax_type').val(tax_name);
        $('#tax_percentage').val(percentage);
        $('#tax_modal').modal('show');
    });

    // remove tax
    $(document).on("click", ".confirm-delete-item-tax", function(e) {
        e.preventDefault();
        var submit_url = $(document).find("#tax_remove_url").val();
        var data_id = $('#tax_id_delete').val();
        $.ajax({
            url: submit_url,
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                id: data_id,
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('.error').text('');
                    $('.tax_list_wrap').find(`#tax-`+data_id).remove();
                    $('#tax_id_delete').val('');
                    $('#tax_name_show').text('');
                    $('#tax_delete_modal').modal('hide');
                } else if (response.error) {
                    console.log('error', response.error);
                }
            }
        });
    });
    
    $(document).on("click", ".tax_list_wrap .delete-item-tax", function() {        
        $('#tax_name_show').text($(this).attr('data-name'));
        $('#tax_id_delete').val($(this).attr('data-id'));
        $('#tax_delete_modal').modal('show');
    });
</script>