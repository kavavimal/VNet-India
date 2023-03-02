<div class="modal fade bd-example-modal-sm-billing" id="billing_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-1" aria-hidden="true">
    <div class="modal-dialog modal-sm">
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
                        <div class="col-md-12 form-group">
                            <label for="name">Name</label>
                            {!! Form::text('billing_name', null, array('placeholder' => 'Enter Name','class' => 'form-control' , 'id' => 'billing_name')) !!}
                            <div class="error" style="color:red;" id="billing_name_error"></div>
                        </div>                     
                    </div>    
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
                sub_menu_id: $('#sub_menu_id').val(),
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('.error').text('');
                    let data = response.data;
                    if (data && data.id > 0)
                    if($('#type').val() === 'add'){
                        $('.billing_list_wrap').append(`
                            <div class="form-check" id="billing-`+data.id+`">
                                <input class="form-check-input billing_cycle" type="checkbox" value="` + data.id + `" id="billing-cycle-` + data.id + `" name="billing_cycle[]">
                                <label class="form-check-label mr-4 mb-2" for="billing-cycle-` + data.id + `">`+data.billing_name+`</label>
                                <button type="button" class="btn btn-outline-primary btn-sm edit-item-billing mr-1" data-id="`+data.id+`" data-name="`+data.billing_name+`" data-toggle="modal" title="Edit"><i class="nav-icon i-pen-4"></i></button>
                                <button type="button" class="btn btn-outline-primary btn-sm delete-item-billing" data-id="`+data.id+`" data-name="`+data.billing_name+`" data-toggle="modal" title="Delete"><i class="nav-icon i-remove"></i></button>
                            </div>
                        `);
                    } else {
                        $('.billing_list_wrap').find('#billing-'+data.id).replaceWith(`
                            <div class="form-check" id="billing-`+data.id+`">
                                <input class="form-check-input billing_cycle" type="checkbox" value="` + data.id + `" id="billing-cycle-` + data.id + `" name="billing_cycle[]">
                                <label class="form-check-label mr-4 mb-2" for="billing-cycle-` + data.id + `">`+data.billing_name+`</label>
                                <button type="button" class="btn btn-outline-primary btn-sm edit-item-billing mr-1" data-id="`+data.id+`" data-name="`+data.billing_name+`" data-toggle="modal" title="Edit"><i class="nav-icon i-pen-4"></i></button>
                                <button type="button" class="btn btn-outline-primary btn-sm delete-item-billing" data-id="`+data.id+`" data-name="`+data.billing_name+`" data-toggle="modal" title="Delete"><i class="nav-icon i-remove"></i></button>
                            </div>
                        `);
                    }
                    $('#type').val('add');
                    $('#billing-id').val('');
                    $('#billing_name').val('');
                    $('#billing_modal').modal('hide');
                } else if (response.error) {
                    response.error['billing_name'] ? $('#billing_name_error').text(response.error['billing_name']) : $('#billing_name_error').text('');
                }
            }
        });
    });

    // edit billing
    $(document).on("click", ".billing_list_wrap .edit-item-billing", function() {
        let id = $(this).attr('data-id');
        let name = $(this).attr('data-name');
        $('.plan-billing-submit').attr('data-id',id).attr('data-name',name);
        $('#billing-id').val(id);
        $('#type').val('edit');
        $('#billing_name').val(name);
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
        $('#billing_name_show').text($(this).attr('data-name'));
        $('#billing_id_delete').val($(this).attr('data-id'));
        $('#billing_delete_modal').modal('show');
    });
</script>