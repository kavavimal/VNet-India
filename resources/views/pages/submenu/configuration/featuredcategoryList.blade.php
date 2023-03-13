<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-8 px-1 border-right">
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
                            @include('pages.submenu.configuration.catItemCheckbox', [
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
            <div class="col-sm-4 px-1">
                <label for="featuredCategory_sub_menu_select">Grab from other Sub Menu</label>
                <select class=" form-control select2" data-url="{{route('getfeaturedcategorydata')}}" id="featuredCategory_sub_menu_select" name="featuredCategory_sub_menu_select">
                    <option value="0">Select Sub Menu</option>
                    @foreach($product_list as $value)
                        @if($value->id != $plan->plan_product_id)
                        <?php $prodSelect = ''; if ($value->id == $plan->plan_product_id) {$prodSelect = 'selected';} else {$prodSelect = '';}?>
                        <option value="{{$value->id}}" {{$prodSelect}}>{{ $value->submenu_name }}</option>
                        @endif
                    @endforeach
                </select>
                <div class="second_featuredCategory_list_wrap">
                </div>
                <small class="error d-block" id="second_featuredCategory_status_label"></small>
                <button type="button" id="second_featuredCategory_button" data-url="{{route('addfeaturedCategory')}}" class="btn btn-sm btn-primary d-none"><i class="nav-icon i-left"></i> Add Selected</button>
            </div>
        </div>            
    </div>
</div>