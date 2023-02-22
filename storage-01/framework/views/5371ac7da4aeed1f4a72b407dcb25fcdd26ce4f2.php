<?php $__env->startSection('page-css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/styles/vendor/datatables.min.css')); ?>">
    <style>
        .custom-content {
            margin: auto;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
<div class="breadcrumb">
    <div class="col-sm-12 col-md-6">
        <h4><a href="<?php echo e(route('dashboard')); ?>">ERP</a> | Product </h4>
    </div>
    <div class="col-sm-12 col-md-6">
        <a href="<?php echo e(route('product-edit','new')); ?>" class="btn btn-primary btn-sm" style="float: right !important;">Create Product</a>
    </div>
</div>
<div class="separator-breadcrumb border-top"></div>
<div class="row mb-4">
    <div class="col-md-12 mb-4">
        <div class="card text-left">
            <div class="card-body">
                <h4 class="card-title mb-3">Product</h4>
                <div class="table-responsive">
                    <table id="zero_configuration_table" class="display table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Supplier</th>
                                <th>Supplier Item No</th>
                                <th>Our Item No</th>
                                <th>Bar Code</th>
                                <th>Hs Code</th>
                                <th>Description</th>
                                <th>PCS CTN</th>
                                <th>CBM/CTN</th>
                                <th>PCUP</th>
                                <th>SSUP</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($list->id); ?></td>
                                <td><?php echo e($list->supplier ? $list->supplier->name : ''); ?></td>
                                <td><?php echo e($list->prd_supplier_item); ?></td>
                                <td><?php echo e($list->prd_our_item_no); ?></td>
                                <td><?php echo e($list->prd_barcode); ?></td>
                                <td><?php echo e($list->prd_hs_code); ?></td>
                                <td><?php echo e($list->prd_description); ?></td>
                                <td><?php echo e($list->prd_pcs_per_ctn); ?></td>
                                <td><?php echo e($list->prd_cbm_ctn); ?></td>
                                <td><?php echo e($list->prd_pup); ?></td>
                                <td><?php echo e($list->prd_sup); ?></td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="_dot _inline-dot"></span>
                                        <span class="_dot _inline-dot"></span>
                                        <span class="_dot _inline-dot"></span>
                                    </button>
                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 34px, 0px);">
                                        <a class="dropdown-item" href="<?php echo e(route('product-edit',$list->id)); ?>"><i class="nav-icon i-Pen-2 font-weight-bold" aria-hidden="true"> </i> Edit</a>
                                        <a class="dropdown-item" href="<?php echo e(route('product-delete',$list->id)); ?>"><i class="nav-icon i-Close-Window font-weight-bold" aria-hidden="true"> </i> Delete</a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Supplier</th>
                                <th>Supplier Item No</th>
                                <th>Our Item No</th>
                                <th>Bar Code</th>
                                <th>Hs Code</th>
                                <th>Description</th>
                                <th>PCS CTN</th>
                                <th>CBM/CTN</th>
                                <th>PCUP</th>
                                <th>SSUP</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-js'); ?>
    <script src="<?php echo e(asset('assets/js/vendor/datatables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatables.script.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('bottom-js'); ?>
<script type="text/javascript">
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/pages/product/index.blade.php ENDPATH**/ ?>