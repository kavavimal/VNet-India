<div class="card">
    <div class="card-body">
        <h4 class="mb-3">Support</h4>
        <div class="service_type_list_wrap">
            <div class="row align-items-center">
                <div class="col-md-6">                                    
                    <div class="form-group mt-2">
                        <label class="radio radio-primary mb-2">
                            <?php $checked = 'checked'; ?>
                            <input type="radio" name="service_type_type" class="service_type_type" formcontrolname="radio" value="managed" @if( $support == 'managed') {{ $checked }} @endif disabled>
                            <span>Premiun Support</span>
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="form-group mt-2">
                        <label class="radio radio-primary">
                            <input type="radio" name="service_type_type" class="service_type_type" formcontrolname="radio" value="unmanaged" @if( $support == 'unmanaged') {{ $checked }} @endif disabled>
                            <span>No Support</span>
                            <span class="checkmark"></span>
                        </label>
                    </div>                                        
                </div>               
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="service_type_price">Price</label>
                        <input type="text" name="service_type_price" id="service_type_price" class="form-control" value="{{ $support_price ?? '' }}" readonly>
                    </div>
                </div>                            
            </div> 
        </div>
    </div>
</div>