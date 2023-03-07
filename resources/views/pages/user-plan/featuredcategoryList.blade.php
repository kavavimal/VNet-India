<div class="card">
    <div class="card-body">
        <h4 class="mb-3 d-inline-block">Featured Category</h4>        
        <div class="featuredCategory_list_wrap">
            @if($featuredCategory != '')
                @foreach ($featuredCategory as $featured_cat)
                    @include('pages.user-plan.featuredCat.catItemCheckbox', [
                        'id' => $featured_cat->id, 
                        'featured_cat_name' => $featured_cat->featured_cat_name,
                        'featuredCategorysSelected' => $featuredCategorysSelected
                        ])
                @endforeach
            @endif
        </div>
    </div>
</div>