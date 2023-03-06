<div class="card">
    <div class="card-body">
        <h4 class="mb-3 d-inline-block">Negotiation</h4>
        <div class="float-right">
            @include('pages.common.plan-section-switch', array("switch_name"=> 'show_negotiation_status', "switch_id" => "show_negotiation_status", "status" => 1))
        </div>
        <div class="negotiation_list_wrap">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="negotiation_min">Min</label>
                        <input type="text" name="negotiation_min" id="negotiation_min" class="form-control" value="{{ $plan->negotiation_min ?? '' }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="negotiation_max">Max</label>
                        <input type="text" name="negotiation_max" id="negotiation_max" class="form-control" value="{{ $plan->negotiation_max ?? '' }}">
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>