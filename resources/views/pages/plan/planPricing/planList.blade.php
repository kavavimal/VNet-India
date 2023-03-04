<div class="card mb-4">
    <div class="card-body">
        <h4 class="mb-3" id="prod_name_to_display"></h4>
        <table class="table table-hover">
            <thead>
                <th></th>
                <th>Storage in GB</th>
                <th>Storage Price in GB</th>
                <th>Billing Cycle</th>
                <th>Server Location</th>
                <th>Percentage</th>
                <th>Upgrade/Downgrade</th>
                <th>Price</th>
                <th>Action</th>
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
                            <td>{{$item->price}}</td>
                            <td>
                                <button type='button'
                                class='btn btn-outline-primary btn-sm edit-item-plan-pricing mr-1'
                                data-id='{{$item->id}}'
                                data-storage='{{$item->storage}}'
                                data-storage_price='{{$item->storage_price}}'
                                data-billing_cycle='{{$item->billing_cycle}}'
                                data-server='{{$item->server}}'
                                data-window_server='{{$item->window_server}}'
                                data-upgrade_downgrade='{{$item->upgrade_downgrade}}'
                                data-price='{{$item->price}}'
                                data-toggle='modal' title='Edit'>
                                <i class='nav-icon i-pen-4'></i>
                            </button>
                                <button type='button'
                                class='btn btn-outline-primary btn-sm delete-item-plan-pricing'
                                data-id='{{$item->id}}'                                
                                data-toggle='modal' title='Delete'>
                                <i class='nav-icon i-remove'></i>
                            </button>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <div class="plan_list_wrap"></div>
        <div class="text-right">
            <!-- <a href="javascript:void(0);" class="btn btn-primary add_plan_fields"><i class="nav-icon i-add"></i> Add</a>         -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-md-plan-list">
                <i class="nav-icon i-add"></i> Add    
            </button>
        </div>
        
    </div>
</div>