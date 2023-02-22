
<?php $__env->startSection('page-css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/styles/vendor/datatables.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/styles/vendor/sweetalert2.min.css')); ?>">
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
        <h4><a href="<?php echo e(route('dashboard')); ?>">ERP</a> | Purchase Order </h4>
    </div>
    
    <div class="col-sm-12 col-md-6">
        <a href="<?php echo e(route('purchaseorder-edit',['id' => 0,'cid' => 0])); ?>" class="btn btn-primary btn-sm" style="float: right !important;">Create Purchase Order</a>
    </div>
    
</div>
<div class="separator-breadcrumb border-top"></div>
<div class="row">
    <!-- ICON BG -->
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
            <div class="card-body text-center">
                <i class="i-Add-User"></i>
                <div class="custom-content">
                    <p class="text-muted mt-2 mb-0">Total Purchase Order</p>
                    <p class="text-primary text-24 line-height-1 mb-2">198</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
            <div class="card-body text-center">
                <i class="i-Add-User"></i>
                <div class="custom-content">
                    <p class="text-muted mt-2 mb-0">Total Approved</p>
                    <p class="text-primary text-24 line-height-1 mb-2">885</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
            <div class="card-body text-center">
                <i class="i-Add-User"></i>
                <div class="custom-content">
                    <p class="text-muted mt-2 mb-0">Total Rejected</p>
                    <p class="text-primary text-24 line-height-1 mb-2">60</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mb-4">
    <div class="col-md-12 mb-4">
        <div class="card text-left">
            <div class="card-body">
                <h4 class="card-title mb-3">Purchase Order</h4>
                <div class="table-responsive">
                    <table id="zero_configuration_table" class="display table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>PO Number</th>
                                <th>Supplier</th>
                                <th>Date</th>
                                <th>Delivery Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $PurchaseOrder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr id="<?php echo e($list->id); ?>">
                                <td><?php echo e($list->id); ?></td>
                                <td><?php echo e($list->po_number); ?></td>
                                <td><?php echo e($list->supplier->name); ?></td>
                                <td><?php echo e(Helper::dateFormatForView($list->date)); ?></td>
                                <td><?php echo e(Helper::dateFormatForView($list->date_delivery)); ?></td>
                                <td><?php echo e($list->status->text); ?></td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="_dot _inline-dot"></span>
                                        <span class="_dot _inline-dot"></span>
                                        <span class="_dot _inline-dot"></span>
                                    </button>
                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 34px, 0px);">
                                    
                                        <a class="dropdown-item" href="<?php echo e(route('purchaseorder-edit',['id' => $list->id, 'cid' => $list->supplier_id])); ?>"><i class="nav-icon i-Pen-2 font-weight-bold" aria-hidden="true"> </i> Edit</a>\
                                    
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchaseorder-delete')): ?>
                                        <a class="dropdown-item" href="<?php echo e(route('purchaseorder-delete', $list->id)); ?>"><i class="nav-icon i-Close-Window font-weight-bold" aria-hidden="true"> </i> Delete</a>
                                    <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <tfoot>
                            <tr>
                            <th>#</th>
                                <th>PO Number</th>
                                <th>Supplier</th>
                                <th>Date</th>
                                <th>Delivery Date</th>
                                <th>Status</th>
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
    <script src="<?php echo e(asset('assets/js/vendor/sweetalert2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/sweetalert.script.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/pages/purchaseorder/index.blade.php ENDPATH**/ ?>