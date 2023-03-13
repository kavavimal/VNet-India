<div class="card">
    <div class="card-body">
        <h4 class="mb-3 d-inline-block">Taxation</h4>
        <div class="tax_list_wrap">
            <div class="form-group">
                <div class="input-group">
                    <!-- <input 
                        type="hidden"
                        name="taxation" 
                        id="taxation" 
                        value={{isset($selectedTaxItem->id) ? $selectedTaxItem->id : ''}} 
                        data-tax={{isset($selectedTaxItem->id) ? $selectedTaxItem->tax_percentage : ''}} 
                        /> -->
                    <!-- <input id ="taxation-selected-label" disabled value="{{isset($selectedTaxItem->id) ? $selectedTaxItem->tax_name .'-' . $selectedTaxItem->tax_percentage : ''}}" /> -->

                    <select class="form-control" id="taxation" name="taxation">
                        <option value="0" data-tax="0">Select Tax</option>
                        @if($tax != '')
                        @foreach($tax as $tax_item)
                            <option data-id="{{$tax_item->id}}" data-tax="{{$tax_item->tax_percentage}}" data-name="{{$tax_item->tax_name}}" value="{{$tax_item->id}}" @if($taxationSelected != ''){{ in_array($tax_item->id,$taxationSelected) ? 'selected="selected"' : '' }}@endif >{{$tax_item->tax_name}} - {{$tax_item->tax_percentage}} %</option>
                        @endforeach
                        @endif
                    </select>
                    <div class="input-group-append">
                        @if(isset($selectedTaxItem) && $selectedTaxItem != '')
                            <button 
                                type="button"
                                id="taxation-edit"
                                data-id="{{$selectedTaxItem->id}}"
                                data-name="{{$selectedTaxItem->tax_name}}"
                                data-percentage="{{$selectedTaxItem->tax_percentage}}"
                                class="btn btn-primary edit-item edit-item-tax"
                                title="Edit"
                                data-toggle="modal"
                                data-target=".bd-example-modal-sm-tax"><i class="nav-icon i-pen-5"></i></button>
                        @endif                        
                    </div>
                </div>
                <div class="error" style="color:red;" id="taxation_error"></div>
            </div>
        </div>        
    </div>
</div>