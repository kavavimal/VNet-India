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
        @if(isset($featuredCategorysSelected) && $featuredCategorysSelected != ''){{ in_array($id,$featuredCategorysSelected) ? "checked='checked'" : ""}}@endif
        />
    <label class="form-check-label mr-4 mb-2" for="featuredCat-{{$id}}">{{$featured_cat_name}}</label>
</div>