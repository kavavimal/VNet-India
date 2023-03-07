<div class="card mb-4">
    <div class="card-body table_wrap">
        <h4 class="mb-3" id="prod_name_to_display"></h4>
        <table class="table table-hover collapsible">
            <thead>
                <th></th>
                <th>Storage in GB</th>
                <th>Storage Price in GB</th>
                <th>Billing Cycle</th>
                <th>Server Location</th>
                <th>Percentage</th>
                <th>Upgrade/Downgrade</th>
                <th>Price</th>
            </thead>                 
            <tbody class="plan_price_list_tbl_view">
                @if(isset($plan_pricing) && count($plan_pricing) > 0) 
                    @foreach ($plan_pricing as $item)
                        <tr id="planPricing-{{$item->id}}">
                            <td>
                            <input 
                                class="plan_pricing_check_box"
                                type="checkbox"
                                value="{{$item->id}}"
                                id="plan_pricing_check_box-{{$item->id}}"
                                name="plan_pricing_check_box[]" 
                                @if($planPricingSelected != ''){{ in_array($item->id,$planPricingSelected) ? 'checked="checked"' : '' }}@endif 
                            />
                            </td>
                            <td>{{$item->storage}}</td>
                            <td>{{$item->storage_price}}</td>
                            <td>{{$item->billing_cycle}}</td>
                            <td>{{$item->server}}</td>
                            <td>{{$item->window_server}}</td>
                            <td>{{$item->upgrade_downgrade}}</td>
                            <td class="total_price">{{$item->price}}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <div class="plan_list_wrap"></div>
        <button class="expand_collapse_table btn btn-primary">Expand List</button>
    </div>
</div>