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
            @if($billingCycleSelected != ''){{ in_array($list->id,$billingCycleSelected) ? 'checked="checked"' : '' }}@endif 
        />
    </td>
    <td>{{$list->billing_name}} Years</td>
    <td>{{$list->billing_amount}}</td>    
    <td>{{$list->billing_percentage}}</td>
    <td>{{$list->billing_upgrade_downgrade}}</td>    
</tr>