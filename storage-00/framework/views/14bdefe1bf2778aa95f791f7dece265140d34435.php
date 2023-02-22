<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Proforma Invoice Document</title>
        <style>
            @page  {
                header: page-header;
                footer: page-footer;
            }
        </style>
    </head>
<body>
<htmlpageheader name="page-header">
    <table width="1000" cellspacing="0" cellpadding="4" style="border-collapse: collapse; margin: 0 auto;">
        <tbody>
            <tr>
                <th><img src="<?php echo e(asset('assets/images/sample-01.png')); ?>" style="width:50%; margin:0 auto;"/></th>
            </tr>
            <tr><th>PERFORMA INVOICE</th></tr>
        </tbody>
    </table>
    <table width="1000"  cellspacing="0" cellpadding="3" style="border-collapse: collapse; margin: 0 auto; margin:20px auto;">
        <tbody>
            <tr>
                <td style="width:5%"><b>Messrs:</b></td>
                <td style="width:20%"><i><?php echo e($customer_address); ?></i></td>
                <td style="width:14%;"></td>
                <td style="width:14%;"></td>
                <td style="width:5%"><b>Order No:</b></td>
                <td style="width:20%"><?php echo e($order_no); ?></td>
            </tr>
            <tr>
                <td style="width:5%"><b>Tel:</b></td>
                <td style="width:20%"><?php echo e($tel); ?></td>
                <td style="width:14%;"></td>
                <td style="width:14%;"></td>
                <td style="width:5%"><b>Date:</b></td>
                <td style="width:20%"><?php echo e($date); ?></td>
            </tr>
            <tr>
                <td style="width:5%"><b>Mob:</b></td>
                <td style="width:10%"><?php echo e($mob); ?></td>
                <td style="width:14%;"></td>
                <td style="width:14%;"></td>
                <td style="width:5%"><b>Delivery:</b></td>
                <td style="width:20%"><?php echo e($delivery); ?></td>
            </tr>
            <tr>
                <td style="width:5%"><b>Email:</b></td>
                <td style="width:10%"><?php echo e($email); ?></td>
                <td style="width:14%;"></td>
                <td style="width:14%;"></td>
                <td style="width:5%"><b>From:</b></td>
                <td style="width:20%"><?php echo e($from); ?></td>
            </tr>
            <tr>
                <td style="width:5%"><b>Web:</b></td>
                <td style="width:10%"><?php echo e($web); ?></td>
                <td style="width:14%;"></td>
                <td style="width:14%;"></td>
                <td style="width:5%"><b>Destination:</b></td>
                <td style="width:20%"><?php echo e($destination); ?></td>
            </tr>
            <tr>
                <td style="width:5%"><b>Attn:</b></td>
                <td style="width:10%"><?php echo e($attn); ?></td>
                <td style="width:14%;"></td>
                <td style="width:14%;"></td>
                <td style="width:5%"><b>Term</b></td>
                <td style="width:20%"><?php echo e($term); ?></td>
            </tr>
            <tr>
                <td style="width:5%"></td>
                <td style="width:10%"></td>
                <td style="width:14%;"></td>
                <td style="width:14%;"></td>
                <td style="width:5%"><b>Payment :</b></td>
                <td style="width:20%"><?php echo e($payment); ?></td>
            </tr>
        </tbody>
    </table>
