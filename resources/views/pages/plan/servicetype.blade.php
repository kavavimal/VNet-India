<div class="card">
    <div class="card-body">
        <h4 class="mb-3">Service Type</h4>
        <div class="service_type_list_wrap">
            <div class="row align-items-center">
                <div class="col-md-6">
                    @if ($plan->service_type_type)
                        <div class="form-group mt-2">
                            <label class="radio radio-primary mb-2">
                                <?php $checked = 'checked'; ?>
                                <input type="radio" name="service_type_type" class="service_type_type" formcontrolname="radio" value="managed" @if( $plan->service_type_type == 'managed') {{ $checked }} @endif>
                                <span>Managed Price</span>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="form-group mt-2">
                            <label class="radio radio-primary">
                                <input type="radio" name="service_type_type" class="service_type_type" formcontrolname="radio" value="unmanaged" @if( $plan->service_type_type == 'unmanaged') {{ $checked }} @endif>
                                <span>Unmanaged Price</span>
                                <span class="checkmark"></span>
                            </label>
                        </div>    
                    @else
                        <div class="form-group mt-2">
                            <label class="radio radio-primary mb-2">
                                <?php $checked = 'checked'; ?>
                                <input type="radio" name="service_type_type" class="service_type_type" formcontrolname="radio" value="managed">
                                <span>Managed Price</span>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="form-group mt-2">
                            <label class="radio radio-primary">
                                <input type="radio" name="service_type_type" class="service_type_type" formcontrolname="radio" value="unmanaged" {{ $checked }}>
                                <span>Unmanaged Price</span>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    @endif
                    
                </div>               
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="service_type_price">Price</label>
                        <input type="text" name="service_type_price" id="service_type_price" class="form-control" value="{{ $plan->service_type_price ?? '' }}">
                    </div>
                </div>                            
            </div> 
        </div>
    </div>
</div>