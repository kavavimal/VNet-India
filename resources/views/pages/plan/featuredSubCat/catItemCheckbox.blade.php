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
        {{isset($featuredSubCategorysSelected) && in_array($id,$featuredSubCategorysSelected) ? "checked='checked'" : ""}}
    />
    <label class="form-check-label mr-4 mb-2" for="featuredSubCat-{{$id}}">{{$name}}</label>
    <button type="button" class="btn btn-outline-primary btn-sm edit-item mr-1" data-toggle="modal" title="Edit"><i class="nav-icon i-pen-4"></i></button>
    <button type="button" class="btn btn-outline-primary btn-sm delete-item" data-toggle="modal" title="Delete"><i class="nav-icon i-remove"></i></button>
</div>