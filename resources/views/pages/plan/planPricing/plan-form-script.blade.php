<div class="modal fade bd-example-modal-md-plan-list" id="planlist_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle-1">Add Plan Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="plan-pricing-billing-submit" data-url="{{route('planpricing-store')}}" data-id="id" data-name="billing-name">
                <div class="modal-body">
                    <input type="hidden" id="plan-list-id" class="id" name="id" value="0" />
                    <input type="hidden" id="type" name="type" value="add" />
                    <div class="row align-items-center">                       
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="storage">Storage</label>
                                <input type="number" name="storage" id="storage" class="form-control">
                                <p>GB</p>
                                <div class="error" style="color:red;" id="storage_error"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="storage_price">Storage Price</label>
                                <input type="number" name="storage_price" id="storage_price" class="form-control">
                                <p>Per GB</p>
                                <div class="error" style="color:red;" id="storage_price_error"></div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="billing_cycle">Billing Cycle</label>
                                <select id="billing_cycle" name="billing_cycle" class="form-control billing-cycle">
                                    <option value="0">Select Billing Cycle</option>
                                    @foreach(Helper::PlanPlanBillingCycleAll() as $country)
                                    <option value="{{$country->plan_billing_name;}}">{{ $country->plan_billing_name; }}</option>
                                    @endforeach
                                </select>                                
                                <div class="error" style="color:red;" id="billing_cycle_error"></div>
                            </div>
                        </div>              
                        <div class="col-md-1">
                        <button type="button" class="btn btn-outline-primary btn-sm edit-item mr-1 mt-2" style="height: calc(1.5em + 0.75rem + 2px);" data-toggle="modal" title="Add" data-target=".bd-example-modal-md-plan-billing"><i class="nav-icon i-add"></i></button>
                        </div>          
                        <div class="col-md-6">
                            <label for="productDesc">Server</label>
                            <div class="d-flex">
                                <label class="radio radio-primary mr-4">
                                    <input type="radio" name="planPricingServer" value="linux" formcontrolname="radio" checked>
                                    Linux
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio radio-primary">
                                    <input type="radio" name="planPricingServer" value="windows" formcontrolname="radio">
                                    Windows
                                    <span class="checkmark"></span>
                                </label>
                            </div> 
                            <div class="error" style="color:red;" id="servername_error"></div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="window_server_percentage">Windows Server Percentage</label>
                                <input type="number" name="window_server_percentage" id="window_server_percentage" class="form-control window_server_percentage" disabled>
                                <div class="error" style="color:red;" id="window_server_percentage_error"></div>
                            </div>
                        </div>   
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="window_server">Upgrade/Downgrade</label>
                                <select id="upgrade_downgrade" name="upgrade_downgrade" class="form-control upgrade_downgrade" disabled>
                                    <option value="none">None</option>
                                    <option value="upgrade">Upgrade</option>
                                    <option value="downgrade">Downgrade</option>
                                </select>
                                <div class="error" style="color:red;" id="upgrade_downgrade_error"></div>
                            </div>
                        </div>   
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="final_price">Price</label>
                                <input type="text" name="final_price" id="final_price" class="form-control" readonly>
                                <div class="error" style="color:red;" id="final_price_error"></div>
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
</div>
<div class="modal fade bd-example-modal-md-plan-billing" id="plan_billing" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-1" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle-1">Add Plan Billing Cycle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="plan-plan-billing-submit" data-url="{{route('plan-billing-store')}}" data-id="id" data-name="plan-billing-name">
                <div class="modal-body">
                    <input type="hidden" name="plan_billing_id" value="0">
                    <div class="row">                       
                        <div class="col-md-12 form-group">
                            <label for="plan_billing_name">Plan Billing Name</label>
                            {!! Form::text('plan_billing_name', null, array('placeholder' => 'Enter Plan Billing Name','class' => 'form-control' , 'id' => 'plan_billing_name')) !!}
                            <div class="error" style="color:red;" id="plan_billing_name_error"></div>
                        </div>        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary erp-plan-plan-billing-form">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade bd-Delete-modal-sm" id="plan_pricing_delete_modal" tabindex="-1" role="dialog" aria-labelledby="delete-billing" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sl-billing">Confirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <strong>Are you sure to delete this Plan Pricing?</strong>                
            </div>
            <div class="modal-footer">
                <input type="hidden" id="plan_pricing_id_delete" name="plan_pricing_id_delete" value="" />
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger confirm-delete-item-plan-pricing">Yes Delete</button>
            </div>
        </div>
    </div>
