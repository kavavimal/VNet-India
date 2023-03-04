<div class="card">
    <div class="card-body">
        <h4 class="mb-3">Billing Cycle Price</h4>
        <div class="billing_list_wrap">
            <table class="table table-sm table-responsive">
                <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Updated Amount</th>
                    <th>Percentage</th>
                    <th>Upgrade / Downgrade</th>
                    <th>Action</th>
                </thead>
                @if(count($bilingCycle) > 0)
                <tbody>
                    @foreach ($bilingCycle as $list)
                        @include('pages.plan.billingCycle.billingCycleItem')
                    @endforeach
                </tbody>
                @endif
            </table>
                
        </div>
        <div class="text-right">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-sm-billing">
            <i class="nav-icon i-add"></i> Add
        </button>
        </div>
    </div>
</div>