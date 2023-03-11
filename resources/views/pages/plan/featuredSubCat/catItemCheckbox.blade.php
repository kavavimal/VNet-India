<div
    class="form-check featured_sub_category_item"
    id="featured-sub-cat-{{$id}}"
    data-id="{{$id}}"
    data-name="{{$name}}">
    <input
        class="form-check-input featuredSubCat"
        type="checkbox"
        value="{{$id}}"
        id="featuredSubCat-{{$id}}"
        name="featuredSubCategory[]"
        @if(isset($featuredSubCategorysSelected) && $featuredSubCategorysSelected != ''){{in_array($id,$featuredSubCategorysSelected) ? "checked='checked'" : ""}}@endif
    />
    <label class="form-check-label mr-4 mb-2" for="featuredSubCat-{{$id}}">{{$name}}</label>
    <button type="button" class="btn btn-outline-primary btn-sm edit-item mr-1" data-toggle="modal" title="Edit"><i class="nav-icon i-pen-4"></i></button>
    <button type="button" class="btn btn-outline-primary btn-sm delete-item" data-toggle="modal" title="Delete"><i class="nav-icon i-remove"></i></button>
    @include('pages.common.plan-records-switch-small', array(
        "section" => 'featured_sub_category',
        "switch_id_rec" => $id,
        "switch_name"=> "featured_sub_category_{{$id}}", 
        "switch_id" => "featured_sub_category_{{$id}}", 
        "status" => $show_status))
</div>