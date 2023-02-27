<div class="card mb-4">
    <div class="card-body">
        <h4 class="mb-3" id="prod_name_to_display"></h4>
        <div class="row">
            <div class="col-md-2 form-group">
                <div class="">
                    <input
                        class="form-check-input planpricing"
                        type="checkbox"
                        value="0"
                        id="planpricing-0"
                        name="planpricing[]"
                        />
                </div>
                <label for="fname">Storage</label>
                <input class="form-control" id="productName" name="productName" type="text">
                <div class="error" style="color:red;" id="name_error"></div>
            </div>
            <div class="col-md-2 form-group">
                <label for="productDesc">Storage Price</label>
                    <input class="form-control mr-3" id="productName" name="productName" type="text">
                    <p class="m-0" style="width: 200px;">Per GB</p>
                <div class="error" style="color:red;" id="fname_error"></div>
            </div>
            <div class="col-md-2 form-group">
                <label for="productDesc">Billing Cycle</label>
                <select name="billing_cycle_select" id="billing_cycle_select" class="form-control billing_cycle_select">
                    <option value="">Select Billing Cycle</option>
                </select>
                <div class="error" style="color:red;" id="fname_error"></div>
            </div>
            <div class="col-md-2 form-group">
                <label for="productDesc">Server</label>
                <label class="radio radio-primary">
                    <input type="radio" name="radio" value="linux" formcontrolname="radio" checked>
                    <span>Linux</span>
                    <span class="checkmark"></span>
                </label>
                <label class="radio radio-primary">
                    <input type="radio" name="radio" value="windows" formcontrolname="radio">
                    <span>Windows</span>
                    <span class="checkmark"></span>
                </label>                
                <div class="error" style="color:red;" id="fname_error"></div>
            </div>
            <div class="col-md-2 form-group">
                <label for="productDesc">Windows Serve</label>
                <input class="form-control" id="productName" name="productName" type="text">
                <div class="error" style="color:red;" id="fname_error"></div>
            </div>
            <div class="col-md-2 form-group">
                <label for="productDesc">Price</label>
                <input class="form-control" id="productName" name="productName" type="text">
                <div class="error" style="color:red;" id="fname_error"></div>
            </div>
        </div>
        <div class="plan_list_wrap"></div>
        <div class="text-right">
            <a href="javascript:void(0);" class="btn btn-primary add_plan_fields"><i class="nav-icon i-add"></i> Add</a>        
        </div>
        
    </div>
</div>