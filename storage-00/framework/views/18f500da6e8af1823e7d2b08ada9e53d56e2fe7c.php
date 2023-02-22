<script>
    $(document).ready(function() {

        /* Drag & drop column event */
        $( "tbody.connectedSortable" )
            .sortable({
                connectWith: ".connectedSortable",
                items: "> tr",
                helper:"clone",
                zIndex: 999990
            }).disableSelection();
            var $tab_items = $( ".nav-tabs > li").droppable({
                accept: ".connectedSortable tr",
                hoverClass: "ui-state-hover",
                drop: function( event, ui ) {
                    return false;
                }
        });

        /* All Proforma invoice item calculations */
        function Cal(tr$){
            var $unitType = tr$.find("input.erp-field-prd_unit_type").val();
            var $ttl_pkg = $unitType == "PKG" ? tr$.find("input.erp-field-pili_qty").val() : (tr$.find("input.erp-field-pili_qty").val() / tr$.find("input.erp-field-prd_pcs_per_ctn").val());
            tr$.find("input.erp-field-prd_ttl_pkg").val(Number.parseFloat($ttl_pkg).toFixed(2));
            tr$.find("input.erp-field-prd_ttl_cbm").val((Number.parseFloat(tr$.find("input.erp-field-prd_ttl_pkg").val() * tr$.find("input.erp-field-prd_cbm_ctn").val()).toFixed(2)));
            tr$.find("input.erp-field-prd_gwt").val((Number.parseFloat(tr$.find("input.erp-field-prd_ttl_pkg").val() * tr$.find("input.erp-field-prd_gwt_ctn").val()).toFixed(2)));
            tr$.find("input.erp-field-prd_nwt").val((Number.parseFloat(tr$.find("input.erp-field-prd_gwt").val() - (tr$.find("input.erp-field-prd_ctn_wt").val() * tr$.find("input.erp-field-prd_ttl_pkg").val())).toFixed(2)));
            tr$.find("input.erp-field-pili_total_usd").val((Number.parseFloat(tr$.find("input.erp-field-pili_sup").val() * tr$.find("input.erp-field-pili_qty").val()).toFixed(2)));
        }

        $(document).on("keyup","input.erp-field-pili_sup", function(){
            var tr$ = $(this).closest('tr');
            Cal(tr$);
        });

        $(document).on("keyup","input.erp-field-pili_qty", function(){
            var tr$ = $(this).closest('tr');
            Cal(tr$);
        });

        /* Product onchange event */
        $(document).on("change","select.erp-field-pili_prd_id", function() {
            var tr$ = $(this).closest('tr');
            var pid = tr$.data("id");
            var productId = tr$.find('select.erp-field-pili_prd_id').val();
            var field = $(this).closest('tr');
            $.ajax({
                url: "<?php echo e(url('proformainvoiceitem/fetch-product')); ?>",
                type: "get",
                data: {pid: pid, productId: productId,_token: '<?php echo e(csrf_token()); ?>'},
                dataType: 'json',
                success: function(result){
                    field.find('select.erp-field-supplier_id').html('');
                    field.find('select.erp-field-supplier_id').append(`
                        <option value="${result.supplier.id}">
                            ${result.supplier.name}
                        </option>
                    `);
                    field.find('input.erp-field-prd_supplier_item').val(result.product.prd_supplier_item);
                    field.find('input.erp-field-prd_our_item_no').val(result.product.prd_our_item_no);
                    field.find('input.erp-field-prd_barcode').val(result.product.prd_barcode);
                    field.find('input.erp-field-prd_hs_code').val(result.product.prd_hs_code);
                    if(result.product.product_images.length !== 0){
                        field.find('.erp-field-prd_images_url').attr('src', "<?php echo e(asset('storage/product')); ?>/"+result.product.id+"/"+result.product.product_images[0].filename);
                    }else{
                        field.find('.erp-field-prd_images_url').attr('src', "<?php echo e(asset('assets/images/sample.jpg')); ?>");
                    }
                    field.find('input.erp-field-prd_gwt_ctn').val(result.product.prd_gw_ctn);
                    field.find('input.erp-field-prd_ctn_wt').val(result.product.prd_ctn_wt);
                    field.find('input.erp-field-prd_pcs_per_ctn').val(result.product.prd_pcs_per_ctn);
                    field.find('input.erp-field-prd_cbm_ctn').val(result.product.prd_cbm_ctn);
                    field.find('input.erp-field-prd_unit_type').val(result.product.prd_unit_type);
                    field.find('select.erp-field-prd_unit_type').html('');
                    field.find('select.erp-field-prd_unit_type').append(`
                        <option value="${result.product.prd_unit_type}">
                            ${result.product.prd_unit_type}
                        </option>
                    `);
                    field.find('input.erp-field-prd_ttl_pkg').val(Cal(tr$));
                    field.find('input.erp-field-prd_ttl_cbm').val(Cal(tr$));
                    field.find('input.erp-field-prd_gwt').val(Cal(tr$));
                    field.find('input.erp-field-prd_nwt').val(Cal(tr$));
                    field.find('input.erp-field-prd_pup').val(result.product.prd_pup);
                    field.find('input.erp-field-pili_upmp').val(result.pi_item ? result.pi_item.pili_upmp : '');
                    field.find('input.erp-field-pili_sup').val(result.pi_item ? result.pi_item.pili_sup : '');
                    field.find('input.erp-field-pili_qty').val(result.pi_item ? result.pi_item.pili_qty : '');
                    field.find('input.erp-field-pili_unit').val(result.product ? result.product.prd_sold_by : '');
                    field.find('input.erp-field-pili_total_usd').change(Cal(tr$));
                }
            });
        });

        /* performa invoice edit form submit button disable event */
        $('.erp-pili-edit-form').attr('disabled', true);

        /* performa invoice submit form event */
        $(document).on("click", ".erp-pili-edit-form", function(){
            $(".erp-form-submit").submit();
        });

        /* proforma invoice on click enable event */
        $(document).on('click',".erp-input, .select2, .erp-button", function(){
            var tr$ = $(this).closest('tr');
            var id = tr$.data("id");
            tr$.attr("data-changed","1");
            $('.erp-pili-edit-form').removeAttr('disabled');
        });

        $(document).on('click',".addProformaInvoiceItem", function () {
            var $html = `
                <tr data-id="0" data-changed="0">
                    <td>
                        #
                    </td>
                    <td>
                        <select class="form-control select2 erp-field-pili_prd_id">
                            <option value="">---SELECT---</option>
                        </select>
                    </td>
                    <td> <select class="form-control erp-field-supplier_id rmBorder" disabled>
                        </select>
                    </td>
                    <td> <input class="form-control erp-field-prd_supplier_item" disabled /> </td>
                    <td> <input class="form-control erp-field-prd_our_item_no" disabled /> </td>
                    <td> <input class="form-control erp-field-prd_barcode" disabled /> </td>
                    <td> <input class="form-control erp-field-prd_hs_code" disabled /> </td>
                    <td>
                        <img class="form-control erp-field-prd_images_url" src="<?php echo e(asset('assets/images/sample.jpg')); ?>" alt="image" />
                    </td>
                    <td> <input class="form-control erp-field-prd_gwt_ctn pi-text" disabled value="0" /> </td>
                    <td> <input class="form-control erp-field-prd_ctn_wt pi-text" disabled value="0" /> </td>
                    <td> <input class="form-control erp-field-prd_pcs_per_ctn pi-text" disabled value="0" /> </td>
                    <td> <input class="form-control erp-field-prd_cbm_ctn pi-text" disabled value="0" /> </td>
                    <td>
                        <select class="form-control erp-field-prd_unit_type rmBorder" disabled>
                        </select>
                    </td>
                    <td> <input class="form-control erp-field-prd_ttl_pkg pi-text" disabled value="0" /> </td>
                    <td> <input class="form-control erp-field-prd_ttl_cbm pi-text" disabled value="0" /> </td>
                    <td> <input class="form-control erp-field-prd_gwt pi-text" disabled value="0" /> </td>
                    <td> <input class="form-control erp-field-prd_nwt pi-text" disabled value="0" /> </td>
                    <td> <input class="form-control erp-field-prd_pup pi-text" disabled value="0" /> </td>
                    <td> <input class="form-control erp-field-pili_upmp pi-text" value="0" /> </td>
                    <td> <input class="form-control erp-field-pili_sup pi-text" value="0" /> </td>
                    <td> <input class="form-control erp-field-pili_qty pi-text" value="0" /> </td>
                    <td> <input class="form-control erp-field-pili_unit" disabled /> </td>
                    <td> <input class="form-control erp-field-pili_total_usd pi-text" value="0" disabled /> </td>
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
            $(".erp-proformaInvoiceItem tbody").append($html);
            $(".erp-field-pili_prd_id").select2();

            $('.erp-field-pili_prd_id').select2({
                ajax: {
                    type: 'get',
                    url: "<?php echo e(url('/getsupllier/')); ?>",
                    data: function (params) {
                        var queryParameters = {
                            q: params.term
                        }
                        return queryParameters;
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data.data, function(obj) {
                                return { id: obj.id, text: obj.prd_supplier_item };
                            })
                        };
                    }
                }
            });
        });

        /* performa invoice submit ajax event */
        $(".erp-form-submit").submit(function (e){
            e.preventDefault();
            var pili_items = [];
            $("#zero_configuration_table tbody tr").each(function(){
                var tr$ = $(this);
                var id = tr$.attr("data-id");
                var changed = tr$.attr("data-changed");
                var $val = tr$.attr("data-val");
                if(changed == "1"){
                    var ttl_pkg = tr$.find(".erp-field-prd_ttl_pkg").val();
                    var ttl_vol = tr$.find(".erp-field-prd_ttl_cbm").val();
                    var gwt = tr$.find(".erp-field-prd_gwt").val();
                    var nwt = tr$.find(".erp-field-prd_nwt").val();
                    var pili_upmp = tr$.find(".erp-field-pili_upmp").val();
                    var pili_sup = tr$.find(".erp-field-pili_sup").val();
                    var pili_qty = tr$.find(".erp-field-pili_qty").val();
                    var pili_prd_id = tr$.find(".erp-field-pili_prd_id").val();
                    var pili_pi_id = $(".erp-pili_id").val();
                    var sup_id = tr$.find(".erp-field-supplier_id").val();
                    pili_items.push({id,ttl_pkg,ttl_vol,gwt,nwt,pili_upmp,pili_sup,pili_qty, pili_prd_id, pili_pi_id,sup_id});
                }
                if(changed == "0"){
                    var ttl_pkg = tr$.find(".erp-field-prd_ttl_pkg").val();
                    var ttl_vol = tr$.find(".erp-field-prd_ttl_cbm").val();
                    var gwt = tr$.find(".erp-field-prd_gwt").val();
                    var nwt = tr$.find(".erp-field-prd_nwt").val();
                    var pili_upmp = tr$.find(".erp-field-pili_upmp").val();
                    var pili_sup = tr$.find(".erp-field-pili_sup").val();
                    var pili_qty = tr$.find(".erp-field-pili_qty").val();
                    var pili_prd_id = tr$.find(".erp-field-pili_prd_id").val();
                    var pili_pi_id = $(".erp-pili_id").val();
                    var sup_id = tr$.find(".erp-field-supplier_id").val();
                    pili_items.push({id,ttl_pkg,ttl_vol,gwt,nwt,pili_upmp,pili_sup,pili_qty, pili_prd_id, pili_pi_id,sup_id});
                }
            });
            $.ajax({
                url: "<?php echo e(url('/proformainvoice/update')); ?>",
                type:"POST",
                data:{
                    "_token": "<?php echo e(csrf_token()); ?>",
                    pi_id: $(".erp-pili_id").val(),
                    order_number: $(".erp-order_number").val(),
                    cust_name: $(".erp-cust_name").val(),
                    ordered_on: $(".erp-ordered_on").val(),
                    expected_on: $(".erp-expected_on").val(),
                    lead_time: $(".erp-lead_time").val(),
                    from_addr_id: $(".from-addr-id").val(),
                    dest_addr_id: $(".dest-addr-id").val(),
                    term: $(".erp-term").val(),
                    payment: $(".erp-payment").val(),
                    status: $(".erp-status").val(),
                    pili_items: pili_items,
                },
                dataType: 'json',
                success:function(response){
                    toastr.info(response.success, response.title);
                    window.setTimeout(function(){
                        if($(".erp-pili_id").val() == 0){
                            location.href = "<?php echo e(url('/proformainvoice')); ?>";
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
<?php /**PATH C:\xampp\htdocs\erp\resources\views/pages/Proforma-invoice/ajax.blade.php ENDPATH**/ ?>