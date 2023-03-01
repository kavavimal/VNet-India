<script>
    $(document).ready(function(){
        var p = $("#product_id option:selected").text();
        $('#prod_name_to_display').text(getWordStr(p));
    });
    $(document).on("change", "#product_id", function() {
        var p = $("#product_id option:selected").text();
        $('#prod_name_to_display').text(getWordStr(p));
    });
    function getWordStr(str) {
        return str.split(/\s+/).slice(0, 2).join(" ");
    }
    $('body').on('change', '.billing_cycle', function() {
        var billing = [];
        $('.billing_cycle:checked').each( function () {            
            billing.push($(this).siblings('label').text());
        });        
        $('.billing_cycle_select').find('option').remove().end().append('<option value="">Select Billig Cycle</option>');
        $.each(billing, function(key, value) {            
            $('.billing_cycle_select').append($("<option></option>").attr("value", value).text(value)); 
        });       
    });
    $(document).ready(function(){
        var billing = [];
        $('.billing_cycle:checked').each( function () {            
            billing.push($(this).siblings('label').text());
        });        
        $('.billing_cycle_select').find('option').remove().end().append('<option value="">Select Billig Cycle</option>');
        $.each(billing, function(key, value) {            
            $('.billing_cycle_select').append($("<option></option>").attr("value", value).text(value)); 
        });
    });
    $('body').on('click', '.add_plan_fields', function() {
        $('.plan_list_wrap').append(`
            <div class="row">
                <div class="col-md-2 form-group">
                    <div class="d-flex">
                        <div class="mr-3">
                            <input
                                class="planpricing"
                                type="checkbox"
                                value="0"
                                id="planpricing-0"
                                name="planpricing[]"
                            />
                        </div>
                        <div>
                            <label for="fname">Storage</label>
                            <input class="form-control" id="productName" name="productName" type="text">
                            <div class="error" style="color:red;" id="name_error"></div>
                        </div>
                    </div>               
                </div>
                <div class="col-md-2 form-group">
                    <label for="productDesc">Storage Price</label>
                        <input class="form-control mr-3" id="productName" name="productName[]" type="text">
                        <p class="m-0" style="width: 200px;">Per GB</p>                
                    <div class="error" style="color:red;" id="fname_error"></div>
                </div>
                <div class="col-md-2 form-group">
                    <label for="productDesc">Billing Cycle</label>
                    <select name="billing_cycle_select" id="billing_cycle_select" class="form-control billing_cycle_select select2">
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
        `);
    });    
</script>