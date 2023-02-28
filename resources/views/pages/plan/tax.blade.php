<div class="card">
    <div class="card-body">
        <h4 class="mb-3">Taxation</h4>
        <div class="tax_list_wrap">
            @if(count($tax) > 0)
                @foreach ($tax as $list)
                    <div class="form-check" id="tax-{{$list->id}}">
                        <input 
                            class="form-check-input tax"
                            type="checkbox"
                            value="{{$list->id}}"
                            id="taxation-{{$list->id}}"
                            name="taxation[]" 
                            @if($taxationSelected != ''){{ in_array($list->id,$taxationSelected) ? 'checked="checked"' : '' }}@endif 
                            />
                        <label class="form-check-label mr-4 mb-2" for="taxation-{{$list->id}}">{{$list->tax_name.' - '.$list->tax_percentage.' %'}}</label>
                        <button type="button" class="btn btn-outline-primary btn-sm edit-item-tax mr-1" data-id="{{$list->id}}" data-name="{{$list->tax_name}}" data-percentage="{{$list->tax_percentage}}" data-toggle="modal" title="Edit"><i class="nav-icon i-pen-4"></i></button>
                        <button type="button" class="btn btn-outline-primary btn-sm delete-item-tax" data-id="{{$list->id}}" data-name="{{$list->tax_name}}" data-percentage="{{$list->tax_percentage}}" data-toggle="modal" title="Delete"><i class="nav-icon i-remove"></i></button>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="text-right">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-sm-tax">
            <i class="nav-icon i-add"></i> Add
        </button>
        </div>
    </div>
</div>