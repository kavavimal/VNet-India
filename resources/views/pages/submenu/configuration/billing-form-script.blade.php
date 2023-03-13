<div class="modal fade bd-example-modal-sm-billing" id="billing_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-1" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle-1">Add Billing Cycle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="plan-billing-submit" data-url="{{route('billing-store')}}" data-id="id" data-name="billing-name">
                <div class="modal-body">
                    <input type="hidden" id="billing-id" class="id" name="id" value="0" />
                    <input type="hidden" id="type" name="type" value="add" />
                    <input type="hidden" id="sub_menu_id" name="sub_menu_id" value="{{$plan->plan_product_id ?? ''}}">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 form-group">
                            <label for="billing_name">No. of Years</label>
                            {!! Form::number('billing_name', null, array('placeholder' => 'Enter Name','class' => 'form-control' , 'id' => 'billing_name')) !!}
                            <div class="error" style="color:red;" id="billing_name_error"></div>
                        </div>                     
                        <div class="col-sm-12 col-md-6 form-group">
                            <label for="billing_amount">Base Amount</label>
                            {!! Form::text('billing_amount', null, array('placeholder' => 'Enter Amount','class' => 'form-control' , 'id' => 'billing_amount')) !!}
                            <input type="hidden" name="billing_final_amount" id="billing_final_amount" >
                            <div class="error" style="color:red;" id="billing_amount_error"></div>
                        </div>
                        <div class="col-sm-12 col-md-6 form-group">
                            <label for="billing_percentage">Percentage</label>
                            {!! Form::text('billing_percentage', null, array('placeholder' => 'Enter Percentage','class' => 'form-control' , 'id' => 'billing_percentage')) !!}
                            <div class="error" style="color:red;" id="billing_percentage_error"></div>
                        </div>
                        <div class="col-sm-12 col-md-6 form-group">
                            <label for="billing_upgrade_downgrade">Upgrade Downgrade</label>
                            <select id="billing_upgrade_downgrade" name="billing_upgrade_downgrade" class="form-control">
                                <option value="none">None</option>
                                <option value="upgrade">Upgrade</option>
                                <option value="downgrade">Downgrade</option>
                            </select>
                            <div class="error" style="color:red;" id="billing_upgrade_downgrade_error"></div>
                        </div>
                    </div>
                    <p class="m-0">Final Amount: <span id="billing_final_calculations"></span></p>                     
                </div>
                <div class="modal-footer">                                                                   
                    <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary erp-plan-billing-form">Save changes</button>                                        
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade bd-Delete-modal-sm" id="billing_delete_modal" tabindex="-1" role="dialog" aria-labelledby="delete-billing" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete-billing">Confirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <strong>Are you sure to delete this Billing Cycle?</strong>
                <span id="billing_name_show"></span>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="billing_remove_url" name="billing_remove_url" value="{{route('billing-delete')}}" />
                <input type="hidden" id="billing_id_delete" name="billing_id_delete" value="" />
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger confirm-delete-item-billing">Yes Delete</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on("click", ".erp-plan-billing-form", function() {
        $(".plan-billing-submit").submit();
    });

    $(document).on("click", "#add_billing_cycle_item", function() {
        $('#type').val('add');
        $('.plan-billing-submit #billing-id').val('');
        $('.plan-billing-submit #billing_name').val('');
        $('.plan-billing-submit #billing_amount').val(''),
        $('.plan-billing-submit #billing_percentage').val(''),
        $('.plan-billing-submit #billing_upgrade_downgrade').val(''),
        $('#billing_modal').modal('show');
    });
    // save billing
    $(".plan-billing-submit").submit(function(e) {
        e.preventDefault();
        var submit_url = $(this).attr("data-url");
        var data_id = $(this).attr("data-id");
        var data_name = $(this).attr("data-name");
        $.ajax({
            url: submit_url,
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                id: $('#billing-id').val(),
                billing_name: $('#billing_name').val(),
                billing_amount: $('#billing_final_amount').val(),
                billing_percentage: $('#billing_percentage').val(),
                billing_upgrade_downgrade: $('#billing_upgrade_downgrade').val(),
                sub_menu_id: $('#sub_menu_id').val(),
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('.error').text('');
                    let data = response.data;
                    if (data && data.id > 0)
                    if($('#type').val() === 'add'){
                        var rows = $(`<tr id='billingPrice-` + data.id + `'><td>
                                    <input class='billing_cycle'
                                    type='checkbox'
                                    value='`+data.id+`'
                                    id='billing-cycle-`+data.id+`'
                                    name='billing_cycle[]'
                                    data-name="`+data.billing_name+`"
                                    data-amount="`+data.billing_amount+`"
                                    data-percentage="`+data.billing_percentage+`"
                                    data-type="`+data.billing_upgrade_downgrade+`"
                                /></td><td>` +
                                data.billing_name + " Year</td><td>" +
                                data.billing_amount + " </td><td>" +
                                data.billing_percentage + "</td><td>" +
                                data.billing_upgrade_downgrade + "</td><td>" +                                
                                "<button type='button' class='btn btn-outline-primary btn-sm edit-item-plan-pricing mr-1' data-id='` + data.id + `'data-storage='` + data.storage + `'data-storage_price='` + data.storage_price + `'data-billing_cycle='` + data.billing_cycle + `'data-server='` + data.server + `'data-window_server='` +data.window_server + `'data-upgrade_downgrade='` +data.upgrade_downgrade + `'data-price='` + data.price + `'data-toggle='modal' title='Edit'><i class='nav-icon i-pen-4'></i></button><button type='button' class='btn btn-outline-primary btn-sm delete-item-plan-pricing' data-id='` + data.id + `'data-toggle='modal' title='Delete'><i class='nav-icon i-remove'></i></button>" + "</td></tr>");
                            $('.billing_price_table').append(rows);
                    } else {
                        var rows2 =  $(`<tr id='billingPrice-` + data.id + `'><td>
                                    <input class='billing_cycle'
                                    type='checkbox'
                                    value='`+data.id+`'
                                    id='billing-cycle-`+data.id+`'
                                    name='billing_cycle[]'
                                    data-name="`+data.billing_name+`"
                                    data-amount="`+data.billing_amount+`"
                                    data-percentage="`+data.billing_percentage+`"
                                    data-type="`+data.billing_upgrade_downgrade+`"
                                /></td><td>` +
                                data.billing_name + " Years</td><td>" +
                                data.billing_amount + " </td><td>" +
                                data.billing_percentage + "</td><td>" +
                                data.billing_upgrade_downgrade + "</td><td>" +                                
                                "<button type='button' class='btn btn-outline-primary btn-sm edit-item-plan-pricing mr-1' data-id='` + data.id + `'data-storage='` + data.storage + `'data-storage_price='` + data.storage_price + `'data-billing_cycle='` + data.billing_cycle + `'data-server='` + data.server + `'data-window_server='` +data.window_server + `'data-upgrade_downgrade='` +data.upgrade_downgrade + `'data-price='` + data.price + `'data-toggle='modal' title='Edit'><i class='nav-icon i-pen-4'></i></button><button type='button' class='btn btn-outline-primary btn-sm delete-item-plan-pricing' data-id='` + data.id + `'data-toggle='modal' title='Delete'><i class='nav-icon i-remove'></i></button>" + "</td></tr>");
                            $('.billing_price_table').find('#billingPrice-' + data.id).replaceWith(rows2);
                    }
                    $('#type').val('add');
                    $('#billing-id').val('');
                    $('#billing_name').val('');
                    $('#billing_modal').modal('hide');
                } else if (response.error) {
                    response.error['billing_name'] ? $('#billing_name_error').text(response.error['billing_name']) : $('#billing_name_error').text('');
                    response.error['billing_percentage'] ? $('#billing_percentage_error').text(response.error['billing_percentage']) : $('#billing_percentage_error').text('');
                    response.error['billing_amount'] ? $('#billing_amount_error').text(response.error['billing_amount']) : $('#billing_amount_error').text('');
                    response.error['billing_upgrade_downgrade'] ? $('#billing_upgrade_downgrade_error').text(response.error['billing_upgrade_downgrade']) : $('#billing_upgrade_downgrade').text('');
                }
            }
        });
    });

    // edit billing
    $(document).on("click", ".billing_list_wrap .edit-item-billing", function() {
        $(this).closest('tr').find('input.billing_cycle').prop('checked', false).trigger('change');
        let id = $(this).attr('data-id');
        let name = $(this).attr('data-name');
        let amount = $(this).attr('data-amount');
        let percentage = $(this).attr('data-percentage');
        let type = $(this).attr('data-type');
        $('.plan-billing-submit').attr('data-id',id).attr('data-name',name);
        $('#billing-id').val(id);
        $('#type').val('edit');
        $('.plan-billing-submit #billing_name').val(name);
        $('#billing_amount').val(amount),
        $('#billing_percentage').val(percentage),
        $('#billing_upgrade_downgrade').val(type),
        $('#billing_modal').modal('show');
    });

    // remove billing
    $(document).on("click", ".confirm-delete-item-billing", function(e) {
        e.preventDefault();
        var submit_url = $(document).find("#billing_remove_url").val();
        var data_id = $('#billing_id_delete').val();
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
                    $('.billing_list_wrap').find(`#billing-`+data_id).remove();
                    $('#billing_id_delete').val('');
                    $('#billing_name_show').text('');
                    $('#billing_delete_modal').modal('hide');
                } else if (response.error) {
                    console.log('error', response.error);
                }
            }
        });
    });
    
    $(document).on("click", ".billing_list_wrap .delete-item-billing", function() {
        $(this).closest('tr').find('input.billing_cycle').prop('checked', false).trigger('change');
        $('#billing_name_show').text($(this).attr('data-name'));
        $('#billing_id_delete').val($(this).attr('data-id'));
        $('#billing_delete_modal').modal('show');
    });

    function calculate_amounts(){        
        let billing_amount = $('#billing_amount').val();
        let billing_year = $('#billing_name').val();
        let billling_percentage = $('#billing_percentage').val();
        let final_price = $('#billing_final_calculations');
        let upgrade_downgrade = $('select[name="billing_upgrade_downgrade"]').val();        
        let billing_final_amount = $("#billing_final_amount");

        let amss = parseInt(billing_amount) * parseInt(billing_year);
        final_price.text(amss);
        billing_final_amount.val(amss);
        let final_amount = amss * billling_percentage / 100;
       
        if (upgrade_downgrade === 'upgrade') {            
            let am = parseInt(amss) + parseInt(final_amount)            
            final_price.text(am);
            billing_final_amount.val(am);
        } else if (upgrade_downgrade === 'downgrade') {
            let am = parseInt(amss) - parseInt(final_amount)
            final_price.text(am);
            billing_final_amount.val(am);
        }else if(upgrade_downgrade === 'none'){
            let am=0;
            final_price.text(amss);
            billing_final_amount.val(am);
        }      
    }
    $('body').on('keyup', '#billing_amount,#billing_percentage,#billing_name', function() {   
        calculate_amounts();
    });    
    $(document).on('change', 'select[name="billing_upgrade_downgrade"]', function() {   
        calculate_amounts();
    });
</script>