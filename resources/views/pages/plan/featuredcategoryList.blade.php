<div class="card">
    <div class="card-body">
        <h4 class="mb-3 d-inline-block">Featured Category</h4>
        <div class="float-right">
            @include('pages.common.plan-section-switch', array(
                "switch_id_rec" => $plan_sections_statuses['section_featured_cat']->id,
                "switch_name"=> 'section_featured_cat', 
                "switch_id" => "section_featured_cat", 
                "status" => $plan_sections_statuses['section_featured_cat']->status))
        </div>
        <div class="featuredCategory_list_wrap">
            @if(count($featuredCategory) > 0)
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
        <div class="text-right">
            <button type="button" class="btn btn-primary" id="featured-cat-add">
                <i class="nav-icon i-add"></i> Add
            </button>
        </div>
    </div>
</div>