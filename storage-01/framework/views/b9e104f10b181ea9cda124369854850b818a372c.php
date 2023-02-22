<table class="table">
    <tbody>
        <tr>
            <td>Supplier Item No</td>
            <td>
                <label class="checkbox checkbox-outline-success checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-prd_supplier_item][view]">
                    <input type="checkbox" name="column_list[erp-field-prd_supplier_item][view]" value="1" <?php echo e($proformaInvoice ? ($proformaInvoice->pi_fields['erp-field-prd_supplier_item']['view'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>View</span>
                    <span class="checkmark"></span>
                </label>
                <label class="checkbox checkbox-outline-danger checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-prd_supplier_item][print]">
                    <input type="checkbox" name="column_list[erp-field-prd_supplier_item][print]" value="1" <?php echo e($proformaInvoice ? ($proformaInvoice->pi_fields['erp-field-prd_supplier_item']['print'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>Print</span>
                    <span class="checkmark"></span>
                </label>
            </td>
            <td>Our Item No</td>
            <td>
                <label class="checkbox checkbox-outline-success checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-prd_our_item_no][view]">
                    <input type="checkbox" name="column_list[erp-field-prd_our_item_no][view]" value="1" <?php echo e($proformaInvoice ? ($proformaInvoice->pi_fields['erp-field-prd_our_item_no']['view'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>View</span>
                    <span class="checkmark"></span>
                </label>
                <label class="checkbox checkbox-outline-danger checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-prd_our_item_no][print]">
                    <input type="checkbox" name="column_list[erp-field-prd_our_item_no][print]" value="1" <?php echo e($proformaInvoice ? ($proformaInvoice->pi_fields['erp-field-prd_our_item_no']['print'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>Print</span>
                    <span class="checkmark"></span>
                </label>
            </td>
            <td>BarCode</td>
            <td>
                <label class="checkbox checkbox-outline-success checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-prd_barcode][view]">
                    <input type="checkbox" name="column_list[erp-field-prd_barcode][view]" value="1" <?php echo e($proformaInvoice ? ($proformaInvoice->pi_fields['erp-field-prd_barcode']['view'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>View</span>
                    <span class="checkmark"></span>
                </label>
                <label class="checkbox checkbox-outline-danger checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-prd_barcode][print]">
                    <input type="checkbox" name="column_list[erp-field-prd_barcode][print]" value="1" <?php echo e($proformaInvoice ? ($proformaInvoice->pi_fields['erp-field-prd_barcode']['print'] == "1" ? 'checked' : '') : ''); ?>>
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
                    <input type="checkbox" name="column_list[erp-field-prd_hs_code][view]" value="1" <?php echo e($proformaInvoice ? ($proformaInvoice->pi_fields['erp-field-prd_hs_code']['view'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>View</span>
                    <span class="checkmark"></span>
                </label>
                <label class="checkbox checkbox-outline-danger checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-prd_hs_code][print]">
                    <input type="checkbox" name="column_list[erp-field-prd_hs_code][print]" value="1" <?php echo e($proformaInvoice ? ($proformaInvoice->pi_fields['erp-field-prd_hs_code']['print'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>Print</span>
                    <span class="checkmark"></span>
                </label>
            </td>
            <td>Image</td>
            <td>
                <label class="checkbox checkbox-outline-success checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-prd_images_url][view]">
                    <input type="checkbox" name="column_list[erp-field-prd_images_url][view]" value="1" <?php echo e($proformaInvoice ? ($proformaInvoice->pi_fields['erp-field-prd_images_url']['view'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>View</span>
                    <span class="checkmark"></span>
                </label>
                <label class="checkbox checkbox-outline-danger checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-prd_images_url][print]">
                    <input type="checkbox" name="column_list[erp-field-prd_images_url][print]" value="1" <?php echo e($proformaInvoice ? ($proformaInvoice->pi_fields['erp-field-prd_images_url']['print'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>Print</span>
                    <span class="checkmark"></span>
                </label>
            </td>
            <td>GWT-P-PKG</td>
            <td>
                <label class="checkbox checkbox-outline-success checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-prd_gwt_ctn][view]">
                    <input type="checkbox" name="column_list[erp-field-prd_gwt_ctn][view]" value="1" <?php echo e($proformaInvoice ? ($proformaInvoice->pi_fields['erp-field-prd_gwt_ctn']['view'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>View</span>
                    <span class="checkmark"></span>
                </label>
                <label class="checkbox checkbox-outline-danger checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-prd_gwt_ctn][print]">
                    <input type="checkbox" name="column_list[erp-field-prd_gwt_ctn][print]" value="1" <?php echo e($proformaInvoice ? ($proformaInvoice->pi_fields['erp-field-prd_gwt_ctn']['print'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>Print</span>
                    <span class="checkmark"></span>
                </label>
            </td>            
        </tr>
        <tr>
            <td>PKG-WT</td>
            <td>
                <label class="checkbox checkbox-outline-success checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-prd_ctn_wt][view]">
                    <input type="checkbox" name="column_list[erp-field-prd_ctn_wt][view]" value="1" <?php echo e($proformaInvoice ? ($proformaInvoice->pi_fields['erp-field-prd_ctn_wt']['view'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>View</span>
                    <span class="checkmark"></span>
                </label>
                <label class="checkbox checkbox-outline-danger checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-prd_ctn_wt][print]">
                    <input type="checkbox" name="column_list[erp-field-prd_ctn_wt][print]" value="1" <?php echo e($proformaInvoice ? ($proformaInvoice->pi_fields['erp-field-prd_ctn_wt']['print'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>Print</span>
                    <span class="checkmark"></span>
                </label>
            </td>
            <td>ITEM-P-PKG</td>
            <td>
                <label class="checkbox checkbox-outline-success checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-prd_pcs_per_ctn][view]">
                    <input type="checkbox" name="column_list[erp-field-prd_pcs_per_ctn][view]" value="1" <?php echo e($proformaInvoice ? ($proformaInvoice->pi_fields['erp-field-prd_pcs_per_ctn']['view'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>View</span>
                    <span class="checkmark"></span>
                </label>
                <label class="checkbox checkbox-outline-danger checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-prd_pcs_per_ctn][print]">
                    <input type="checkbox" name="column_list[erp-field-prd_pcs_per_ctn][print]" value="1" <?php echo e($proformaInvoice ? ($proformaInvoice->pi_fields['erp-field-prd_pcs_per_ctn']['print'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>Print</span>
                    <span class="checkmark"></span>
                </label>
            </td>
            <td>VOL-P-PKG</td>
            <td>
                <label class="checkbox checkbox-outline-success checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-prd_cbm_ctn][view]">
                    <input type="checkbox" name="column_list[erp-field-prd_cbm_ctn][view]" value="1" <?php echo e($proformaInvoice ? ($proformaInvoice->pi_fields['erp-field-prd_cbm_ctn']['view'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>View</span>
                    <span class="checkmark"></span>
                </label>
                <label class="checkbox checkbox-outline-danger checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-prd_cbm_ctn][print]">
                    <input type="checkbox" name="column_list[erp-field-prd_cbm_ctn][print]" value="1" <?php echo e($proformaInvoice ? ($proformaInvoice->pi_fields['erp-field-prd_cbm_ctn']['print'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>Print</span>
                    <span class="checkmark"></span>
                </label>
            </td>            
        </tr>
        <tr>
            <td>Unit Type</td>
            <td>
                <label class="checkbox checkbox-outline-success checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-prd_unit_type][view]">
                    <input type="checkbox" name="column_list[erp-field-prd_unit_type][view]" value="1" <?php echo e($proformaInvoice ? ($proformaInvoice->pi_fields['erp-field-prd_unit_type']['view'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>View</span>
                    <span class="checkmark"></span>
                </label>
                <label class="checkbox checkbox-outline-danger checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-prd_unit_type][print]">
                    <input type="checkbox" name="column_list[erp-field-prd_unit_type][print]" value="1" <?php echo e($proformaInvoice ? ($proformaInvoice->pi_fields['erp-field-prd_unit_type']['print'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>Print</span>
                    <span class="checkmark"></span>
                </label>
            </td>
            <td>TTL PKG</td>
            <td>
                <label class="checkbox checkbox-outline-success checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-prd_ttl_pkg][view]">
                    <input type="checkbox" name="column_list[erp-field-prd_ttl_pkg][view]" value="1" <?php echo e($proformaInvoice ? ($proformaInvoice->pi_fields['erp-field-prd_ttl_pkg']['view'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>View</span>
                    <span class="checkmark"></span>
                </label>
                <label class="checkbox checkbox-outline-danger checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-prd_ttl_pkg][print]">
                    <input type="checkbox" name="column_list[erp-field-prd_ttl_pkg][print]" value="1" <?php echo e($proformaInvoice ? ($proformaInvoice->pi_fields['erp-field-prd_ttl_pkg']['print'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>Print</span>
                    <span class="checkmark"></span>
                </label>
            </td>
            <td>TTL-VOL</td>
            <td>
                <label class="checkbox checkbox-outline-success checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-prd_ttl_cbm][view]">
                    <input type="checkbox" name="column_list[erp-field-prd_ttl_cbm][view]" value="1" <?php echo e($proformaInvoice ? ($proformaInvoice->pi_fields['erp-field-prd_ttl_cbm']['view'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>View</span>
                    <span class="checkmark"></span>
                </label>
                <label class="checkbox checkbox-outline-danger checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-prd_ttl_cbm][print]">
                    <input type="checkbox" name="column_list[erp-field-prd_ttl_cbm][print]" value="1" <?php echo e($proformaInvoice ? ($proformaInvoice->pi_fields['erp-field-prd_ttl_cbm']['print'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>Print</span>
                    <span class="checkmark"></span>
                </label>
            </td>                   
        </tr>       
        <tr>
            <td>GWT</td>
            <td>
                <label class="checkbox checkbox-outline-success checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-prd_gwt][view]">
                    <input type="checkbox" name="column_list[erp-field-prd_gwt][view]" value="1" <?php echo e($proformaInvoice ? ($proformaInvoice->pi_fields['erp-field-prd_gwt']['view'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>View</span>
                    <span class="checkmark"></span>
                </label>
                <label class="checkbox checkbox-outline-danger checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-prd_gwt][print]">
                    <input type="checkbox" name="column_list[erp-field-prd_gwt][print]" value="1" <?php echo e($proformaInvoice ? ($proformaInvoice->pi_fields['erp-field-prd_gwt']['print'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>Print</span>
                    <span class="checkmark"></span>
                </label>
            </td>
            <td>NWT</td>
            <td>
                <label class="checkbox checkbox-outline-success checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-prd_nwt][view]">
                    <input type="checkbox" name="column_list[erp-field-prd_nwt][view]" value="1" <?php echo e($proformaInvoice ? ($proformaInvoice->pi_fields['erp-field-prd_nwt']['view'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>View</span>
                    <span class="checkmark"></span>
                </label>
                <label class="checkbox checkbox-outline-danger checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-prd_nwt][print]">
                    <input type="checkbox" name="column_list[erp-field-prd_nwt][print]" value="1" <?php echo e($proformaInvoice ? ($proformaInvoice->pi_fields['erp-field-prd_nwt']['print'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>Print</span>
                    <span class="checkmark"></span>
                </label>
            </td>
        </tr>
        <tr>
            <td>PCUP</td>
            <td>
                <label class="checkbox checkbox-outline-success checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-prd_pup][view]">
                    <input type="checkbox" name="column_list[erp-field-prd_pup][view]" value="1" <?php echo e($proformaInvoice ? ($proformaInvoice->pi_fields['erp-field-prd_pup']['view'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>View</span>
                    <span class="checkmark"></span>
                </label>
                <label class="checkbox checkbox-outline-danger checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-prd_pup][print]">
                    <input type="checkbox" name="column_list[erp-field-prd_pup][print]" value="1" <?php echo e($proformaInvoice ? ($proformaInvoice->pi_fields['erp-field-prd_pup']['print'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>Print</span>
                    <span class="checkmark"></span>
                </label>
            </td>
            <td>Markup (%)</td>
            <td>
                <label class="checkbox checkbox-outline-success checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-pili_upmp][view]">
                    <input type="checkbox" name="column_list[erp-field-pili_upmp][view]" value="1" <?php echo e($proformaInvoice ? ($proformaInvoice->pi_fields['erp-field-pili_upmp']['view'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>View</span>
                    <span class="checkmark"></span>
                </label>
                <label class="checkbox checkbox-outline-danger checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-pili_upmp][print]">
                    <input type="checkbox" name="column_list[erp-field-pili_upmp][print]" value="1" <?php echo e($proformaInvoice ? ($proformaInvoice->pi_fields['erp-field-pili_upmp']['print'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>Print</span>
                    <span class="checkmark"></span>
                </label>
            </td>
        </tr>
        <tr>
            <td>SUP</td>
            <td>
                <label class="checkbox checkbox-outline-success checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-pili_sup][view]">
                    <input type="checkbox" name="column_list[erp-field-pili_sup][view]" value="1" <?php echo e($proformaInvoice ? ($proformaInvoice->pi_fields['erp-field-pili_sup']['view'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>View</span>
                    <span class="checkmark"></span>
                </label>
                <label class="checkbox checkbox-outline-danger checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-pili_sup][print]">
                    <input type="checkbox" name="column_list[erp-field-pili_sup][print]" value="1" <?php echo e($proformaInvoice ? ($proformaInvoice->pi_fields['erp-field-pili_sup']['print'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>Print</span>
                    <span class="checkmark"></span>
                </label>
            </td>
            <td>Quantity</td>
            <td>
                <label class="checkbox checkbox-outline-success checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-pili_qty][view]">
                    <input type="checkbox" name="column_list[erp-field-pili_qty][view]" value="1" <?php echo e($proformaInvoice ? ($proformaInvoice->pi_fields['erp-field-pili_qty']['view'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>View</span>
                    <span class="checkmark"></span>
                </label>
                <label class="checkbox checkbox-outline-danger checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-pili_qty][print]">
                    <input type="checkbox" name="column_list[erp-field-pili_qty][print]" value="1" <?php echo e($proformaInvoice ? ($proformaInvoice->pi_fields['erp-field-pili_qty']['print'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>Print</span>
                    <span class="checkmark"></span>
                </label>
            </td>
        </tr>
        <tr>
            <td>Unit</td>
            <td>
                <label class="checkbox checkbox-outline-success checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-pili_unit][view]">
                    <input type="checkbox" name="column_list[erp-field-pili_unit][view]" value="1" <?php echo e($proformaInvoice ? ($proformaInvoice->pi_fields['erp-field-pili_unit']['view'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>View</span>
                    <span class="checkmark"></span>
                </label>
                <label class="checkbox checkbox-outline-danger checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-pili_unit][print]">
                    <input type="checkbox" name="column_list[erp-field-pili_unit][print]" value="1" <?php echo e($proformaInvoice ? ($proformaInvoice->pi_fields['erp-field-pili_unit']['print'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>Print</span>
                    <span class="checkmark"></span>
                </label>
            </td>
            <td>Total USD</td>
            <td>
                <label class="checkbox checkbox-outline-success checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-pili_total_usd][view]">
                    <input type="checkbox" name="column_list[erp-field-pili_total_usd][view]" value="1" <?php echo e($proformaInvoice ? ($proformaInvoice->pi_fields['erp-field-pili_total_usd']['view'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>View</span>
                    <span class="checkmark"></span>
                </label>
                <label class="checkbox checkbox-outline-danger checkbox-inline">
                    <input type="hidden" value="0" name="column_list[erp-field-pili_total_usd][print]">
                    <input type="checkbox" name="column_list[erp-field-pili_total_usd][print]" value="1" <?php echo e($proformaInvoice ? ($proformaInvoice->pi_fields['erp-field-pili_total_usd']['print'] == "1" ? 'checked' : '') : ''); ?>>
                    <span>Print</span>
                    <span class="checkmark"></span>
                </label>
            </td>
        </tr>        
    </tbody>
</table>
<?php /**PATH C:\xampp\htdocs\erp\resources\views/pages/Proforma-invoice/hideshowcolumn.blade.php ENDPATH**/ ?>