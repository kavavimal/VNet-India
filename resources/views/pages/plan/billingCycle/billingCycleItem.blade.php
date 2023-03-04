<tr>
    <td>
        <input 
            class=" billing_cycle"
            type="checkbox"
            value="{{$list->id}}"
            id="billing-cycle-{{$list->id}}"
            name="billing_cycle[]" 
            @if($billingCycleSelected != ''){{ in_array($list->id,$billingCycleSelected) ? 'checked="checked"' : '' }}@endif 
        />
    </td>
    <td>{{$list->billing_name}}</td>
    <td>{{$list->amount}}</td>
    <td></td>
    <td>{{$list->percentage}}</td>
    <td>{{$list->upgrade_downgrade}}</td>
    <td>
        <button type="button" class="btn btn-outline-primary btn-sm edit-item-billing mr-1" data-id="{{$list->id}}" data-name="{{$list->billing_name}}" data-toggle="modal" title="Edit"><i class="nav-icon i-pen-4"></i></button>
        <button type="button" class="btn btn-outline-primary btn-sm delete-item-billing" data-id="{{$list->id}}" data-name="{{$list->billing_name}}" data-toggle="modal" title="Delete"><i class="nav-icon i-remove"></i></button>
    </td>
</tr>
<!-- <div class="form-check" id="billing-{{$list->id}}">
        
                    <label class="form-check-label mr-4 mb-2" for="billing-cycle-{{$list->id}}"></label>
                </div> -->