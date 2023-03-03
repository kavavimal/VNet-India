<div class="modal fade bd-example-modal-sm" id="spec_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-1" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle-1">Add Specificiation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="plan-specification-submit" data-url="{{route('specification-store')}}" data-id="id" data-name="spec-name">
                <div class="modal-body">
                    <input type="hidden" id="spec-id" class="id" name="id" value="0" />
                    <input type="hidden" id="type" name="type" value="add" />
                    <?php $menu_id = \App\Models\SubMenu::where('id',$plan->plan_product_id)->where('sys_state','!=','-1')->get()->pluck('category_id')->first() ?>
                    <input type="hidden" id="sub_menu_id" name="sub_menu_id" value="{{$menu_id ?? ''}}">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="name">Name</label>
                            {!! Form::text('spec_name', null, array('placeholder' => 'Enter Name','class' => 'form-control' , 'id' => 'spec_name')) !!}
                            <div class="error" style="color:red;" id="spec_name_error"></div>
                        </div>
                        <!-- <div class="col-md-12 form-group">
                            <label>Status</label>
                            <label><input class="status" name="status" checked="checked" type="radio" value="1"> Enable</label>
                            <label><input class="status" name="status" type="radio" value="0"> Disable</label>
                        </div> -->
                    </div>    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary erp-plan-specification-form">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade bd-Delete-modal-sm" id="spec_delete_modal" tabindex="-1" role="dialog" aria-labelledby="delete-spec" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete-spec">Confirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <strong>Are you sure to delete this specification?</strong>
                <span id="spec_name_show"></span>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="spec_remove_url" name="spec_remove_url" value="{{route('specification-delete')}}" />
                <input type="hidden" id="spec_id_delete" name="spec_id_delete" value="" />
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger confirm-delete-item">Yes Delete</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on("click", ".erp-plan-specification-form", function() {
        $(".plan-specification-submit").submit();
    });
    // save specification
    $(".plan-specification-submit").submit(function(e) {
        e.preventDefault();
        var submit_url = $(this).attr("data-url");
        var data_id = $(this).attr("data-id");
        var data_name = $(this).attr("data-name");
        $.ajax({
            url: submit_url,
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                id: $('#spec-id').val(),
                spec_name: $('#spec_name').val(),
                sub_menu_id: $('#sub_menu_id').val(),
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('.error').text('');
                    let data = response.data;
                    if (data && data.id > 0)
                    if($('#type').val() === 'add'){
                        $('.specification_list_wrap').append(`
                            <div class="form-check" id="spec-`+data.id+`">
                                <input class="form-check-input" type="checkbox" value="` + data.id + `" id="` + data.id + `" name="specification[]">
                                <label class="form-check-label" for="` + data.id + `">`+data.spec_name+`</label>
                                <button type="button" class="btn text-warning edit-item" data-id="`+data.id+`" data-name="`+data.spec_name+`" data-toggle="modal" title="Edit"><i class="nav-icon i-pen-4"></i></button>
                                <button type="button" class="btn text-danger delete-item" data-id="`+data.id+`" data-name="`+data.spec_name+`" data-toggle="modal" title="Delete"><i class="nav-icon i-remove"></i></button>
                            </div>
                        `);
                    } else {
                        $('.specification_list_wrap').find('#spec-'+data.id).replaceWith(`
                            <div class="form-check" id="spec-`+data.id+`">
                                <input class="form-check-input" type="checkbox" value="` + data.id + `" id="` + data.id + `" name="specification[]">
                                <label class="form-check-label" for="` + data.id + `">`+data.spec_name+`</label>
                                <button type="button" class="btn text-warning edit-item" data-id="`+data.id+`" data-name="`+data.spec_name+`" data-toggle="modal" title="Edit"><i class="nav-icon i-pen-4"></i></button>
                                <button type="button" class="btn text-danger delete-item" data-id="`+data.id+`" data-name="`+data.spec_name+`" data-toggle="modal" title="Delete"><i class="nav-icon i-remove"></i></button>
                            </div>
                        `);
                    }
                    $('#type').val('add');
                    $('#spec-id').val('');
                    $('#spec_name').val('');
                    $('#spec_modal').modal('hide');
                } else if (response.error) {
                    response.error['spec_name'] ? $('#spec_name_error').text(response.error['spec_name']) : $('#spec_name_error').text('');
                }
            }
        });
    });

    // edit specification
    $(document).on("click", ".specification_list_wrap .edit-item", function() {
        let id = $(this).attr('data-id');
        let name = $(this).attr('data-name');
        $('.plan-specification-submit').attr('data-id',id).attr('data-name',name);
        $('#spec-id').val(id);
        $('#type').val('edit');
        $('#spec_name').val(name);
        $('#spec_modal').modal('show');
    });

    // remove specification
    $(document).on("click", "#spec_delete_modal .confirm-delete-item", function(e) {
        e.preventDefault();
        var submit_url = $(document).find("#spec_remove_url").val();
        var data_id = $('#spec_id_delete').val();
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
                    $('.specification_list_wrap').find(`#spec-`+data_id).remove();
                    $('#spec_id_delete').val('');
                    $('#spec_name_show').text('');
                    $('#spec_delete_modal').modal('hide');
                } else if (response.error) {
                    console.log('error', response.error);
                }
            }
        });
    });
    
    $(document).on("click", ".specification_list_wrap .delete-item", function() {
        $('#spec_name_show').text($(this).attr('data-name'));
        $('#spec_id_delete').val($(this).attr('data-id'));
        $('#spec_delete_modal').modal('show');
    });
</script>