</htmlpageheader>
    <?php
        $column_list = $pi_field ?? 0;
    ?>
    <table width="1000" cellspacing="0" cellpadding="10" style="border-top:1px solid #d5d5d5; border-collapse: collapse; margin: 0 auto; font-size:14px;">
        <thead>
            <tr>
                <?php if($column_list['erp-field-prd_supplier_item']['print'] ?? 0) { ?> <th style="border-bottom:1px solid #d5d5d5;">ITEM NO</th> <?php } ?>
                <?php if($column_list['erp-field-prd_barcode']['print'] ?? 0) { ?> <th style="border-bottom:1px solid #d5d5d5;">BARCODE</th> <?php } ?>
                <?php if($column_list['erp-field-prd_hs_code']['print'] ?? 0) { ?> <th style="border-bottom:1px solid #d5d5d5;">HS CODE</th> <?php } ?>
                <?php if($column_list['erp-field-prd_images_url']['print'] ?? 0) { ?> <th style="border-bottom:1px solid #d5d5d5;">IMAGE</th> <?php } ?>
                <?php if($column_list['erp-field-prd_description']['print'] ?? 0) { ?> <th style="border-bottom:1px solid #d5d5d5;">DESCRIPTION</th> <?php } ?>
                <?php if($column_list['erp-field-prd_pcs_per_ctn']['print'] ?? 0) { ?> <th style="border-bottom:1px solid #d5d5d5;">PCS CTN</th> <?php } ?>
                <?php if($column_list['erp-field-prd_cbm_ctn']['print'] ?? 0) { ?> <th style="border-bottom:1px solid #d5d5d5;">CBM/ CTN</th> <?php } ?>
                <?php if($column_list['erp-field-prd_ttl_cbm']['print'] ?? 0) { ?> <th style="border-bottom:1px solid #d5d5d5;">TTL CBM</th> <?php } ?>
                <?php if($column_list['erp-field-pili_qty']['print'] ?? 0) { ?> <th style="border-bottom:1px solid #d5d5d5;">ORDER QTY PCS or CTN</th> <?php } ?>
                <?php if($column_list['erp-field-pili_upmp']['print'] ?? 0) { ?> <th style="border-bottom:1px solid #d5d5d5;">PRICE USD/PCS or CTN</th> <?php } ?>
                <?php if($column_list['erp-field-pili_total_usd']['print'] ?? 0) { ?> <th style="border-bottom:1px solid #d5d5d5;">TOTAL USD</th> <?php } ?>
            </tr>
        </thead>
        <?php $ttl_cbm = 0; $total_usd_tot = 0; ?>
        <tbody>
            <?php $__currentLoopData = $pitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr style="text-align:center; border-top:1px solid #d5d5d5;">
                    <?php if($column_list['erp-field-prd_supplier_item']['print'] ?? 0) { ?> <td><?php echo e($list->product ? $list->product['prd_supplier_item'] : ''); ?></td> <?php } ?>
                    <?php if($column_list['erp-field-prd_barcode']['print'] ?? 0) { ?> <td><?php echo e($list->product ? $list->product['prd_barcode'] : ''); ?></td> <?php } ?>
                    <?php if($column_list['erp-field-prd_hs_code']['print'] ?? 0) { ?> <td><?php echo e($list->product ? $list->product['prd_hs_code'] : ''); ?></td> <?php } ?>
                    <?php if($column_list['erp-field-prd_images_url']['print'] ?? 0) { ?> <td><img src="<?php echo e($list->productImage ? asset('storage/product/'.$list->product['id'].'/'.$list->productImage['filename']) : asset('assets/images/sample.jpg')); ?>" style="width:70px;" /></td> <?php } ?>
                    <?php if($column_list['erp-field-prd_description']['print'] ?? 0) { ?> <td><?php echo e($list->product ? $list->product['prd_description'] : ''); ?></td> <?php } ?>
                    <?php if($column_list['erp-field-prd_pcs_per_ctn']['print'] ?? 0) { ?> <td><?php echo e($list->product ? $list->product['prd_pcs_per_ctn'] : '0'); ?></td> <?php } ?>
                    <?php if($column_list['erp-field-prd_cbm_ctn']['print'] ?? 0) { ?> <td><?php echo e($list->product ? $list->product['prd_cbm_ctn'] : ''); ?></td> <?php } ?>
                    <?php if($column_list['erp-field-prd_ttl_cbm']['print'] ?? 0) { ?> <td><?php echo e($list->product ? (number_format($list->product['prd_pcs_per_ctn'] * $list->product['prd_cbm_ctn'],2)) : '0'); ?></td> <?php } ?>
                    <?php if($column_list['erp-field-pili_qty']['print'] ?? 0) { ?> <td><?php echo e($list ? $list['pili_qty'] : '0.0'); ?></td> <?php } ?>
                    <?php if($column_list['erp-field-pili_upmp']['print'] ?? 0) { ?> <td>$<?php echo e($list ? $list['pili_upmp'] : '0.0'); ?></td> <?php } ?>
                    <?php if($column_list['erp-field-pili_total_usd']['print'] ?? 0) { ?>  <td>$<?php echo e($list ? $list['pili_sup'] * $list['pili_qty'] : '0.0'); ?></td> <?php } ?>
                    <?php $ttl_cbm += $list ? (number_format($list->product['prd_pcs_per_ctn'] * $list->product['prd_cbm_ctn'],2)) : '0' ?>
                    <?php $total_usd_tot+= $list ? $list['pili_upmp'] * $list['pili_qty'] : '0.0' ; ?>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <tr style="text-align:center; border-top:1px solid #d5d5d5; border-bottom:1px solid #d5d5d5;">
                <td colspan="5" style="text-align:right;">Total</td>
                <td></td>
                <td></td>
                <td>$<?php echo e($ttl_cbm); ?></td>
                <td></td>
                <td></td>
                <td>$<?php echo e($total_usd_tot); ?></td>
            </tr>
        </tbody>
    </table>
    <table width="1000" cellspacing="0" cellpadding="7" style="border-collapse: collapse; margin:15px auto; font-size:14px; border-bottom:1px solid #d5d5d5;">
        <tbody>
            <tr>
                <td style="width:250px;"><b>BANK DETAILS</b></td>
                <td></td>
            </tr>
            <tr>
                <td style="width:250px;"><b>COMPANY NAME OF BENEFICIARY:</b></td>
                <td><?php echo e($company_name); ?></td>
            </tr>
            <tr>
                <td style="width:250px;"><b>BANK NAME:</b></td>
                <td><?php echo e($bank_name); ?></td>
            </tr>
            <tr>
                <td style="width:250px;"><b>ADDRESS:</b></td>
                <td><?php echo e($bank_address); ?></td>
            </tr>
            <tr>
                <td style="width:250px;"><b>ACCOUNT NO:</b></td>
                <td><?php echo e($account_no); ?></td>
            </tr>
            <tr>
                <td style="width:250px;"><b>SWIFT CODE:</b></td>
                <td><?php echo e($swift_code); ?></td>
            </tr>
        </tbody>
    </table>
    <table width="1000" cellspacing="0" cellpadding="4" style="border-collapse: collapse; margin: 0 auto; margin:10px auto;">
        <tbody>
            <tr>
                <td style="width:25%; text-align:center;"><img src="<?php echo e(asset('assets/images/s1.png')); ?>" style="width:100px;"/></td>
                <td style="width:25%;"></td>
                <td style="width:25%;"></td>
                <td style="text-align:center; width:25%;"><img src="<?php echo e(asset('assets/images/s2.png')); ?>" style="width:100px;"/></td>
            </tr>
            <tr>
                <td style="width:25%; text-align:center;">SIGNATURE OF BUYER</td>
                <td style="width:25%;"></td>
                <td style="width:25%;"></td>
                <td style="width:25%; text-align:center;">CHOP AND SIGNATURE OF SELLER</td>
            </tr>
            <tr><td></td></tr>
        </tbody>
    </table>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\erp\resources\views/pages/Proforma-invoice/print.blade.php ENDPATH**/ ?>