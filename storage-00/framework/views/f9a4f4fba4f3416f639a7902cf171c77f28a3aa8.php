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
        <h4><a href="<?php echo e(route('dashboard')); ?>">ERP</a> | Supplier </h4>
    </div>
    <div class="col-sm-12 col-md-6">
        <a href="<?php echo e(route('supplier-edit','new')); ?>" class="btn btn-primary btn-sm" style="float: right !important;">Create Supplier</a>
    </div>
</div>
<div class="separator-breadcrumb border-top"></div>
<div class="row mb-4">
    <div class="col-md-12 mb-4">
        <div class="card text-left">
            <div class="card-body">
                <h4 class="card-title mb-3">Supplier</h4>
                <div class="table-responsive">
                    <table id="zero_configuration_table" class="display table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $supplier; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($list->id); ?></td>
                                <td><?php echo e($list->name); ?></td>
                                <td><?php echo e($list->code); ?></td>
                                <?php $supId = \App\Models\SupplierContact::where('sup_id',$list->id)->pluck('contact_id')->toArray();
                                    $contact = \App\Models\Contact::where('id',$supId)->first();
                                ?>
                                <td><?php echo e($contact ? $contact->address : ''); ?></td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="_dot _inline-dot"></span>
                                        <span class="_dot _inline-dot"></span>
                                        <span class="_dot _inline-dot"></span>
                                    </button>
                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 34px, 0px);">
                                        <a class="dropdown-item" href="<?php echo e(route('supplier-edit',$list->id)); ?>"><i class="nav-icon i-Pen-2 font-weight-bold" aria-hidden="true"> </i> Edit</a>
                                        <a class="dropdown-item" href="<?php echo e(route('supplier-delete',$list->id)); ?>"><i class="nav-icon i-Close-Window font-weight-bold" aria-hidden="true"> </i> Delete</a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Address</th>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/pages/supplier/index.blade.php ENDPATH**/ ?>