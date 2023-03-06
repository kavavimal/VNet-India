<div class="card">
    <div class="card-body">
        <h4 class="mb-3 d-inline-block">Featured Category</h4>
        <div class="float-right">
            @include('pages.common.plan-section-switch', array("switch_name"=> 'show_featured_cat_status', "switch_id" => "show_featured_cat_status", "status" => 0))
        </div>
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