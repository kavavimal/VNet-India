<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
    @page  {
        header: page-header;
        footer: page-footer;
    }
</style>
</head>
<body>
<htmlpageheader name="page-header">
    <table width="1000" border="1" bordercolor="#7c7c7c" cellspacing="0" cellpadding="4" style="">
        <tbody>
            <tr>
                <th><img src="<?php echo e(asset('assets/images/sample-01.png')); ?>" /></th>
            </tr>
            <tr><th>CONSGINMENT INVOICE</th></tr>
        </tbody>
    </table>
    <table width="1000" cellspacing="0" border="1" cellpadding="5" style="border-collapse: collapse; margin: 0 auto; border-left: 1px solid #7c7c7c;border-right: 1px solid #7c7c7c;">
        <tbody>
            <tr>
                <td style="width:10%; border-right: 1px solid #7c7c7c; border-bottom: 1px solid #7c7c7c;"><b>Messrs: </b></td>
                <td style="width:40%; border-right: 1px solid #7c7c7c; border-bottom: 1px solid #7c7c7c;"><i><?php echo e($customer_address); ?></i></td>
                <td style="width:10%;border-right: 1px solid #7c7c7c; border-bottom: 1px solid #7c7c7c;"><b>Order No: </b></td>
                <td style="width:40%;border-right: 1px solid #7c7c7c; border-bottom: 1px solid #7c7c7c;"><?php echo e($order_no); ?></td>
            </tr>
            <tr>
                <td style="width:10%;border-right: 1px solid #7c7c7c; border-bottom: 1px solid #7c7c7c;"><b>Tel : </b></td>
                <td style="width:40%;border-right: 1px solid #7c7c7c; border-bottom: 1px solid #7c7c7c;"><?php echo e($tel); ?></td>
                <td style="width:10%;border-right: 1px solid #7c7c7c; border-bottom: 1px solid #7c7c7c;"><b>Date:</b></td>
                <td style="width:40%;border-right: 1px solid #7c7c7c; border-bottom: 1px solid #7c7c7c;"><?php echo e($date); ?></td>
            </tr>
            <tr>
                <td style="width:10%;border-right: 1px solid #7c7c7c; border-bottom: 1px solid #7c7c7c;"><b>Mob:</b></td>
                <td style="width:20%;border-right: 1px solid #7c7c7c; border-bottom: 1px solid #7c7c7c;"><?php echo e($mob); ?></td>
                <td style="width:10%;border-right: 1px solid #7c7c7c; border-bottom: 1px solid #7c7c7c;"><b>Delivery:</b></td>
                <td style="width:40%;border-right: 1px solid #7c7c7c; border-bottom: 1px solid #7c7c7c;"><?php echo e($delivery); ?></td>
            </tr>
            <tr>
                <td style="width:10%;border-right: 1px solid #7c7c7c;border-bottom: 1px solid #7c7c7c;"><b>Email:</b></td>
                <td style="width:40%;border-right: 1px solid #7c7c7c; border-bottom: 1px solid #7c7c7c;"><?php echo e($email); ?></td>
                <td style="width:10%;border-right: 1px solid #7c7c7c;border-bottom: 1px solid #7c7c7c;"><b>From:</b></td>
                <td style="width:40%;border-right: 1px solid #7c7c7c;border-bottom: 1px solid #7c7c7c;"><?php echo e($from); ?></td>
            </tr>
            <tr>
                <td style="width:10%;border-right: 1px solid #7c7c7c; border-bottom: 1px solid #7c7c7c;"><b>Web:</b></td>
                <td style="width:40%;border-right: 1px solid #7c7c7c; border-bottom: 1px solid #7c7c7c;"><?php echo e($web); ?></td>
                <td style="width:10%;border-right: 1px solid #7c7c7c; border-bottom: 1px solid #7c7c7c;"><b>Destination:</b></td>
                <td style="width:40%;border-right: 1px solid #7c7c7c; border-bottom: 1px solid #7c7c7c;"><?php echo e($destination); ?></td>
            </tr>
            <tr>
                <td style="width:10%;border-right: 1px solid #7c7c7c;"><b>Attn:</b></td>
                <td style="width:40%;border-right: 1px solid #7c7c7c;"><?php echo e($attn); ?></td>
                <td style="width:10%;border-right: 1px solid #7c7c7c; border-bottom: 1px solid #7c7c7c;"><b>Term</b></td>
                <td style="width:40%;border-right: 1px solid #7c7c7c; border-bottom: 1px solid #7c7c7c;"><?php echo e($term); ?></td>
            </tr>
            <tr>
                <td style="width:10%;border-right: 1px solid #7c7c7c;"></td>
                <td style="width:40%;border-right: 1px solid #7c7c7c;"></td>
                <td style="width:10%;border-right: 1px solid #7c7c7c;"><b>Payment :</b></td>
                <td style="width:40%;border-right: 1px solid #7c7c7c;"><?php echo e($payment); ?></td>
            </tr>
        </tbody>
    </table>
