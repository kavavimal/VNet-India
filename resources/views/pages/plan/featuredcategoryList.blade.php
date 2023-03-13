<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12 px-1">
                <h4 class="mb-3 d-inline-block">Featured Category</h4>
                <div class="featuredCategory_list_wrap">
                    @if($featuredCategory != ''  && count($featuredCategory) > 0)
                        @foreach ($featuredCategory as $featured_cat)
                            @include('pages.plan.featuredCat.catItemCheckbox', [
                                'id' => $featured_cat->id, 
                                'featured_cat_name' => $featured_cat->featured_cat_name,
                                'featuredCategorysSelected' => $featuredCategorysSelected,
                                'show_status' => $featured_cat->show_status,
                                ])
                        @endforeach
                    @endif
                </div>
            </div>
        </div>            
    </div>
</div>