</div>
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
    $('body').on('change', 'input[type=radio][name=planPricingServer]', function() {    
        calculate_amount();
        if (this.value == 'linux') {
            $('.window_server_percentage').attr('disabled', true); 
            $('.upgrade_downgrade').attr('disabled', true); 
            $('.window_server_percentage').val(0); 
            $(".upgrade_downgrade").val("none");
        }
        else if (this.value == 'windows') {
            $('.window_server_percentage').attr('disabled', false); 
            $('.upgrade_downgrade').attr('disabled', false); 
        }
    });
    $(document).on('change', 'select[name="upgrade_downgrade"]', function() {   
        calculate_amount();
    })
    function calculate_amount(){
        var storage = $('#storage').val();
        var storage_price = $('#storage_price').val();
        var final_price = $('#final_price');
        var server = $('input[type=radio][name=planPricingServer]:checked').val();        
        var percent = $('.window_server_percentage').val();
        var amount = storage*storage_price;
        
        if(server == 'linux'){
            final_price.val(amount);
        }
        if(server == 'windows'){            
            let upgrade_downgrade = $('select[name="upgrade_downgrade"]').val();
            if (storage && storage_price && upgrade_downgrade) {
                let final_amount = amount * percent / 100;
                if (upgrade_downgrade === 'upgrade') {
                    let am = parseInt(amount) + parseInt(final_amount)
                    final_price.val(am);
                } else if (upgrade_downgrade === 'downgrade') {
                    let am = parseInt(amount) - parseInt(final_amount)
                    final_price.val(am);
                }else if(upgrade_downgrade === 'none'){
                    final_price.val(amount);
                }
            }
        }
        
    }
    $('body').on('keyup', '#storage', function() {   
        calculate_amount();
    });
    $('body').on('keyup', '#storage_price', function() {   
        calculate_amount();
    });
    $(document).on("click", ".erp-plan-plan-billing-form", function() {
        $(".plan-plan-billing-submit").submit();
    });
    $(".plan-plan-billing-submit").submit(function(e) {
        e.preventDefault();
        var submit_url = $(this).attr("data-url");
        var data_id = $(this).attr("data-id");
        var data_name = $(this).attr("data-name");
        $.ajax({
            url: submit_url,
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                id: $('#plan_billing_id').val(),
                plan_billing_name: $('#plan_billing_name').val(),                
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('.error').text('');
                    console.log(response);
                    let data = response.data;
                    if (data && data.id > 0){
                        $('.billing-cycle').append($("<option></option>").attr("value", data.plan_billing_name).text(data.plan_billing_name)); 
                    }                                  
                    $('#plan_billing_id').val('');
                    $('#plan_billing_name').val('');
                    $('#plan_billing').modal('hide');
                } else if (response.error) {
                    response.error['plan_billing_name'] ? $('#plan_billing_name_error').text(response.error['plan_billing_name']) : $('#plan_billing_name_error').text('');
                }
            }
        });
    });
    $(document).on("click", ".erp-plan-plan-list-form", function() {
        $(".plan-pricing-billing-submit").submit();
    });
    $(".plan-pricing-billing-submit").submit(function(e) {
        e.preventDefault();
        var submit_url = $(this).attr("data-url");
        var data_id = $(this).attr("data-id");
        var data_name = $(this).attr("data-name");
        $.ajax({
            url: submit_url,
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                id: $('#plan-list-id').val(),
                storage: $('#storage').val(),
                storage_price: $('#storage_price').val(),
                billing_cycle: $('.billing-cycle').val(),
                planPricingServer: $('input[type=radio][name=planPricingServer]:checked').val(),
                window_server_percentage: $('#window_server_percentage').val(),
                upgrade_downgrade: $('#upgrade_downgrade').val(),
                final_price: $('#final_price').val(),
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('.error').text('');
                    console.log(response);
                    let data = response.data;
                    if (data && data.id > 0){
                        if ($('#type').val() === 'add') {
                            var rows = $(`<tr id='planPricing-` + data.id + `'><td>
                                    <input class='plan_pricing_check_box'
                                    type='checkbox'
                                    value='`+data.id+`'
                                    id='plan_pricing_check_box-`+data.id+`'
                                    name='plan_pricing_check_box[]'
                                /></td><td>` +
                                data.storage + "</td><td>" +
                                data.storage_price + "</td><td>" +
                                data.billing_cycle + "</td><td>" +
                                data.server + "</td><td>" +
                                data.window_server + "</td><td>" +
                                data.upgrade_downgrade + "</td><td>" +
                                data.price + "</td><td>" +
                                "<button type='button' class='btn btn-outline-primary btn-sm edit-item-plan-pricing mr-1' data-id='` + data.id + `'data-storage='` + data.storage + `'data-storage_price='` + data.storage_price + `'data-billing_cycle='` + data.billing_cycle + `'data-server='` + data.server + `'data-window_server='` +data.window_server + `'data-upgrade_downgrade='` +data.upgrade_downgrade + `'data-price='` + data.price + `'data-toggle='modal' title='Edit'><i class='nav-icon i-pen-4'></i></button><button type='button' class='btn btn-outline-primary btn-sm delete-item-plan-pricing' data-id='` + data.id + `'data-toggle='modal' title='Delete'><i class='nav-icon i-remove'></i></button>" + "</td></tr>");
                            $('.plan_price_list_tbl_view').append(rows);
                        }
                        else {
                            var rows2 = $("<tr id='planPricing-" + data.id + "'><td>" +
                                data.id + "</td><td>" +
                                data.storage + "</td><td>" +
                                data.storage_price + "</td><td>" +
                                data.billing_cycle + "</td><td>" +
                                data.server + "</td><td>" +
                                data.window_server + "</td><td>" +
                                data.upgrade_downgrade + "</td><td>" +
                                data.price + "</td><td>" +
                                "<button type='button' class='btn btn-outline-primary btn-sm edit-item-plan-pricing mr-1' data-id='` + data.id + `'data-storage='` + data.storage + `'data-storage_price='` + data.storage_price + `'data-billing_cycle='` + data.billing_cycle + `'data-server='` + data.server + `'data-window_server='` +data.window_server + `'data-upgrade_downgrade='` +data.upgrade_downgrade + `'data-price='` + data.price + `'data-toggle='modal' title='Edit'><i class='nav-icon i-pen-4'></i></button><button type='button' class='btn btn-outline-primary btn-sm delete-item-plan-pricing' data-id='` + data.id + `'data-toggle='modal' title='Delete'><i class='nav-icon i-remove'></i></button>" + "</td></tr>");
                            $('.plan_price_list_tbl_view').find('#planPricing-' + data.id).replaceWith(rows2);
                        }
                    }                                  
                    $('#plan-list-id').val('');
                    $('#storage').val('');
                    $('#storage_price').val('');
                    $('#upgrade_downgrade').val('');
                    $('#final_price').val('');
                    $('.billing-cycle').val('0');                    
                    $('#planlist_modal').modal('hide');
                } else if (response.error) {
                    response.error['storage'] ? $('#storage_error').text(response.error['storage']) : $('#storage_error').text('');                    
                    response.error['storage_price'] ? $('#storage_price_error').text(response.error['storage_price']) : $('#storage_price_error').text('');
                    response.error['billing_cycle'] ? $('#billing_cycle_error').text(response.error['billing_cycle']) : $('#billing_cycle_error').text('');                    
                    response.error['window_server_percentage'] ? $('#window_server_percentage_error').text(response.error['window_server_percentage']) : $('#window_server_percentage_error').text('');
                    response.error['upgrade_downgrade'] ? $('#upgrade_downgrade_error').text(response.error['upgrade_downgrade']) : $('#upgrade_downgrade_error').text('');
                    response.error['final_price'] ? $('#final_price_error').text(response.error['final_price']) : $('#final_price_error').text('');
                }
            }
        });
    });
    // remove plan pricing
    $(document).on("click", "#plan_pricing_delete_modal .confirm-delete-item-plan-pricing", function(e) {
        e.preventDefault();
        var url = "{{ route('planpricing-delete', ':id') }}";
        var data_id = $('#plan_pricing_id_delete').val();
        url = url.replace(':id', data_id);
        $.ajax({
            url: url,
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                id: data_id,
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('.error').text('');
                    $('.plan_price_list_tbl_view').find(`#planPricing-` + data_id).remove();
                    $('#plan_pricing_id_delete').val('');                    
                    $('#plan_pricing_delete_modal').modal('hide');
                } else if (response.error) {
                    console.log('error', response.error);
                }
            }
        });
    });
    $(document).on("click", ".plan_price_list_tbl_view .delete-item-plan-pricing", function() {        
        $('#plan_pricing_id_delete').val($(this).attr('data-id'));
        $('#plan_pricing_delete_modal').modal('show');
    });
    // edit plan pricing
    $(document).on("click", ".plan_price_list_tbl_view .edit-item-plan-pricing", function() {
        let id = $(this).attr('data-id');
        let storage = $(this).attr('data-storage');
        let storage_price = $(this).attr('data-storage_price');
        let billing_cycle = $(this).attr('data-billing_cycle');
        let server = $(this).attr('data-server');
        let window_server = $(this).attr('data-window_server');
        let upgrade_downgrade = $(this).attr('data-upgrade_downgrade');
        let price = $(this).attr('data-price');
        
    
        $('.plan-pricing-billing-submit').attr('data-id',id).attr('data-name','base');
        $('#plan-list-id').val(id);
        $('#type').val('edit');

        $('#storage').val(storage),
        $('#storage_price').val(storage_price),        
        $('.billing-cycle').val(billing_cycle).trigger('change');
        $("input[name='planPricingServer'][value='"+server+"']").prop('checked', true).trigger('change');
        $('#window_server_percentage').val(window_server);
        $('select[name=upgrade_downgrade]').val(upgrade_downgrade);
        $('#final_price').val(price);                
        calculate_amount();
        $('#planlist_modal').modal('show');
    });
</script>