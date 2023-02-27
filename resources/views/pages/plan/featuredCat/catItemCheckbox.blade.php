<div
    class="form-check featured_category_item"
    id="featured-cat-{{$id}}"
    data-id="{{$id}}"
    data-name="{{$featured_cat_name}}">
    <input
        class="form-check-input featuredCat"
        type="checkbox"
        value="{{$id}}"
        id="featuredCat-{{$id}}"
        name="featuredCategory[]"
        {{isset($featuredCategorysSelected) && in_array($id,$featuredCategorysSelected) ? "checked='checked'" : ""}}
        />
    <label class="form-check-label mr-4 mb-2" for="featuredCat-{{$id}}">{{$featured_cat_name}}</label>
    <button type="button" class="btn btn-outline-primary btn-sm edit-item mr-1" title="Edit"><i class="nav-icon i-pen-4"></i></button>
    <button type="button" class="btn btn-outline-primary btn-sm delete-item" title="Delete"><i class="nav-icon i-remove"></i></button>
</div>