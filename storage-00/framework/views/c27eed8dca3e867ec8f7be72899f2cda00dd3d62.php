<table class="table">
    <tbody>
        <tr>
            <td>Brand Name</td>
            <td>
                <label class="checkbox checkbox-outline-success checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-brand_name][view]">
                    <input type="checkbox" name="column_list[erp-field-brand_name][view]" value="1" <?php echo e($consignment ? ($consignment->con_fields['erp-field-brand_name']['view'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>View</span>
                    <span class="checkmark"></span>
                </label>
                <label class="checkbox checkbox-outline-danger checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-brand_name][print]">
                    <input type="checkbox" name="column_list[erp-field-brand_name][print]" value="1" <?php echo e($consignment ? ($consignment->con_fields['erp-field-brand_name']['print'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>Print</span>
                    <span class="checkmark"></span>
                </label>
            </td>
            <td>Product Name</td>
            <td>
                <label class="checkbox checkbox-outline-success checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-prd_supplier_item][view]">
                    <input type="checkbox" name="column_list[erp-field-prd_supplier_item][view]" value="1" <?php echo e($consignment ? ($consignment->con_fields['erp-field-prd_supplier_item']['view'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>View</span>
                    <span class="checkmark"></span>
                </label>
                <label class="checkbox checkbox-outline-danger checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-prd_supplier_item][print]">
                    <input type="checkbox" name="column_list[erp-field-prd_supplier_item][print]" value="1" <?php echo e($consignment ? ($consignment->con_fields['erp-field-prd_supplier_item']['print'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>Print</span>
                    <span class="checkmark"></span>
                </label>
            </td>
        </tr>
        <tr>
            <td>Product Description</td>
            <td>
                <label class="checkbox checkbox-outline-success checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-prd_description][view]">
                    <input type="checkbox" name="column_list[erp-field-prd_description][view]" value="1" <?php echo e($consignment ? ($consignment->con_fields['erp-field-prd_description']['view'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>View</span>
                    <span class="checkmark"></span>
                </label>
                <label class="checkbox checkbox-outline-danger checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-prd_description][print]">
                    <input type="checkbox" name="column_list[erp-field-prd_description][print]" value="1" <?php echo e($consignment ? ($consignment->con_fields['erp-field-prd_description']['print'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>Print</span>
                    <span class="checkmark"></span>
                </label>
            </td>
            <td>BarCode</td>
            <td>
                <label class="checkbox checkbox-outline-success checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-prd_barcode][view]">
                    <input type="checkbox" name="column_list[erp-field-prd_barcode][view]" value="1" <?php echo e($consignment ? ($consignment->con_fields['erp-field-prd_barcode']['view'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>View</span>
                    <span class="checkmark"></span>
                </label>
                <label class="checkbox checkbox-outline-danger checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-prd_barcode][print]">
                    <input type="checkbox" name="column_list[erp-field-prd_barcode][print]" value="1" <?php echo e($consignment ? ($consignment->con_fields['erp-field-prd_barcode']['print'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>Print</span>
                    <span class="checkmark"></span>
                </label>
            </td>
        </tr>
        <tr>
            <td>HsCode</td>
            <td>
                <label class="checkbox checkbox-outline-success checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-prd_hs_code][view]">
                    <input type="checkbox" name="column_list[erp-field-prd_hs_code][view]" value="1" <?php echo e($consignment ? ($consignment->con_fields['erp-field-prd_hs_code']['view'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>View</span>
                    <span class="checkmark"></span>
                </label>
                <label class="checkbox checkbox-outline-danger checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-prd_hs_code][print]">
                    <input type="checkbox" name="column_list[erp-field-prd_hs_code][print]" value="1" <?php echo e($consignment ? ($consignment->con_fields['erp-field-prd_hs_code']['print'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>Print</span>
                    <span class="checkmark"></span>
                </label>
            </td>
            <td>Qty-Items</td>
            <td>
                <label class="checkbox checkbox-outline-success checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-pili_qty][view]">
                    <input type="checkbox" name="column_list[erp-field-pili_qty][view]" value="1" <?php echo e($consignment ? ($consignment->con_fields['erp-field-pili_qty']['view'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>View</span>
                    <span class="checkmark"></span>
                </label>
                <label class="checkbox checkbox-outline-danger checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-pili_qty][print]">
                    <input type="checkbox" name="column_list[erp-field-pili_qty][print]" value="1" <?php echo e($consignment ? ($consignment->con_fields['erp-field-pili_qty']['print'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>Print</span>
                    <span class="checkmark"></span>
                </label>
            </td>
        </tr>
        <tr>
            <td>Qty-PKG</td>
            <td>
                <label class="checkbox checkbox-outline-success checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-ttl_pkg][view]">
                    <input type="checkbox" name="column_list[erp-field-ttl_pkg][view]" value="1" <?php echo e($consignment ? ($consignment->con_fields['erp-field-ttl_pkg']['view'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>View</span>
                    <span class="checkmark"></span>
                </label>
                <label class="checkbox checkbox-outline-danger checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-ttl_pkg][print]">
                    <input type="checkbox" name="column_list[erp-field-ttl_pkg][print]" value="1" <?php echo e($consignment ? ($consignment->con_fields['erp-field-ttl_pkg']['print'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>Print</span>
                    <span class="checkmark"></span>
                </label>
            </td>
            <td>GWT</td>
            <td>
                <label class="checkbox checkbox-outline-success checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-gwt][view]">
                    <input type="checkbox" name="column_list[erp-field-gwt][view]" value="1" <?php echo e($consignment ? ($consignment->con_fields['erp-field-gwt']['view'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>View</span>
                    <span class="checkmark"></span>
                </label>
                <label class="checkbox checkbox-outline-danger checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-gwt][print]">
                    <input type="checkbox" name="column_list[erp-field-gwt][print]" value="1" <?php echo e($consignment ? ($consignment->con_fields['erp-field-gwt']['print'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>Print</span>
                    <span class="checkmark"></span>
                </label>
            </td>
        </tr>
        <tr>
            <td>NWT</td>
            <td>
                <label class="checkbox checkbox-outline-success checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-nwt][view]">
                    <input type="checkbox" name="column_list[erp-field-nwt][view]" value="1" <?php echo e($consignment ? ($consignment->con_fields['erp-field-nwt']['view'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>View</span>
                    <span class="checkmark"></span>
                </label>
                <label class="checkbox checkbox-outline-danger checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-nwt][print]">
                    <input type="checkbox" name="column_list[erp-field-nwt][print]" value="1" <?php echo e($consignment ? ($consignment->con_fields['erp-field-nwt']['print'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>Print</span>
                    <span class="checkmark"></span>
                </label>
            </td>
            <td>Volume</td>
            <td>
                <label class="checkbox checkbox-outline-success checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-volume][view]">
                    <input type="checkbox" name="column_list[erp-field-volume][view]" value="1" <?php echo e($consignment ? ($consignment->con_fields['erp-field-volume']['view'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>View</span>
                    <span class="checkmark"></span>
                </label>
                <label class="checkbox checkbox-outline-danger checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-volume][print]">
                    <input type="checkbox" name="column_list[erp-field-volume][print]" value="1" <?php echo e($consignment ? ($consignment->con_fields['erp-field-volume']['print'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>Print</span>
                    <span class="checkmark"></span>
                </label>
            </td>
        </tr>
    </tbody>
</table>
<?php /**PATH C:\xampp\htdocs\erp\resources\views/pages/consignment/hideshowcolumn.blade.php ENDPATH**/ ?>