<div class="modal fade bd-example-modal-sm-featured-category" id="featured_cat_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-1" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle-1">Add Featured Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="plan-featured-category-submit" data-url="{{route('featured-category-store')}}" data-id="id" data-name="featured-category-name">
                <div class="modal-body">
                    <input type="hidden" id="featured-cat-id" class="id" name="id" value="0" />
                    <input type="hidden" id="type" name="type" value="add" />
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="name">Name</label>
                            {!! Form::text('featured_cat_name', null, array('placeholder' => 'Enter Name','class' => 'form-control' , 'id' => 'featured_cat_name')) !!}
                            <div class="error" style="color:red;" id="featured_cat_name_error"></div>
                        </div>                        
                    </div>    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary erp-plan-featured-category-form">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade bd-Delete-modal-sm" id="featured_category_delete_modal" tabindex="-1" role="dialog" aria-labelledby="delete-featured-cat" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete-featured-cat">Confirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <strong>Are you sure to delete this specification?</strong>
                <span id="featured_cat_name_show"></span>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="featured_cat_remove_url" name="featured_cat_remove_url" value="{{route('featured-category-delete')}}" />
                <input type="hidden" id="featured_cat_id_delete" name="featured_cat_id_delete" value="" />
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger confirm-delete-item">Yes Delete</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on("click", ".erp-plan-featured-category-form", function() {       
        $(".plan-featured-category-submit").submit();
    });
    // save specification
    $(".plan-featured-category-submit").submit(function(e) {
        e.preventDefault();
        var submit_url = $(this).attr("data-url");
        var data_id = $(this).attr("data-id");
        var data_name = $(this).attr("data-name");
        $.ajax({
            url: submit_url,
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                id: $('#featured-cat-id').val(),
                featured_cat_name: $('#featured_cat_name').val(),
            },
            dataType: 'json',
            success: function(response) {               
                if (response.success) {
                    $('.error').text('');
                    let data = response.data;
                    if (data && data.id > 0)
                    if($('#type').val() === 'add'){
                        $('.featuredCategory_list_wrap').append(`
                            <div class="form-check" id="featured-cat-`+data.id+`">
                                <input class="form-check-input" type="checkbox" value="` + data.id + `" id="` + data.id + `">
                                <label class="form-check-label mr-4 mb-2" for="` + data.id + `">`+data.featured_cat_name+`</label>
                                <button type="button" class="btn btn-outline-primary btn-sm edit-item mr-1" data-id="`+data.id+`" data-name="`+data.featured_cat_name+`" data-toggle="modal" title="Edit"><i class="nav-icon i-pen-4"></i></button>
                                <button type="button" class="btn btn-outline-primary btn-sm delete-item" data-id="`+data.id+`" data-name="`+data.featured_cat_name+`" data-toggle="modal" title="Delete"><i class="nav-icon i-remove"></i></button>
                            </div>
                        `);
                    } else {
                        $('.featuredCategory_list_wrap').find('#spec-'+data.id).replaceWith(`
                            <div class="form-check" id="spec-`+data.id+`">
                                <input class="form-check-input" type="checkbox" value="` + data.id + `" id="` + data.id + `">
                                <label class="form-check-label mr-4 mb-2" for="` + data.id + `">`+data.featured_cat_name+`</label>
                                <button type="button" class="btn btn-outline-primary btn-sm edit-item mr-1" data-id="`+data.id+`" data-name="`+data.featured_cat_name+`" data-toggle="modal" title="Edit"><i class="nav-icon i-pen-4"></i></button>
                                <button type="button" class="btn btn-outline-primary btn-sm delete-item" data-id="`+data.id+`" data-name="`+data.featured_cat_name+`" data-toggle="modal" title="Delete"><i class="nav-icon i-remove"></i></button>
                            </div>
                        `);
                    }
                    $('#type').val('add');
                    $('#featured-cat-id').val('');
                    $('#featured_cat_name').val('');
                    $('#featured_cat_model').modal('hide');
                } else if (response.error) {
                    response.error['featured_cat_name'] ? $('#featured_cat_name_error').text(response.error['featured_cat_name']) : $('#featured_cat_name_error').text('');
                }
            }
        });
    });

    // edit specification
    $(document).on("click", ".featuredCategory_list_wrap .edit-item", function() {
        let id = $(this).attr('data-id');
        let name = $(this).attr('data-name');
        $('.plan-featured-category-submit').attr('data-id',id).attr('data-name',name);
        $('#featured-cat-id').val(id);
        $('#type').val('edit');
        $('#featured_cat_name').val(name);
        $('#featured_cat_model').modal('show');
    });

    // remove specification
    $(document).on("click", ".confirm-delete-item", function(e) {
        e.preventDefault();
        var submit_url = $(document).find("#featured_cat_remove_url").val();
        var data_id = $('#featured_cat_id_delete').val();
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
                    $('.featuredCategory_list_wrap').find(`#spec-`+data_id).remove();
                    $('#spec_id_delete').val('');
                    $('#spec_name_show').text('');
                    $('#spec_delete_modal').modal('hide');
                } else if (response.error) {
                    console.log('error', response.error);
                }
            }
        });
    });
    
    $(document).on("click", ".featuredCategory_list_wrap .delete-item", function() {
        $('#spec_name_show').text($(this).attr('data-name'));
        $('#spec_id_delete').val($(this).attr('data-id'));
        $('#spec_delete_modal').modal('show');
    });
</script>