<div class="modal fade bd-example-modal-md-server-location" id="serverLocation_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle-1">Add Server Location</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="plan-server-location-submit" data-url="{{route('serverLocation-store')}}" data-id="id" data-name="billing-name">
                <div class="modal-body">
                    <input type="hidden" id="server-loaction-id" class="id" name="id" value="0" />
                    <input type="hidden" id="type" name="type" value="add" />
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fname">Base Country</label>
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
                                <label for="fname">Amount</label>
                                <input type="text" name="amount" id="amount" class="form-control">
                                <div class="error" style="color:red;" id="amount_error"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fname">Currency</label>
                                <input type="text" name="currency" id="currency" class="form-control">
                                <div class="error" style="color:red;" id="currency_error"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fname">Server Location Country</label>
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
                                <label for="fname">Percentage</label>
                                <input type="text" name="percentage" id="percentage" class="form-control">
                                <div class="error" style="color:red;" id="percentage_error"></div>
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
<div class="modal fade bd-Delete-modal-sm" id="billing_delete_modal" tabindex="-1" role="dialog" aria-labelledby="delete-billing" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete-billing">Confirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <strong>Are you sure to delete this Billing Cycle?</strong>
                <span id="billing_name_show"></span>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="billing_remove_url" name="billing_remove_url" value="{{route('billing-delete')}}" />
                <input type="hidden" id="billing_id_delete" name="billing_id_delete" value="" />
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
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('.error').text('');
                    let data = response.data;
                    if (data && data.id > 0)
                        if ($('#type').val() === 'add') {
                            var rows = $("<tr><td>" +
                                data.id + "</td><td>" +
                                data.base_country + "</td><td>" +
                                data.amount + "</td><td>" +
                                data.currency + "</td><td>" +
                                data.server_location_country + "</td><td>" +
                                data.percentage + "</td><td>" +
                                "<button type='button' class='btn btn-outline-primary btn-sm edit-item-serverlocation mr-1' data-id='` + data.id + `' data-name='` + data.base_country + `' data-toggle='modal' title='Edit'><i class='nav-icon i-pen-4'></i></button><button type='button' class='btn btn-outline-primary btn-sm delete-item-serverlocation' data-id='` + data.id + `' data-name='` + data.base_country + `' data-toggle='modal' title='Delete'><i class='nav-icon i-remove'></i></button>" + "</td></tr>");

                            $('.server_location_list_tbl_view').append(rows);
                        } else {
                            $('.server_location_list_wrap').find('#server-location-' + data.id).replaceWith(`
                            <div class="form-check" id="server-location-` + data.id + `">
                            <input class="form-check-input server_location" type="checkbox" value="` + data.id + `" id="server-location-` + data.id + `" name="server_location[]">
                                <input class="form-check-input server_location" type="checkbox" value="` + data.id + `" id="server-location-` + data.id + `" name="server_location[]">
                                <label class="form-check-label mr-4 mb-2" for="server-location-` + data.id + `">` + data.base_country + `</label>
                                <label class="form-check-label mr-4 mb-2" for="server-location-` + data.id + `">` + data.amount + `</label>
                                <label class="form-check-label mr-4 mb-2" for="server-location-` + data.id + `">` + data.currency + `</label>
                                <label class="form-check-label mr-4 mb-2" for="server-location-` + data.id + `">` + data.server_location_country + `</label>
                                <label class="form-check-label mr-4 mb-2" for="server-location-` + data.id + `">` + data.percentage + `</label>

                                <button type="button" class="btn btn-outline-primary btn-sm edit-item-serverlocation mr-1" data-id="` + data.id + `" data-name="` + data.base_country + `" data-toggle="modal" title="Edit"><i class="nav-icon i-pen-4"></i></button>
                                <button type="button" class="btn btn-outline-primary btn-sm delete-item-serverlocation" data-id="` + data.id + `" data-name="` + data.base_country + `" data-toggle="modal" title="Delete"><i class="nav-icon i-remove"></i></button>
                            </div>
                        `);
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
              }
            }
        });
    })

    // // save billing
    // $(".plan-billing-submit").submit(function(e) {
    //     e.preventDefault();
    //     var submit_url = $(this).attr("data-url");
    //     var data_id = $(this).attr("data-id");
    //     var data_name = $(this).attr("data-name");
    //     $.ajax({
    //         url: submit_url,
    //         type: "POST",
    //         data: {
    //             "_token": "{{ csrf_token() }}",
    //             id: $('#billing-id').val(),
    //             billing_name: $('#billing_name').val(),
    //         },
    //         dataType: 'json',
    //         success: function(response) {
    //             if (response.success) {
    //                 $('.error').text('');
    //                 let data = response.data;
    //                 if (data && data.id > 0)
    //                 if($('#type').val() === 'add'){
    //                     $('.billing_list_wrap').append(`
    //                         <div class="form-check" id="billing-`+data.id+`">
    //                             <input class="form-check-input billing_cycle" type="checkbox" value="` + data.id + `" id="billing-cycle-` + data.id + `" name="billing_cycle[]">
    //                             <label class="form-check-label mr-4 mb-2" for="billing-cycle-` + data.id + `">`+data.billing_name+`</label>
    //                             <button type="button" class="btn btn-outline-primary btn-sm edit-item-billing mr-1" data-id="`+data.id+`" data-name="`+data.billing_name+`" data-toggle="modal" title="Edit"><i class="nav-icon i-pen-4"></i></button>
    //                             <button type="button" class="btn btn-outline-primary btn-sm delete-item-billing" data-id="`+data.id+`" data-name="`+data.billing_name+`" data-toggle="modal" title="Delete"><i class="nav-icon i-remove"></i></button>
    //                         </div>
    //                     `);
    //                 } else {
    //                     $('.billing_list_wrap').find('#billing-'+data.id).replaceWith(`
    //                         <div class="form-check" id="billing-`+data.id+`">
    //                             <input class="form-check-input billing_cycle" type="checkbox" value="` + data.id + `" id="billing-cycle-` + data.id + `" name="billing_cycle[]">
    //                             <label class="form-check-label mr-4 mb-2" for="billing-cycle-` + data.id + `">`+data.billing_name+`</label>
    //                             <button type="button" class="btn btn-outline-primary btn-sm edit-item-billing mr-1" data-id="`+data.id+`" data-name="`+data.billing_name+`" data-toggle="modal" title="Edit"><i class="nav-icon i-pen-4"></i></button>
    //                             <button type="button" class="btn btn-outline-primary btn-sm delete-item-billing" data-id="`+data.id+`" data-name="`+data.billing_name+`" data-toggle="modal" title="Delete"><i class="nav-icon i-remove"></i></button>
    //                         </div>
    //                     `);
    //                 }
    //                 $('#type').val('add');
    //                 $('#billing-id').val('');
    //                 $('#billing_name').val('');
    //                 $('#billing_modal').modal('hide');
    //             } else if (response.error) {
    //                 response.error['billing_name'] ? $('#billing_name_error').text(response.error['billing_name']) : $('#billing_name_error').text('');
    //             }
    //         }
    //     });
    // });

    // // edit billing
    // $(document).on("click", ".billing_list_wrap .edit-item-billing", function() {
    //     let id = $(this).attr('data-id');
    //     let name = $(this).attr('data-name');
    //     $('.plan-billing-submit').attr('data-id',id).attr('data-name',name);
    //     $('#billing-id').val(id);
    //     $('#type').val('edit');
    //     $('#billing_name').val(name);
    //     $('#billing_modal').modal('show');
    // });

    // // remove billing
    // $(document).on("click", ".confirm-delete-item-billing", function(e) {
    //     e.preventDefault();
    //     var submit_url = $(document).find("#billing_remove_url").val();
    //     var data_id = $('#billing_id_delete').val();
    //     $.ajax({
    //         url: submit_url,
    //         type: "POST",
    //         data: {
    //             "_token": "{{ csrf_token() }}",
    //             id: data_id,
    //         },
    //         dataType: 'json',
    //         success: function(response) {
    //             if (response.success) {
    //                 $('.error').text('');
    //                 $('.billing_list_wrap').find(`#billing-`+data_id).remove();
    //                 $('#billing_id_delete').val('');
    //                 $('#billing_name_show').text('');
    //                 $('#billing_delete_modal').modal('hide');
    //             } else if (response.error) {
    //                 console.log('error', response.error);
    //             }
    //         }
    //     });
    // });

    // $(document).on("click", ".billing_list_wrap .delete-item-billing", function() {        
    //     $('#billing_name_show').text($(this).attr('data-name'));
    //     $('#billing_id_delete').val($(this).attr('data-id'));
    //     $('#billing_delete_modal').modal('show');
    // });
    // $(document).ready(function(){
    //     $('.base-country').select2({
    //         dropdownParent: $('#serverLocation_modal')
    //     });
    //     $('.server-location-country').select2({
    //         dropdownParent: $('#serverLocation_modal')
    //     });
    // });
</script>