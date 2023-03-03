<div class="modal fade bd-example-modal-md-server-location" id="serverLocation_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle-1">Add/Edit Server Location</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="plan-server-location-submit" data-url="{{route('serverLocation-store')}}" data-id="id" data-name="server-location-name">
                <div class="modal-body">
                    <input type="hidden" id="server-loaction-id" class="id" name="id" value="0" />
                    <input type="hidden" id="type" name="type" value="add" />
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="base_country">Base Country</label>
                                <select id="base_country" name="base_country" class="form-control select2 base-country">
                                    <option value="0">Select Base Country</option>
                                    @foreach(Helper::ContactCountryAll() as $country)
                                    <option value="{{$country->name;}}">{{ $country->name; }}</option>
                                    @endforeach
                                </select>
                                <div class="error" style="color:red;" id="base_country_error"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="text" name="amount" id="amount" class="form-control">
                                <div class="error" style="color:red;" id="amount_error"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="currency">Currency</label>
                                <input type="text" name="currency" id="currency" class="form-control">
                                <div class="error" style="color:red;" id="currency_error"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="server_location_country">Server Location Country</label>
                                <select id="server_location_country" name="server_location_country" class="form-control select2 server-location-country">
                                    <option value="0">Select Base Country</option>
                                    @foreach(Helper::ContactCountryAll() as $country)
                                    <option value="{{$country->name;}}">{{ $country->name; }}</option>
                                    @endforeach
                                </select>
                                <div class="error" style="color:red;" id="server_location_country_error"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="percentage">Percentage</label>
                                <input type="text" name="percentage" id="percentage" class="form-control">
                                <div class="error" style="color:red;" id="percentage_error"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group updownradios">
                                <label>Upgrade/Downgrade</label>
                                <div class="toggle w-10">
                                    <input type="radio" name="upgrade_downgrade" class="upgrade_downgrade" value="upgrade" id="upgrade" />
                                    <label for="upgrade"><i class='nav-icon i-up1'></i></label>
                                    <input type="radio" name="upgrade_downgrade" class="upgrade_downgrade" value="downgrade" id="downgrade" />
                                    <label for="downgrade"><i class='nav-icon i-down1'></i></label>
                                </div>
                                <div class="error" style="color:red;" id="upgrade_downgrade_error"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary erp-plan-server-location-form">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade bd-Delete-modal-sm" id="sl_delete_modal" tabindex="-1" role="dialog" aria-labelledby="delete-billing" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sl-billing">Confirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <strong>Are you sure to delete this Server Location?</strong>
                <span id="sl_name_show"></span>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="sl_id_delete" name="sl_id_delete" value="" />
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger confirm-delete-item-billing">Yes Delete</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on("click", ".erp-plan-server-location-form", function() {
        $(".plan-server-location-submit").submit();
    });

    function calculate_percentage() {
        let amount = $('#amount').val();
        let percent = $('#percentage').val();
        let upgrade_downgrade = $('input[name="upgrade_downgrade"]').val();
        if (amount && percent && upgrade_downgrade) {
            let final_amount = amount * percent / 100;
            if (upgrade_downgrade === 'upgrade') {
                $('#amount').val(parseInt(amount) + parseInt(final_amount));
            } else if (upgrade_downgrade === 'downgrade') {
                $('#amount').val(parseInt(amount) - parseInt(final_amount));
            }
        }
    }

    $(document).on('change', '#amount', function() {
        $('#percentage').val('');
    })
    $(document).on('change', '#percentage,input[name="upgrade_downgrade"]', function() {
        calculate_percentage();
    })

    // save server location data
    $(".plan-server-location-submit").submit(function(e) {
        e.preventDefault();
        var submit_url = $(this).attr("data-url");
        var data_id = $(this).attr("data-id");
        var data_name = $(this).attr("data-name");

        $.ajax({
            url: submit_url,
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                id: $('#server-loaction-id').val(),
                base_country: $('#base_country').val(),
                amount: $('#amount').val(),
                currency: $('#currency').val(),
                server_location_country: $('#server_location_country').val(),
                percentage: $('#percentage').val(),
                upgrade_downgrade: $('.upgrade_downgrade:checked').val(),
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('.error').text('');
                    let data = response.data;
                    if (data && data.id > 0)
                        if ($('#type').val() === 'add') {
                            var rows = $("<tr id='serverlocation-" + data.id + "'><td>" +
                                data.id + "</td><td>" +
                                data.base_country + "</td><td>" +
                                data.amount + "</td><td>" +
                                data.currency + "</td><td>" +
                                data.server_location_country + "</td><td>" +
                                data.percentage + "</td><td>" +
                                data.upgrade_downgrade + "</td><td>" +
                                "<button type='button' class='btn btn-outline-primary btn-sm edit-item-serverlocation mr-1' data-id='` + data.id + `' data-name='` + data.base_country + `' data-toggle='modal' title='Edit'><i class='nav-icon i-pen-4'></i></button><button type='button' class='btn btn-outline-primary btn-sm delete-item-serverlocation' data-id='` + data.id + `' data-name='` + data.base_country + `' data-toggle='modal' title='Delete'><i class='nav-icon i-remove'></i></button>" + "</td></tr>");

                            $('.server_location_list_tbl_view').append(rows);
                        } else {
                            var rows2 = $("<tr id='serverlocation-" + data.id + "'><td>" +
                                data.id + "</td><td>" +
                                data.base_country + "</td><td>" +
                                data.amount + "</td><td>" +
                                data.currency + "</td><td>" +
                                data.server_location_country + "</td><td>" +
                                data.percentage + "</td><td>" +
                                data.upgrade_downgrade + "</td><td>" +
                                "<button type='button' class='btn btn-outline-primary btn-sm edit-item-serverlocation mr-1' data-id='` + data.id + `' data-name='` + data.base_country + `' data-toggle='modal' title='Edit'><i class='nav-icon i-pen-4'></i></button><button type='button' class='btn btn-outline-primary btn-sm delete-item-serverlocation' data-id='` + data.id + `' data-name='` + data.base_country + `' data-toggle='modal' title='Delete'><i class='nav-icon i-remove'></i></button>" + "</td></tr>");
                            $('.server_location_list_wrap').find('#serverlocation-' + data.id).replaceWith(rows2);
                        }
                    // $('#type').val('add');
                    // $('#billing-id').val('');
                    // $('#billing_name').val('');
                    $('#serverLocation_modal').modal('hide');
                } else if (response.error) {
                    response.error['base_country'] ? $('#base_country_error').text(response.error['base_country']) : $('#base_country_error').text('');
                    response.error['amount'] ? $('#amount_error').text(response.error['amount']) : $('#amount_error').text('');
                    response.error['currency'] ? $('#currency_error').text(response.error['currency']) : $('#currency_error').text('');
                    response.error['server_location_country'] ? $('#server_location_country_error').text(response.error['server_location_country']) : $('#server_location_country_error').text('');
                    response.error['percentage'] ? $('#percentage_error').text(response.error['percentage']) : $('#percentage_error').text('');
                    response.error['upgrade_downgrade'] ? $('#upgrade_downgrade_error').text(response.error['upgrade_downgrade']) : $('#upgrade_downgrade_error').text('');
                }
            }
        });
    })

    // remove server location
    $(document).on("click", "#sl_delete_modal .confirm-delete-item-billing", function(e) {
        e.preventDefault();
        var url = "{{ route('serverLocation-delete', ':id') }}";
        var data_id = $('#sl_id_delete').val();
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
                    $('.server_location_list_wrap').find(`#serverlocation-` + data_id).remove();
                    $('#sl_id_delete').val('');
                    $('#sl_name_show').text('');
                    $('#sl_delete_modal').modal('hide');
                } else if (response.error) {
                    console.log('error', response.error);
                }
            }
        });
    });
    $(document).on("click", ".server_location_list_wrap .delete-item-serverlocation", function() {
        $('#sl_name_show').text($(this).attr('data-name'));
        $('#sl_id_delete').val($(this).attr('data-id'));
        $('#sl_delete_modal').modal('show');
    });

    // edit server location
    $(document).on("click", ".server_location_list_wrap .edit-item-serverlocation", function() {
        let id = $(this).attr('data-id');
        let basecountry = $(this).attr('data-basecountry');
        let amount = $(this).attr('data-amount');
        let currency = $(this).attr('data-currency');
        let server_location_country = $(this).attr('data-server-location-country');
        let percentage = $(this).attr('data-percentage');
        let upgrade_downgrade = $(this).attr('data-upgrade-downgrade');

        $('.plan-server-location-submit').attr('data-id',id).attr('data-name',basecountry);
        $('#server-loaction-id').val(id);
        $('#type').val('edit');

        $('#base_country').val(basecountry).trigger('change');;
        $('#amount').val(amount);
        $('#currency').val(currency);
        $('#server_location_country').val(server_location_country).trigger('change');;
        $('#percentage').val(percentage);
        if(upgrade_downgrade==='upgrade'){
            $('#upgrade').attr('checked', 'checked');
        }else if(upgrade_downgrade==='downgrade'){
            $('#downgrade').attr('checked', 'checked');
        }else{
            $('.upgrade_downgrade').removeAttr('checked');
        }
        
        $('#serverLocation_modal').modal('show');
    })

</script>