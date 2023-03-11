<div class="form-check featured_category_item" data-name="{{$cat->featured_cat_name}}" id="featured-cat-{{$cat->id}}">
    <input
        class="form-check-input"
        type="checkbox"
        value="{{$cat->id}}"
        name="featuredCategory[]"
        id="featuredCat-{{$cat->id}}"
        <?php /* ?> @if($catificationsSelected != ''){{in_array($cat->id,$catificationsSelected) ? 'checked="checked"' : ''}}@endif <?php */ ?>
        />
    <label class="form-check-label mr-4 mb-2" for="featuredCat-{{$cat->id}}">{{$cat->featured_cat_name}}</label> 
</div>