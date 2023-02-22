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
        <h4><a href="<?php echo e(route('dashboard')); ?>">ERP</a> | Proforma Invoice </h4>
    </div>
    <div class="col-sm-12 col-md-6">
        <a href="<?php echo e(route('proformainvoice-edit', 0)); ?>" class="btn btn-primary btn-sm" style="float: right !important;">Create Invoice</a>
    </div>
</div>
<div class="separator-breadcrumb border-top"></div>
<div class="row">
    <!-- ICON BG -->
    <?php
        $totalPiSent = \App\Models\ProformaInvoice::where('status','=','4')->count();
        $totalPiApproved = \App\Models\ProformaInvoice::where('status','=','1')->count();
        $totalPiRejected = \App\Models\ProformaInvoice::where('status','=','8')->count();
    ?>
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
            <div class="card-body text-center">
                <i class="i-Add-User"></i>
                <div class="custom-content">
                    <p class="text-muted mt-2 mb-0">Total Proforma Invoice Send</p>
                    <p class="text-primary text-24 line-height-1 mb-2"><?php echo e($totalPiSent ?? 0); ?></p>
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
                    <p class="text-primary text-24 line-height-1 mb-2"><?php echo e($totalPiApproved ?? 0); ?></p>
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
                    <p class="text-primary text-24 line-height-1 mb-2"><?php echo e($totalPiRejected ?? 0); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mb-4">
    <div class="col-md-12 mb-4">
        <div class="card text-left">
            <div class="card-body">
                <h4 class="card-title mb-3">Proforma Invoice</h4>
                <div class="table-responsive">
                    <table id="zero_configuration_table" class="display table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Order Number</th>
                                <th>Customer</th>
                                <th>Date</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Term</th>
                                <th>Payment</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $proformaInvoiceData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr id="<?php echo e($list->id); ?>">
                                <td><?php echo e($list->id); ?></td>
                                <td><?php echo e($list->order_number); ?></td>
                                <td><?php echo e($list->customer->cust_name); ?></td>
                                <td><?php echo e(Helper::dateFormatForView($list->ordered_on)); ?></td>
                                <td><?php echo e($list->fromAddress ? $list->fromAddress->display : ''); ?></td>
                                <td><?php echo e($list->toAddress ? $list->toAddress->display : ''); ?></td>
                                <td><?php echo e($list->shippingTerm->text); ?></td>
                                <td><?php echo e($list->paymentTerm->text); ?></td>
                                <td>
                                    <select class="form-control status" name="pi_status" id="statusId">
                                        <?php $__currentLoopData = Helper::proformaStatusAll(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value=<?php echo e($status->id); ?>  <?php echo e($status->id == $list->status ? 'selected' : ''); ?>> <?php echo e($status->text); ?> </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="_dot _inline-dot"></span>
                                        <span class="_dot _inline-dot"></span>
                                        <span class="_dot _inline-dot"></span>
                                    </button>
                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 34px, 0px);">
                                        <a class="dropdown-item" href="<?php echo e(route('proformainvoice-edit', $list->id)); ?>"><i class="nav-icon i-Pen-2 font-weight-bold" aria-hidden="true"> </i> Edit</a>
                                        <a class="dropdown-item" href="<?php echo e(route('consignment-edit', ['id' => 0,'cid' => $list->customer_id])); ?>"><i class="nav-icon i-Ship-2 font-weight-bold" aria-hidden="true"> </i> Create Consignment</a>
                                        <a class="dropdown-item" href="<?php echo e(route('proformainvoice-delete', $list->id)); ?>"><i class="nav-icon i-Close-Window font-weight-bold" aria-hidden="true"> </i> Delete</a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Order Number</th>
                                <th>Customer</th>
                                <th>Date</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Term</th>
                                <th>Payment</th>
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
<?php $__env->startSection('bottom-js'); ?>
<script type="text/javascript">
    $('select[name="pi_status"]').on('change', function () {
        var status = $(this).val();
        console.log(status);
        var id = $(this).closest('tr').attr('id');

        if(status == 2){
            $.ajax({
                type: "get",
                url: "<?php echo e(URL::to('/getStatus')); ?>",
                data: { id: id, status: status},
                success: function(response){
                    toastr.info(response.success, response.title);
                    window.setTimeout(function(){location.reload()},3000)
                }
            });
        }else{
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0CC27E',
                cancelButtonColor: '#FF586B',
                confirmButtonText: 'Yes, change it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success mr-5',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then(function (e) {
                $.ajax({
                    type: "get",
                    url: "<?php echo e(URL::to('/getStatus')); ?>",
                    data: { id: id, status: status},
                    success: function(data){
                        swal(
                            'Changed!',
                            'Your status has been changed.',
                            'success'
                        );
                    }
                });
            }, function (dismiss) {
                if (dismiss === 'cancel') {
                    swal(
                        'Cancelled',
                        'your status is safe :)',
                        'error'
                    )
                }
            })
        }
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/pages/Proforma-invoice/index.blade.php ENDPATH**/ ?>