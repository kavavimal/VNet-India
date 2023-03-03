
<div class="modal fade bd-example-modal-md-plan-list" id="planlist_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle-1">Add Plan Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="plan-server-location-submit" data-url="{{route('serverLocation-store')}}" data-id="id" data-name="billing-name">
                <div class="modal-body">
                    <input type="hidden" id="plan-list-id" class="id" name="id" value="0" />
                    <input type="hidden" id="type" name="type" value="add" />
                    <div class="row">                       
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="storage">Storage</label>
                                <input type="text" name="storage" id="storage" class="form-control">
                                <div class="error" style="color:red;" id="storage_error"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="storage_per_gb">Storage Per GB</label>
                                <input type="text" name="storage_per_gb" id="storage_per_gb" class="form-control">
                                <div class="error" style="color:red;" id="storage_per_gb_error"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="billing_cycle">Billing Cycle</label>
                                <select id="billing_cycle" name="billing_cycle" class="form-control select2 billing-cycle">
                                    <option value="0">Select Billing Cycle</option>
                                    @foreach(Helper::ContactCountryAll() as $country)
                                    <option value="{{$country->name;}}">{{ $country->name; }}</option>
                                    @endforeach
                                </select>
                                <div class="error" style="color:red;" id="billing_cycle_error"></div>
                            </div>
                        </div>                        
                        <div class="col-md-6">
                            <label for="productDesc">Server</label>
                            <label class="radio radio-primary">
                                <input type="radio" name="radio" value="linux" formcontrolname="radio" checked>
                                Linux
                                <span class="checkmark"></span>
                            </label>
                            <label class="radio radio-primary">
                                <input type="radio" name="radio" value="windows" formcontrolname="radio">
                                Windows
                                <span class="checkmark"></span>
                            </label>                
                            <div class="error" style="color:red;" id="fname_error"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="window_server">Window Server</label>
                                <input type="text" name="window_server" id="window_server" class="form-control">
                                <div class="error" style="color:red;" id="window_server_error"></div>
                            </div>
                        </div>   
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" name="price" id="price" class="form-control">
                                <div class="error" style="color:red;" id="price_error"></div>
                            </div>
                        </div>                      
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary erp-plan-plan-list-form">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div><script>
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
    // $('body').on('click', '.add_plan_fields', function() {
    //     $('.plan_list_wrap').append(`
    //         <div class="row">
    //             <div class="col-md-2 form-group">
    //                 <div class="d-flex">
    //                     <div class="mr-3">
    //                         <input
    //                             class="planpricing"
    //                             type="checkbox"
    //                             value="0"
    //                             id="planpricing-0"
    //                             name="planpricing[]"
    //                         />
    //                     </div>
    //                     <div>
    //                         <label for="fname">Storage</label>
    //                         <input class="form-control" id="productName" name="productName" type="text">
    //                         <div class="error" style="color:red;" id="name_error"></div>
    //                     </div>
    //                 </div>               
    //             </div>
    //             <div class="col-md-2 form-group">
    //                 <label for="productDesc">Storage Price</label>
    //                     <input class="form-control mr-3" id="productName" name="productName[]" type="text">
    //                     <p class="m-0" style="width: 200px;">Per GB</p>                
    //                 <div class="error" style="color:red;" id="fname_error"></div>
    //             </div>
    //             <div class="col-md-2 form-group">
    //                 <label for="productDesc">Billing Cycle</label>
    //                 <select name="billing_cycle_select" id="billing_cycle_select" class="form-control billing_cycle_select select2">
    //                     <option value="">Select Billing Cycle</option>
    //                 </select>
    //                 <div class="error" style="color:red;" id="fname_error"></div>
    //             </div>
    //             <div class="col-md-2 form-group">
    //                 <label for="productDesc">Server</label>
    //                 <label class="radio radio-primary">
    //                     <input type="radio" name="radio" value="linux" formcontrolname="radio" checked>
    //                     <span>Linux</span>
    //                     <span class="checkmark"></span>
    //                 </label>
    //                 <label class="radio radio-primary">
    //                     <input type="radio" name="radio" value="windows" formcontrolname="radio">
    //                     <span>Windows</span>
    //                     <span class="checkmark"></span>
    //                 </label>                
    //                 <div class="error" style="color:red;" id="fname_error"></div>
    //             </div>
    //             <div class="col-md-2 form-group">
    //                 <label for="productDesc">Windows Serve</label>
    //                 <input class="form-control" id="productName" name="productName" type="text">
    //                 <div class="error" style="color:red;" id="fname_error"></div>
    //             </div>
    //             <div class="col-md-2 form-group">
    //                 <label for="productDesc">Price</label>
    //                 <input class="form-control" id="productName" name="productName" type="text">
    //                 <div class="error" style="color:red;" id="fname_error"></div>
    //             </div>
    //         </div>
    //     `);
    // });    
</script>