</htmlpageheader>
<table width="1000" border="1" bordercolor="#7c7c7c" cellspacing="5" cellpadding="10" style="border-collapse: collapse; margin: 0 auto;">
    <thead>
        <tr>
            <th style="width:50px;"></th>
            <th>Product Name</th>
            <th>BARCODE</th>
            <th>HS CODE</th>
            <th>DESCRIPTION</th>
            <th>Qty-Items</th>
            <th>Qty-PKG</th>
            <th>GWT</th>
            <th>NWT</th>
            <th>Volume</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $pitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr style="text-align:center;">
            <td style="width:50px;"></td>
            <td><?php echo e($list->product ? $list->product['prd_our_item_no'] : ''); ?></td>
            <td><?php echo e($list->product ? $list->product['prd_barcode'] : ''); ?></td>
            <td><?php echo e($list->product ? $list->product['prd_hs_code'] : ''); ?></td>
            <td><?php echo e($list->product ? $list->product['prd_description'] : ''); ?></td>
            <?php $qty = $list->product ? $list->product['prd_pcs_per_ctn'] * $list['conli_total_pkg'] : 0 ?>
            <td><?php echo e($qty ?? 0); ?></td>
            <td><?php echo e($list ? $list['conli_total_pkg'] : 0); ?></td>
            <?php $gwt =  $list['conli_total_pkg'] * ($list->product ? $list->product['prd_gw_ctn'] : 0); ?>
            <td>$<?php echo e($gwt ?? 0); ?></td>
            <?php $nwt = $gwt-(($list->product ? $list->product['prd_ctn_wt'] : 0) * $list['conli_total_pkg']); ?>
            <td>$<?php echo e($nwt ?? 0); ?></td>
            <?php $vol = $list['conli_total_pkg'] * ($list->product ? $list->product['prd_cbm_ctn'] : 0 ); ?>
            <td>$<?php echo e($vol ?? 0); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tr style="text-align:center;">
            <td colspan="6" style="text-align:right;">Total</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>
<table width="1000" border="1" bordercolor="#7c7c7c" cellspacing="0" cellpadding="4" style="border-collapse: collapse; margin: 0 auto; margin-top: 20px">
    <tbody>
        <tr>
            <td colspan="2">BANK DETAILS</td>
            <td colspan="10"></td>
        </tr>
        <tr>
            <td colspan="2">COMPANY NAME OF BENEFICIARY :</td>
            <td colspan="10"><?php echo e($company_name); ?></td>
        </tr>
        <tr>
            <td colspan="2">BANK NAME:</td>
            <td colspan="10"><?php echo e($bank_name); ?></td>
        </tr>
        <tr>
            <td colspan="2">ADDRESS:</td>
            <td colspan="10"><?php echo e($bank_address); ?></td>
        </tr>
        <tr>
            <td colspan="2">ACCOUNT NO: </td>
            <td colspan="10"><?php echo e($account_no); ?></td>
        </tr>
        <tr>
            <td colspan="2">SWIFT CODE:</td>
            <td colspan="10"><?php echo e($swift_code); ?></td>
        </tr>
    </tbody>
</table>
<table width="1000" cellspacing="0" cellpadding="4" style="border-collapse: collapse; margin: 0 auto; margin-top:20px; border:1px solid #7c7c7c;">
    <tbody>
        <tr><td></td></tr>
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
<?php /**PATH C:\xampp\htdocs\erp\resources\views/pages/consignment/print.blade.php ENDPATH**/ ?>