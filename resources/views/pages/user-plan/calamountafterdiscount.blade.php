<div class="card">
    <div class="card-body">
        <h4 class="mb-3">Fianl Total After Discount</h4>
        <div class="final_cal_billing_list_wrap">
            <table class="table table-sm table-hover ">
                <thead>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Discount</th>
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
                    @if($bilingCycle != '' && count($bilingCycle) > 0)
                        @foreach ($bilingCycle as $list)
                            @include('pages.plan.billingCycle.taxationBillingCycleItem')
                        @endforeach
                    @endif
                </tbody>
            </table>        
        </div>        
    </div>
</div>