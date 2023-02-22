<?php $__env->startSection('page-css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/styles/vendor/pickadate/classic.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/styles/vendor/pickadate/classic.date.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/styles/vendor/datatables.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
<div class="breadcrumb">
    <div class="col-sm-12">
        <h4><a href="<?php echo e(route('dashboard')); ?>">ERP</a> | <a href="<?php echo e(route('purchaseorder-index')); ?>"> Purchase Order </a> | Purchase Order <?php echo e($purchaseorder ? 'Edit: '.$purchaseorder->id : 'New'); ?>

        <a href="<?php echo e(route('purchaseorder-index')); ?>" class="btn btn-outline-primary ml-2 float-right">Cancel</a>
        <div class="btn-group dropdown float-right">
            <button type="submit" class="btn btn-outline-primary erp-po-edit-form">
                Save
            </button>
            <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split _r_drop_right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu" x-placement="right-start">
                <a class="dropdown-item" href="#">print</a>
            </div>
        </div>
    </div>
</div>
<div class="separator-breadcrumb border-top"></div>
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-body">
                <?php if($purchaseorder): ?>
                    <form class="erp-form-submit">
                        <input type="hidden" class="erp-po_id" value="<?php echo e($purchaseorder->id); ?>" name="po_id" />
                        <input type="hidden" value="<?php echo e($purchaseorder->id); ?>" name="po_id1" />
                        <div class="row">
                            <div class="col-md-12 form-group mb-3">
                                <label for="ponumber">PO Number</label>
                                <input type="text" class="form-control erp-po-number erp-input" name="po-number" value="<?php echo e($purchaseorder->po_number); ?>" readonly>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="supplierName">Suppliers</label>
                                <?php if($supplier): ?>
                                    <input type="hidden" class="form-control erp-supplier-name erp-input" id="supplierName" name="supplier-name" value="<?php echo e($supplier->id); ?>">
                                    <input type="text" class="form-control" id="supplierName" value="<?php echo e($supplier->name); ?>" readonly>
                                <?php else: ?>
                                    <select class="form-control select2 erp-supplier-name erp-select" name="supplier-name">
                                        <option value="">---SELECT---</option>
                                        <?php $__currentLoopData = Helper::SupplierAll(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value=<?php echo e($list->id); ?>> <?php echo e($list->name); ?> </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="orderDate">Date</label>
                                <div class="input-group">
                                    <input type="date" class="form-control erp-date erp-input" name="date" value="<?php echo e($purchaseorder->date); ?>">
                                </div>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="expectedDate">Delivery Date</label>
                                <div class="input-group">
                                    <input type="date" class="form-control erp-date_delivery" name="date_delivery" value="<?php echo e($purchaseorder->date_delivery); ?>">
                                </div>
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1">Payment</label>
                                <select class="form-control select2 erp-po_payment_type_id erp-select" name="po_payment_type_id">
                                    <option value="1">---SELECT---</option>
                                    <?php $__currentLoopData = Helper::POPaymentAll(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value=<?php echo e($pid->id); ?>  <?php echo e($pid->id == $purchaseorder->po_payment_type_id ? 'selected' : ''); ?>> <?php echo e($pid->text); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1">Status</label>
                                <select class="form-control select2 erp-po_status_id erp-select" name="po_status_id">
                                    <option value="1">---SELECT---</option>
                                    <?php $__currentLoopData = Helper::POStatusAll(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value=<?php echo e($status->id); ?> <?php echo e($status->id == $purchaseorder->po_status_id ? 'selected' : ''); ?> > <?php echo e($status->text); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </form>
                <?php else: ?>
                    <form class="erp-form-submit">
                        <input type="hidden" class="erp-po_id" name="poid" value="" />
                        <input type="hidden" name="po_id2" value="<?php echo e($purchaseorder ? $purchaseorder->id : 0); ?>">
                        <div class="row">
                            <div class="col-md-12 form-group mb-3">
                                <label for="ponumber">PO Number</label>
                                <input type="text" class="form-control erp-po-number erp-input" name="po-number" value="PO-<?php echo e(random_int(100000, 999999)); ?>">
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="supplierName">Suppliers</label>
                                <?php if($supplier): ?>
                                    <input type="hidden" class="form-control erp-supplier-name erp-input" id="supplierName" name="supplier-name" value="<?php echo e($supplier->id); ?>">
                                    <input type="text" class="form-control" id="supplierName" value="<?php echo e($supplier->name); ?>">
                                <?php else: ?>
                                    <select class="form-control select2 erp-supplier-name erp-select" name="supplier-name">
                                        <option value="">---SELECT---</option>
                                        <?php $__currentLoopData = Helper::SupplierAll(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value=<?php echo e($list->id); ?>> <?php echo e($list->name); ?> </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="orderDate">Date</label>
                                <div class="input-group">
                                    <input type="date" class="form-control erp-date erp-input" name="date" value="<?php echo e(\Carbon\Carbon::parse(\Carbon\Carbon::now())->format('Y-m-d')); ?>">
                                </div>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="expectedDate">Delivery Date</label>
                                <div class="input-group">
                                    <input type="date" class="form-control erp-date_delivery" name="date_delivery">
                                </div>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1">Payment</label>
                                <select class="form-control select2 erp-po_payment_type_id erp-select" name="po_payment_type_id">
                                    <option value="1">---SELECT---</option>
                                    <?php $__currentLoopData = Helper::POPaymentAll(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value=<?php echo e($pid->id); ?>> <?php echo e($pid->text); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1">Status</label>
                                <select class="form-control select2 erp-po_status_id erp-select" name="po_status_id">
                                    <option value="1">---SELECT---</option>
                                    <?php $__currentLoopData = Helper::POStatusAll(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value=<?php echo e($status->id); ?> <?php echo e($status->id == 1 ? 'selected' : ''); ?>> <?php echo e($status->text); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<div class="row mb-4">
    <div class="col-md-12">
        <a href="<?php echo e(route('purchaseorder-index')); ?>" class="btn btn-outline-primary ml-2 float-right">Cancel</a>
        <div class="btn-group dropdown float-right">
            <button type="submit" class="btn btn-outline-primary erp-po-edit-form">
                Save
            </button>
            <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split _r_drop_right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu" x-placement="right-start">
                <a class="dropdown-item" href="#">print</a>
            </div>
        </div>
    </div>
</div>
<div class="row mb-4">
    <div class="col-md-12 mb-4">
        <div class="card text-left">
            <div class="card-body">
                <h4 class="card-title mb-4">Purchase Order Item
                    <button class="btn btn btn-outline-primary float-right" data-toggle="modal" data-target="#hideShowColumns">Hide/Show Columns</button>
                    <button class="btn btn btn-outline-primary float-right addPurchaseOrderItem mr-1 erp-button">Create</button>
                </h4>
                <div class="modal fade" id="hideShowColumns" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">
                    <div class="modal-dialog modal-dialog modal-lg" role="document">
                        <form action="<?php echo e(route('proformainvoice-hideshowcolumns')); ?>" method="post">
                            <div class="modal-content">
                                <div class="modal-body">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" value="<?php echo e($purchaseorder ? $purchaseorder->id : ''); ?>" name="proformaInvoiceId" />
                                            <?php echo $__env->make('pages.purchaseorder.hideshowcolumn', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="zero_configuration_table" class="display table table-striped table-bordered removeBorder zero_configuration_table erp-proformaInvoiceItem" width="100%">
                        <thead>
                            <tr>
                                <th style="min-width: 50px !important">#</th>
                                <th>PI Line</th>
                                <th>Brand Name</th>
                                <th>Product Name</th>
                                <th>Product Description</th>
                                <th>Bar Code</th>
                                <th>Hs Code</th>
                                <th>Image</th>
                                <th>Qty-Items</th>
                                <th>Qty-Pkg</th>
                                <th>Gross Weight</th>
                                <th>Net Weight</th>
                                <th>Volume</th>
                                <th>Unit Price</th>
                                <th>Total USD</th>
                                <th style="min-width: 50px !important">Action</th>
                            </tr>
                        </thead>
                        <tbody class="connectedSortable">
                            <?php $__currentLoopData = $purchaseOrderItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr data-id="<?php echo e($list->id); ?>" data-changed="0">
                                    <td>#</td>
                                    <td>
                                        <select class="form-control select2 erp-field-poli_pi_id erp-select">
                                            <option>---SELECT---</option>                                           
                                        </select>
                                    </td>                                    
                                    <td><input class="form-control erp-field-bname erp-input" value="" disabled /> </td>
                                    <td><input class="form-control erp-field-prd_our_item_no erp-input" value="" disabled /> </td>
                                    <td><input class="form-control erp-field-prd_description erp-input" value="" disabled /> </td>
                                    <td><input class="form-control erp-field-prd_barcode erp-input" value="" disabled /> </td>
                                    <td><input class="form-control erp-field-prd_hs_code erp-input" value="" disabled /> </td>
                                    <td><input class="form-control erp-field-prd_image_url erp-input" value="" disabled /> </td>
                                    <td><input class="form-control erp-field-ttl_pkg erp-input pi-text" value="" disabled /></td>
                                    <td><input class="form-control erp-field-poli_qty_pkg erp-input pi-text" value="" /></td>
                                    <td><input class="form-control erp-field-gwt erp-input pi-text" value="" disabled /></td>
                                    <td><input class="form-control erp-field-nwt erp-input pi-text" value="" disabled /> </td>
                                    <td><input class="form-control erp-field-volume erp-input pi-text" value="" disabled /> </td>
                                    <td><input class="form-control erp-field-poli_pcup erp-input pi-text" value="" disabled /> </td>
                                    <td><input class="form-control erp-field-total_usd erp-input pi-text" value="" disabled /> </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="_dot _inline-dot"></span>
                                            <span class="_dot _inline-dot"></span>
                                            <span class="_dot _inline-dot"></span>
                                        </button>
                                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 34px, 0px);">
                                            <a type="button" class="dropdown-item erp-pili_duplicate" href="#"><i class="nav-icon i-Duplicate-Layer font-weight-bold" aria-hidden="true"> </i> Duplicate</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mb-4">
    <div class="col-md-12">
        <a href="<?php echo e(route('purchaseorder-index')); ?>" class="btn btn-outline-primary ml-2 float-right">Cancel</a>
        <div class="btn-group dropdown float-right">
            <button type="submit" class="btn btn-outline-primary erp-po-edit-form">
                Save
            </button>
            <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split _r_drop_right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu" x-placement="right-start">
                <a class="dropdown-item" href="#">print</a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-js'); ?>
    <script src="<?php echo e(asset('assets/js/vendor/pickadate/picker.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/vendor/pickadate/picker.date.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/form.basic.script.js')); ?>"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="<?php echo e(asset('assets/js/modal.script.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('bottom-js'); ?>
    <?php echo $__env->make('pages.purchaseorder.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('pages.common.modal-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/pages/purchaseorder/edit.blade.php ENDPATH**/ ?>