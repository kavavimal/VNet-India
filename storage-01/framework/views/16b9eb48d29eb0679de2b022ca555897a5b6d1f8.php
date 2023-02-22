<script>
    $(document).ready(function() {

        $(document).on('click',".addConsignmentItem", function () {
            var $html = `
                <tr data-id="0" data-changed="0">
                    <td>
                        #
                    </td>
                    <td>
                        <select class="form-control select2 erp-field-conli_pi_id">
                            <option value="">---SELECT---</option>
                        </select>
                    </td>
                    <input type="hidden" class="erp-field-gwt_ctn">
                    <input type="hidden" class="erp-field-ctn_wt">
                    <input type="hidden" class="erp-field-cbm_ctn">
                    <input type="hidden" class="erp-field-prd_pcs_per_ctn">
                    <input type="hidden" class="erp-field-brand_name">
                    <td> <input class="form-control erp-field-bname erp-input" disabled /> </td>
                    <td> <input class="form-control erp-field-prd_supplier_item erp-input" value="" disabled /> </td>
                    <td> <input class="form-control erp-field-prd_description erp-input" value="" disabled /> </td>
                    <td> <input class="form-control erp-field-prd_barcode erp-input" value="" disabled /> </td>
                    <td> <input class="form-control erp-field-prd_hs_code erp-input" value="" disabled /> </td>
                    <td><input class="form-control erp-field-conli_qty erp-input pi-text" value="0" disabled /></td>
                    <td><input class="form-control erp-field-ttl_pkg erp-input pi-text" value="0" /></td>
                    <td><input class="form-control erp-field-gwt erp-input pi-text" value="0" disabled /></td>
                    <td> <input class="form-control erp-field-nwt erp-input pi-text" value="0" disabled /> </td>
                    <td> <input class="form-control erp-field-volume erp-input pi-text" value="0" disabled /> </td>
                    <td>
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="_dot _inline-dot"></span>
                            <span class="_dot _inline-dot"></span>
                            <span class="_dot _inline-dot"></span>
                        </button>
                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 34px, 0px);">
                            <a class="dropdown-item" href="#"><i class="nav-icon i-Close-Window font-weight-bold" aria-hidden="true"> </i> Delete</a>
                            <a type="button" class="dropdown-item erp-pili_duplicate" href="#"><i class="nav-icon i-Duplicate-Layer font-weight-bold" aria-hidden="true"> </i> Duplicate</a>
                        </div>
                    </td>
                </tr>
            `;
            $(".erp-consignmentItem tbody").append($html);
            $(".erp-field-conli_pi_id").select2();

            $('.erp-field-conli_pi_id').select2({
                ajax: {
                    type: 'get',
                    url: "<?php echo e(url('/getpi/')); ?>",
                    data: function (params) {
                        var queryParameters = {
                            q: params.term,
                            c: $(".erp-cust_name").val()
                        }
                        return queryParameters;
                    },
                    processResults: function (data) {
                        console.log(data);
                        return {
                            results: $.map(data.data, function(obj) {
                                return { id: obj.id, text:  obj.id+' - '+obj.product ? obj.product.prd_our_item_no : ''};
                            })
                        };
                    }
                }
            });
        });

        function Cal(tr$){
            tr$.find("input.erp-field-conli_qty").val((Number.parseFloat(tr$.find("input.erp-field-prd_pcs_per_ctn").val() * tr$.find("input.erp-field-ttl_pkg").val()).toFixed(2)));
            console.log(tr$.find("input.erp-field-conli_qty").val());
            tr$.find("input.erp-field-gwt").val((Number.parseFloat(tr$.find("input.erp-field-ttl_pkg").val() * tr$.find("input.erp-field-gwt_ctn").val()).toFixed(2)));
            tr$.find("input.erp-field-nwt").val((Number.parseFloat(tr$.find("input.erp-field-gwt").val() - (tr$.find("input.erp-field-ctn_wt").val() * tr$.find("input.erp-field-ttl_pkg").val())).toFixed(2)));
            tr$.find("input.erp-field-volume").val((Number.parseFloat(tr$.find("input.erp-field-ttl_pkg").val() * tr$.find("input.erp-field-cbm_ctn").val()).toFixed(2)));
        }

        $(document).on("keyup","input.erp-field-ttl_pkg", function(){
            var tr$ = $(this).closest('tr');
            Cal(tr$);
        });

        $(document).on("change","select.erp-field-conli_pi_id", function() {
            var tr$ = $(this).closest('tr');
            var pid = tr$.data("id");
            var proformaInvoiceId = tr$.find('select.erp-field-conli_pi_id').val();
            var field = $(this).closest('tr');
            $.ajax({
                url: "<?php echo e(url('consignment/fetch-pi')); ?>",
                type: "get",
                data: {proformaInvoiceId: proformaInvoiceId,_token: '<?php echo e(csrf_token()); ?>'},
                dataType: 'json',
                success: function(result){
                    console.log(result);
                    field.find('input.erp-field-brand_name').val(result.pi.pili_prd_id);
                    field.find('input.erp-field-bname').val(result.product.brand_name);
                    field.find('input.erp-field-prd_supplier_item').val(result.product.prd_supplier_item);
                    field.find('input.erp-field-prd_description').val(result.product.prd_description);
                    field.find('input.erp-field-prd_barcode').val(result.product.prd_barcode);
                    field.find('input.erp-field-prd_hs_code').val(result.product.prd_hs_code);
                    field.find('input.erp-field-conli_qty').val(Cal(tr$));
                    field.find('input.erp-field-ttl_pkg').val(result.pi ? result.pi.ttl_pkg : 0);
                    field.find('input.erp-field-prd_pcs_per_ctn').val(result.product.prd_pcs_per_ctn);
                    field.find('input.erp-field-gwt_ctn').val(result.product.prd_gw_ctn);
                    field.find('input.erp-field-ctn_wt').val(result.product.prd_ctn_wt);
                    field.find('input.erp-field-cbm_ctn').val(result.product.prd_cbm_ctn);
                    field.find('input.erp-field-gwt').change(Cal(tr$));
                    field.find('input.erp-field-nwt').change(Cal(tr$));
                    field.find('input.erp-field-volume').change(Cal(tr$));
                }
            });
        });

        /* consignment submit form event */
        $(document).on("click", ".erp-con-edit-form", function(){
            $(".erp-form-submit").submit();
        });

        /* consignment submit ajax event */
        $(".erp-form-submit").submit(function (e){
            e.preventDefault();
            var conli_items = [];
            $("#zero_configuration_table tbody tr").each(function(){
                var tr$ = $(this);
                var id = tr$.attr("data-id");
                var changed = tr$.attr("data-changed");
                var $val = tr$.attr("data-val");
                if(changed == "1"){
                    var qty = tr$.find(".erp-field-pili_qty").val();
                    var ttl_pkg = tr$.find(".erp-field-ttl_pkg").val();
                    var conli_pi_id = tr$.find(".erp-field-conli_pi_id").val();
                    var con_id = $(".erp-con_id").val();
                    var brand_name = tr$.find("input.erp-field-brand_name").val();
                    conli_items.push({id,qty,ttl_pkg,conli_pi_id,con_id,brand_name});
                }
                if(changed == "0"){
                    var qty = tr$.find(".erp-field-pili_qty").val();
                    var ttl_pkg = tr$.find(".erp-field-ttl_pkg").val();
                    var conli_pi_id = tr$.find(".erp-field-conli_pi_id").val();
                    var con_id = $(".erp-con_id").val();
                    var brand_name = tr$.find("input.erp-field-brand_name").val();
                    conli_items.push({id,qty,ttl_pkg,conli_pi_id,con_id,brand_name});
                }
            });
            $.ajax({
                url: "<?php echo e(url('/consignment/store')); ?>",
                type:"POST",
                data:{
                    "_token": "<?php echo e(csrf_token()); ?>",
                    ci_id: $(".erp-con_id").val(),
                    con_number: $(".erp-con_number").val(),
                    customer_id: $(".erp-cust_name").val(),
                    date: $(".erp-date").val(),
                    date_ship: $(".erp-date_ship").val(),
                    from_addr_id: $(".from_addr_id").val(),
                    dest_addr_id: $(".dest_addr_id").val(),
                    con_vessel_id: $(".erp-con_vessel_id").val(),
                    con_blno: $(".erp-con_blno").val(),
                    con_payment_type_id: $(".erp-con_payment_type_id").val(),
                    con_type_id: $(".erp-con_type_id").val(),
                    con_status_id: $(".erp-con_status_id").val(),
                    conli_items: conli_items,
                },
                dataType: 'json',
                success:function(response){
                    toastr.info(response.success, response.title);
                    window.setTimeout(function(){
                        if($(".erp-con_id").val() == 0){
                            location.href = "<?php echo e(url('/consignment')); ?>";
                        }else{
                            location.reload();
                        }
                    },3000)
                }
            });
        });

        /* fetch customer address */
        $('.erp-cust_name').on('change', function () {
            var id = this.value;
            $(".customer-address").html('');
            $.ajax({
                url: "<?php echo e(url('/getCustomer/addresses/')); ?>",
                type: "POST",
                data: {
                    id: id,
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                dataType: 'json',
                success: function (result) {
                    $('.customer-address').html('<option value=""> ---SELECT--- </option>');
                    $.each(result.data, function (key, value) {
                        $(".customer-address").append('<option value="' + value
                            .id + '">' + value.address + '</option>');
                    });
                }
            });
        });
    });
</script>
<?php /**PATH C:\xampp\htdocs\erp\resources\views/pages/consignment/script.blade.php ENDPATH**/ ?>