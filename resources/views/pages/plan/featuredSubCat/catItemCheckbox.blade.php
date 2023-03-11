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
</div>