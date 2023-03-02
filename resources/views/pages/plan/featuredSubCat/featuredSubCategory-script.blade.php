<div class="modal fade bd-example-modal-sm-featured-sub-category" id="featured_sub_cat_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-1-sub" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle-1-sub">Add/Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="plan-featured-sub-category-submit" data-url="{{route('featured-sub-category-store')}}" data-id="id" data-name="featured-category-name">
                <div class="modal-body">
                    <input type="hidden" id="id" class="id" name="id" value="0" />
                    <input type="hidden" id="featured_id" class="id" name="featured_id" value="0" />
                    <input type="hidden" id="type" name="type" value="add" />
                    <input type="hidden" id="sub_menu_id" name="sub_menu_id" value="{{$plan->plan_product_id}}">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="name">Name</label>
                            {!! Form::text('name', null, array('placeholder' => 'Enter Name','class' => 'form-control' , 'id' => 'name')) !!}
                            <div class="error" style="color:red;" id="name_error"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary erp-plan-featured-sub-category-form">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade bd-Delete-modal-sm" id="featured_sub_category_delete_modal" tabindex="-1" role="dialog" aria-labelledby="delete-featured-sub-cat" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete-featured-cat">Confirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <strong>Are you sure to delete this?</strong>
                <span id="featured_sub_cat_name_show"></span>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="featured_sub_cat_remove_url" name="featured_sub_cat_remove_url" value="{{route('featured-sub-category-delete')}}" />
                <input type="hidden" id="featured_sub_cat_id_delete" name="featured_sub_cat_id_delete" value="" />
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger confirm-delete-item">Yes Delete</button>
            </div>
        </div>
    </div>
</div>

<script>
    // on featured category item selected or unselected
    function addSubCatBlock() {

    }
    $(document).on("change", ".featuredCategory_list_wrap .featuredCat", function() {
        let curr_item = $(this).closest('.featured_category_item');
        // console.log($(this).is(':checked'));
        var id = $(curr_item).attr('data-id');
        var name = $(curr_item).attr('data-name');
        let plan_id = $("#plan_id").val();
        if($(this).is(':checked')) {
            $.ajax({
                url: `{{route('sub-category-block')}}`,
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id,
                    plan_id: plan_id,                    
                },
                success: function(blockHtml) {
                    $('.featured-sub-cat-wrap').append(blockHtml);
                }
            });
        } else {
            // remove block if not there in cat list
            $('.featured-sub-cat-wrap').find('#sub-cat-block-'+id).remove();
        }
    })

    // sub cat add
    $(document).on('click', '.sub-cat-block-additembutton', function() {
        let itemBlockDiv = $(this).closest('.featured-sub-cat-block');
        console.log(itemBlockDiv);
        let featured_id = $(itemBlockDiv).attr('data-id');
        $('#plan-featured-sub-category-submit #featured_id').val(featured_id);
        $('#plan-featured-sub-category-submit #name').val('');
        $('#featured_sub_cat_model').modal('show');
    });

    // save Sub Category
    $("#plan-featured-sub-category-submit").submit(function(e) {
        e.preventDefault();
        var submit_url = $(this).attr("data-url");
        var data_id = $(this).attr("data-id");
        var featured_id = $('#featured_sub_cat_model #featured_id').val();
        var data_name = $(this).attr("data-name");
        $.ajax({
            url: submit_url,
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                id: $('#featured_sub_cat_model #id').val(),
                featured_id: $('#featured_sub_cat_model #featured_id').val(),
                name: $('#featured_sub_cat_model #name').val(),
                sub_menu_id: $('#sub_menu_id').val(),
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('.error').text('');
                    let data = response.data;
                    if (data && data.id > 0)
                    if($('#type').val() === 'add'){
                        console.log('items', response.html);
                        if (response.html){
                            $('#sub-cat-block-'+featured_id+' .sub-category-items-wrap').append(response.html);
                        }
                    } else {
                        let item = $('#sub-cat-block-'+featured_id).find('#featured-sub-cat-'+data.id);
                        $(item).attr('data-name',data.name);
                        $(item).find('label').text(data.name);
                    }
                    $('#type').val('add');
                    $('#featured_sub_cat_model #id').val('');
                    $('#featured_sub_cat_model #featured_id').val('');
                    $('#featured_sub_cat_model').modal('hide');
                } else if (response.error) {
                    response.error['name'] ? $('#name_error').text(response.error['name']) : $('#name_error').text('');
                }
            }
        });
    });

    // edit Sub category item
    $(document).on("click", ".sub-category-items-wrap .edit-item", function() {
        let curr_item = $(this).closest('.featured_sub_category_item');
        let block_curr_item = $(curr_item).closest('.featured-sub-cat-block');
        let featured_id = $(block_curr_item).attr('data-id');
        let id = $(curr_item).attr('data-id');
        let name = $(curr_item).attr('data-name');
        $('#featured_sub_cat_model #id').val(id);
        $('#featured_sub_cat_model #featured_id').val(featured_id);
        $('#featured_sub_cat_model #name').val(name),
        $('#type').val('edit');
        $('#featured_sub_cat_model').modal('show');
    });

    // on delete item button clicked
    $(document).on("click", ".sub-category-items-wrap .delete-item", function() {
        let curr_item = $(this).closest('.featured_sub_category_item');
        $('#featured_sub_cat_name_show').text($(curr_item).attr('data-name'));
        $('#featured_sub_cat_id_delete').val($(curr_item).attr('data-id'));
        $('#featured_sub_category_delete_modal').modal('show');
    });

    // remove specification
    $(document).on("click", "#featured_sub_category_delete_modal .confirm-delete-item", function(e) {
        e.preventDefault();
        var submit_url = $(document).find("#featured_sub_cat_remove_url").val();
        var data_id = $('#featured_sub_cat_id_delete').val();
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
                    let itemwrap = $('.sub-category-items-wrap').find(`#featured-sub-cat-`+data_id);
                    $(itemwrap).remove();
                    $('#featured_sub_cat_id_delete').val('');
                    $('#featured_sub_cat_name_show').text('');
                    $('#featured_sub_category_delete_modal').modal('hide');
                } else if (response.error) {
                    console.log('error', response.error);
                }
            }
        });
    });
    
</script>