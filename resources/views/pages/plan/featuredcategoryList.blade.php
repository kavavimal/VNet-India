<div class="card">
    <div class="card-body">
        <h4 class="mb-3">Featured Category</h4>
        <div class="featuredCategory_list_wrap">
            @if(count($featuredCategory) > 0)
                @foreach ($featuredCategory as $featured_cat)
                    @include('pages.plan.featuredCat.catItemCheckbox', [
                        'id' => $featured_cat->id, 
                        'featured_cat_name' => $featured_cat->featured_cat_name,
                        'featuredCategorysSelected' => $featuredCategorysSelected
                        ])
                @endforeach
            @endif
        </div>
        <div class="text-right">
            <button type="button" class="btn btn-primary" id="featured-cat-add">
                <i class="nav-icon i-add"></i> Add
            </button>
        </div>
    </div>
</div>