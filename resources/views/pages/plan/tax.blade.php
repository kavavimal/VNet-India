<div class="card">
    <div class="card-body">
        <h4 class="mb-3 d-inline-block">Taxation</h4>
        <div class="float-right">
            @include('pages.common.plan-section-switch', array(
                "switch_id_rec" => $plan_sections_statuses['section_taxation']->id,
                "switch_name"=> 'section_taxation', 
                "switch_id" => "section_taxation", 
                "status" => $plan_sections_statuses['section_taxation']->status))
        </div>
        <div class="tax_list_wrap">
            <div class="form-group">
                <div class="input-group">
                    <input 
                        type="hidden" 
                        name="taxation" 
                        id="taxation" 
                        value={{isset($selectedTaxItem->id) ? $selectedTaxItem->id : ''}} 
                        data-tax={{isset($selectedTaxItem->id) ? $selectedTaxItem->tax_percentage : ''}} 
                        />
                    <input id ="taxation-selected-label" disabled value="{{isset($selectedTaxItem->id) ? $selectedTaxItem->tax_name .'-' . $selectedTaxItem->tax_percentage : ''}}" />

                    <!-- <select class="form-control" id="taxation" name="taxation">
                        <option value="0">Select Tax</option>
                        @foreach($tax as $tax_item)
                            <option data-id="{{$tax_item->id}}" data-tax="{{$tax_item->tax_percentage}}" value="{{$tax_item->id}}" @if($taxationSelected != ''){{ in_array($tax_item->id,$taxationSelected) ? 'selected="selected"' : '' }}@endif >{{$tax_item->tax_name}} - {{$tax_item->tax_percentage}} %</option>
                        @endforeach
                    </select> -->
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
                    @else
                    <button type="button" id="taxation-add" class="btn btn-primary edit-item" title="Add" data-toggle="modal" data-target=".bd-example-modal-sm-tax"><i class="nav-icon i-add"></i></button>
                    @endif    
                </div>
                </div>
                <div class="error" style="color:red;" id="taxation_error"></div>
            </div>
        </div>
        <div class="taxation_billing_list_wrap">
            <table class="table table-sm table-hover ">
                <thead>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Tax</th>
                    <th>Final Amount</th>
                </thead>
                <tbody class="billing_price_table">
                <tr class="first_year_info">
                    <td>1 Year</td>
                    <td class="default_amount"></td>
                    <td>-</td>
                    <td>-</td>
                </tr>
                <?php $taxTable = true; ?>
                    @if(count($bilingCycle) > 0)
                        @foreach ($bilingCycle as $list)
                            @include('pages.plan.billingCycle.taxationBillingCycleItem')
                        @endforeach
                    @endif
                </tbody>
            </table>
                
        </div>
    </div>
</div>