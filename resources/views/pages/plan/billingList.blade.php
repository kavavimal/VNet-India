<div class="card">
    <div class="card-body">
        <h4 class="mb-3">Billing Cycle</h4>
        <div class="billing_list_wrap">
        @if(count($bilingCycle) > 0)
            @foreach ($bilingCycle as $list)
                <div class="form-check" id="billing-{{$list->id}}">
                    <input 
                        class="form-check-input billing_cycle"
                        type="checkbox"
                        value="{{$list->id}}"
                        id="billing-cycle-{{$list->id}}"
                        name="billing_cycle[]" 
                        @if($billingCycleSelected != ''){{ in_array($list->id,$billingCycleSelected) ? 'checked="checked"' : '' }}@endif 
                        />
                    <label class="form-check-label mr-4 mb-2" for="billing-cycle-{{$list->id}}">{{$list->billing_name}}</label>
                    <button type="button" class="btn btn-outline-primary btn-sm edit-item-billing mr-1" data-id="{{$list->id}}" data-name="{{$list->billing_name}}" data-toggle="modal" title="Edit"><i class="nav-icon i-pen-4"></i></button>
                    <button type="button" class="btn btn-outline-primary btn-sm delete-item-billing" data-id="{{$list->id}}" data-name="{{$list->billing_name}}" data-toggle="modal" title="Delete"><i class="nav-icon i-remove"></i></button>
                </div>
            @endforeach
        @endif
        </div>
        <div class="text-right">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-sm-billing">
            <i class="nav-icon i-add"></i> Add
        </button>
        </div>
    </div>
</div>