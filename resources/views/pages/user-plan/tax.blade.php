<div class="card">
    <div class="card-body">
        <h4 class="mb-3 d-inline-block">Taxation</h4>
        <div class="tax_list_wrap">
            <div class="form-group">
                <div class="input-group">
                    <select class="form-control" id="taxation" name="taxation">
                        <option value="0">Select Tax</option>
                        @if($tax != '')
                            @foreach($tax as $tax_item)
                                <option data-id="{{$tax_item->id}}" data-tax="{{$tax_item->tax_percentage}}" value="{{$tax_item->id}}" @if($taxationSelected != ''){{ in_array($tax_item->id,$taxationSelected) ? 'selected="selected"' : '' }}@endif >{{$tax_item->tax_name}} - {{$tax_item->tax_percentage}} %</option>
                            @endforeach
                        @endif
                    </select>                    
                </div>
                <div class="error" style="color:red;" id="taxation_error"></div>
            </div>
        </div>
        <?php /*?>
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
                    @if($bilingCycle != '')
                        @foreach ($bilingCycle as $list)
                            @include('pages.plan.billingCycle.taxationBillingCycleItem')
                        @endforeach
                    @endif
                </tbody>
            </table>
                
        </div>
        <?php */ ?>
    </div>
</div>