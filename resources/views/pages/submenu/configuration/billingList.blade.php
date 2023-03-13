<div class="card">
    <div class="card-body">
        <h4 class="mb-3">Billing Cycle Price</h4>
        <div class="billing_list_wrap">
            <table class="table table-hover">
                <thead>
                    <th>#</th>
                    <th>No Of Years</th>
                    <th>Base Amount</th>
                    <th>Percentage</th>
                    <th>Upgrade / Downgrade</th>
                    <th>Action</th>
                </thead>
                <tbody class="billing_price_table">
                    <tr class="first_year_info">
                        <td>#</td>
                        <td>1 Year</td>
                        <td class="default_amount"></td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    @if(count($bilingCycle) > 0)
                        @foreach ($bilingCycle as $list)
                            @include('pages.submenu.configuration.billingCycleItem')
                        @endforeach
                    @endif
                </tbody>
            </table>
                
        </div>
        <div class="text-right">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-sm-billing">
            <i class="nav-icon i-add"></i> Add
        </button>
        </div>
    </div>
</div>