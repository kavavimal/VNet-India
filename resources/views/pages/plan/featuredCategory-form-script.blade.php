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
    // on add button click open modal
    $(document).on("click", '#featured-cat-add', function() {
        $('#type').val('add');
        $('#featured-cat-id').val('');
        $('#featured_cat_name').val('');
        $('#featured_cat_model').modal('show');
    });

    // on save button clicked on popup
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
                        if (response.html){
                            $('.featuredCategory_list_wrap').append(response.html);
                        }
                    } else {
                        let item = $('.featuredCategory_list_wrap').find('#featured-cat-'+data.id);
                        $(item).attr('data-name',data.featured_cat_name);
                        $(item).find('label').text(data.featured_cat_name);
                        let isChecked = $(item).find('input').is(':checked');
                        if (isChecked) {
                            $('#sub-cat-block-'+data.id+' .sub-cat-title').html(data.featured_cat_name);
                        }
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
        let curr_item = $(this).closest('.featured_category_item');
        let id = $(curr_item).attr('data-id');
        let name = $(curr_item).attr('data-name');
        $('.plan-featured-category-submit').attr('data-id',id).attr('data-name',name);
        $('#featured-cat-id').val(id);
        $('#type').val('edit');
        $('#featured_cat_name').val(name);
        $('#featured_cat_model').modal('show');
    });

    // remove specification
    $(document).on("click", "#featured_category_delete_modal .confirm-delete-item", function(e) {
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
                    let itemwrap = $('.featuredCategory_list_wrap').find(`#featured-cat-`+data_id);
                    let isitemselected = $(itemwrap).find('input.featuredCat').is(':checked');
                    if (isitemselected) {
                        $('#sub-cat-block-'+data_id).remove();
                    }
                    $(itemwrap).remove();
                    $('#featured_cat_id_delete').val('');
                    $('#featured_cat_name_show').text('');
                    $('#featured_category_delete_modal').modal('hide');
                } else if (response.error) {
                    console.log('error', response.error);
                }
            }
        });
    });
    // on delete item button clicked
    $(document).on("click", ".featuredCategory_list_wrap .delete-item", function() {
        let curr_item = $(this).closest('.featured_category_item');
        $('#featured_cat_name_show').text($(curr_item).attr('data-name'));
        $('#featured_cat_id_delete').val($(curr_item).attr('data-id'));
        $('#featured_category_delete_modal').modal('show');
    });
</script>