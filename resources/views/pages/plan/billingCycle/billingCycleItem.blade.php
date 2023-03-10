<tr id="billingPrice-{{$list->id}}">
    <td>
        <input 
            class=" billing_cycle"
            type="checkbox"
            value="{{$list->id}}"
            id="billing-cycle-{{$list->id}}"
            name="billing_cycle[]" 
            data-name="{{$list->billing_name}}"
            data-amount="{{$list->billing_amount}}"
            data-percentage="{{$list->billing_percentage}}"
            data-type="{{$list->billing_upgrade_downgrade}}"
            @if($billingCycleSelected != ''){{ in_array($list->id,$billingCycleSelected) ? 'checked="checked"' : '' }}@endif 
        />
    </td>
    <td>{{$list->billing_name}} Years</td>
    <td>{{$list->billing_amount}}</td>
    <td>{{$list->billing_percentage}}</td>
    <td>{{$list->billing_upgrade_downgrade}}</td>
    <td>
        <button type="button" class="btn btn-outline-primary btn-sm edit-item-billing mr-1" data-id="{{$list->id}}" data-name="{{$list->billing_name}}"
            data-amount="{{$list->billing_amount}}"
            data-percentage="{{$list->billing_percentage}}"
            data-type="{{$list->billing_upgrade_downgrade}}" data-toggle="modal" title="Edit"><i class="nav-icon i-pen-4"></i></button>
        <button type="button" class="btn btn-outline-primary btn-sm delete-item-billing" data-id="{{$list->id}}" data-name="{{$list->billing_name}}" data-toggle="modal" title="Delete"><i class="nav-icon i-remove"></i></button>
    </td>
</tr>