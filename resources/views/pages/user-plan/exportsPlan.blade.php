<table>
    <thead>
    <tr>
        <th style="font-weight: bolder">Id</th>
        <th style="font-weight: bolder">Sub Menu</th>
        <th style="font-weight: bolder">Plan Name</th>
        <th style="font-weight: bolder">Plan Pricing</th>
        <th style="font-weight: bolder">Specification</th>
        <th style="font-weight: bolder">Featured Category</th>
        <th style="font-weight: bolder">Server Location</th>
        <th style="font-weight: bolder">Billing Cycle</th>
        <th style="font-weight: bolder">Support</th>
        <th style="font-weight: bolder">Support Price</th>
        <th style="font-weight: bolder">Total Price</th>
    </tr>
    </thead>
    <tbody>
    @foreach($plans as $plan)
        <tr>
            <td>{{$plan->id}}</td>
            <td>{{ $plan->plan_product_id ? $plan->submenu->submenu_name : '' }}</td>
            <td>{{ $plan->plan_name ?? '' }}</td>
            <?php 
                $plan_pricing  = '';
                if(!empty($plan->plan_pricingids)){
                    $plan_pricing_id = explode(",",$plan->plan_pricingids);
                    $plan_pricing = \App\Models\PlanPricing::where('sys_state','!=','-1')->whereIn('id', $plan_pricing_id)->get();            
                }                
            ?>
            <td>{{ $plan_pricing }}</td>
            <?php 
                $specifications  = '';
                if(!empty($plan->specification)){
                    $specifications_id = explode(",",$plan->specification);
                    $specifications = \App\Models\Specification::whereIn('id',$specifications_id)->where('sys_state','!=','-1')->get();
                }       
            ?>
            <td>{{ $specifications }}</td>
            <?php 
                $featured_category  = '';
                if(!empty($plan->featured_category)){
                    $featuredCategory_id = explode(",",$plan->featured_category);
                    $featuredCategory = \App\Models\FeaturedCategory::where('sys_state','!=','-1')->whereIn('id',$featuredCategory_id)->with('children')->get();
                }     
            ?>
            <td>{{ $featuredCategory }}</td>
            <?php 
                $featured_category  = '';
                if(!empty($plan->featured_category)){
                    $featuredCategory_id = explode(",",$plan->featured_category);
                    $featuredCategory = \App\Models\FeaturedCategory::where('sys_state','!=','-1')->whereIn('id',$featuredCategory_id)->with('children')->get();
                }
            ?>
            <td>{{ $featuredCategory }}</td>
            <?php 
                $bilingCycle  = '';
                if(!empty($plan->billing_cycles)){
                    $bilingCycle_id = explode(",",$plan->billing_cycles);
                    $bilingCycle = \App\Models\BilingCycle::where('sys_state','!=','-1')->whereIn('id',$bilingCycle_id)->get();
                }
            ?>
            <td>{{ $bilingCycle }}</td>
            <td>{{ $plan->service_type_type ?? '' }}</td>
            <td>{{ $plan->service_type_price ?? '' }}</td>
            <td>{{ $plan->id ?? '' }}</td>

        </tr>
    @endforeach
    </tbody>
</table>
