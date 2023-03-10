<div class="card">
    <div class="card-body">
        <h4 class="mb-3">Final Total After Tax</h4>
        <div class="taxation_billing_list_wrap">
            <table class="table table-hover ">
                <thead>
                    <th>No Of Years</th>
                    <th>Amount</th>
                    <th>Tax</th>
                    <th>Final Amount</th>
                </thead>
                <tbody class="taxation_billing_price_table">
                    <tr class="first_year_info">
                        <td>1</td>
                        <td class="default_amount"></td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <?php $taxTable = true; ?>
                        @if(count($bilingCycle) > 0)
                            @foreach ($bilingCycle as $list)
                                @include('pages.submenu.configuration.taxationBillingCycleItem')
                            @endforeach
                        @endif
                </tbody>
            </table>        
        </div>        
    </div>
</div>