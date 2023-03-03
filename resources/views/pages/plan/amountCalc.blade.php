<div class="card">
    <div class="card-body">
        <h4 class="mb-3">Amount Calculation</h4>
        <div class="amount_calc_list_wrap">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="servive_type_currency">Currency</label>
                        <input type="text" name="servive_type_currency" id="servive_type_currency" class="form-control" value="{{ $plan->servive_type_currency ?? '' }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="service_type_renewal_price">Renewal Price</label>
                        <input type="text" name="service_type_renewal_price" id="service_type_renewal_price" class="form-control" value="{{ $plan->service_type_renewal_price ?? '' }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="service_type_discount">Discount Percentage</label>
                        <input type="text" name="service_type_discount" id="service_type_discount" class="form-control" value="{{ $plan->service_type_discount ?? '' }}">
                    </div>
                </div>                          
            </div> 
        </div>
    </div>
</div>