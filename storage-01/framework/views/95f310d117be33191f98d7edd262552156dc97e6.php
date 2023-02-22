<?php $__env->startSection('page-css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/styles/vendor/pickadate/classic.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/styles/vendor/pickadate/classic.date.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/styles/vendor/datatables.min.css')); ?>">
    <style>
        .dragging li.ui-state-hover {
            min-width: 240px;
        }
        .dragging .ui-state-hover a {
            color:green !important;
            font-weight: bold;
        }
        .connectedSortable tr, .ui-sortable-helper {
            cursor: move;
        }
        .connectedSortable tr:first-child {
            cursor: default;
        }
        .ui-sortable-placeholder {
            background: yellow;
        }
        .rmBorder{
            border: none;
        }
        .removeBorder input{
            border: none;
        }
        .removeBorder img{
            border: none;
            background-color: transparent;
        }
        .checkbox-inline{
            display: inline-block !important;
        }
        .table td{
            padding: 5px !important;
            vertical-align: top !important;
        }
        .erp-field-prd_images_url{
            object-fit: contain;
        }
        .erp-margin_left{
            margin-left: -15px;
        }
        .form-group label {
            width: 100%;
        }
        .select2-container {
            width: 150px;
        }
        .btn-field-grp {
            display: flex;
        }
        .btn-field-grp button{
            margin-left: 5px;
        }
        .btn-field-grp .select2-container{
            width: 88% !important;
        }
        .pi-text{
            text-align: right;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
<div class="breadcrumb">
    <div class="col-sm-12 col-md-12">
        <h4><a href="<?php echo e(route('dashboard')); ?>">ERP</a> | <a href="<?php echo e(route('proformainvoice-index')); ?>"> Proforma Invoice </a> | Proforma Invoice <?php echo e($proformaInvoice ? 'Edit: '.$proformaInvoice->id : 'New'); ?>

        <a href="<?php echo e(route('proformainvoice-index')); ?>" class="btn btn-outline-primary ml-2 float-right">Cancel</a>
        <div class="btn-group dropdown float-right">
            <button type="submit" class="btn btn-outline-primary erp-pili-edit-form">
                Save
            </button>
            <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split _r_drop_right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu" x-placement="right-start">
                <?php if($proformaInvoice): ?>
                    <a class="dropdown-item" href="<?php echo e(route('proformainvoice-print',$proformaInvoice->id)); ?>" target="__blank">print</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<div class="separator-breadcrumb border-top"></div>
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-body">
                <?php if($proformaInvoice): ?>
                    <form class="erp-form-submit">
                        <input type="hidden" class="erp-pili_id" value="<?php echo e($proformaInvoice->id); ?>" name="pid" />
                        <input type="hidden" value="<?php echo e($proformaInvoice->id); ?>" name="pi_id1" />
                        <div class="row">
                            <div class="col-md-12 form-group mb-3">
                                <label for="orderNumber">Order Number</label>
                                <input type="text" class="form-control erp-order_number erp-input" id="orderNumber" name="order_number" value="<?php echo e($proformaInvoice->order_number); ?>">
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="customerName">Customer Name</label>
                                <input type="text" class="form-control erp-cust_name erp-input" id="customerName" name="cust_name" value="<?php echo e($proformaInvoice->customer->cust_name); ?>">
                            </div>
                            <div class="col-md-6 form-group mb-3 erp-select2">
                                <label for="orderDate">Customer Address</label>
                                <select class="my-select select2 form-control customer-address" name="cust_address_id">
                                    <option>---SELECT---</option>
                                    <?php $__currentLoopData = Helper::getCustomerAddress($proformaInvoice->customer->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($cid->id); ?>"><?php echo e($cid->address); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="orderDate">Order Date</label>
                                <div class="input-group">
                                    <input type="date" class="form-control erp-ordered_on erp-input" name="ordered_no" value="<?php echo e($proformaInvoice->ordered_on); ?>">
                                </div>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="expectedDate">Expected Date</label>
                                <div class="input-group">
                                    <input type="date" class="form-control erp-expected_on erp-input" name="expected_on" value="<?php echo e($proformaInvoice->expected_on); ?>">
                                </div>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="leadTime">Lead Time</label>
                                <div class="input-group">
                                    <input type="date" class="form-control erp-lead_time erp-input" name="lead_time" value="<?php echo e($proformaInvoice->lead_time); ?>">
                                </div>
                            </div>
                            <div class="col-md-6 form-group erp-select2">
                                <label for="orderDate">From Address</label>
                                <div class="btn-field-grp">
                                    <select class="my-select select2 form-control from-addr-id" name="from_addr_id" data-my_select2="select_options_from_addr">
                                    </select>
                                    <button type="button" class="btn btn-outline-primary btn-sm erp-modal-button add_btn" data-entity="pi_id1" data-name="from_addr_id" data-is-new="1" data-url="<?php echo e(route('get-from-address-contact')); ?>" data-submit-url="<?php echo e(route('proforma-contact-store')); ?>" title="Add"><i class="i-Add font-weight-bold"></i></button>
                                    <button type="button" class="btn btn-outline-primary btn-sm erp-modal-button edit_btn" data-entity="pi_id1" data-name="from_addr_id" data-is-new="0" data-url="<?php echo e(route('get-from-address-contact')); ?>" data-submit-url="<?php echo e(route('proforma-contact-store')); ?>" title="Edit"><i class="i-Pen-2 font-weight-bold"></i></button>
                                </div>
                            </div>
                            <div class="col-md-6 form-group mb-3 erp-select2">
                                <label for="orderDate">Destination Address</label>
                                <div class="btn-field-grp">
                                    <select class="my-select select2 form-control dest-addr-id" name="dest_addr_id" data-my_select2="select_options_dest_addr">
                                    </select>
                                    <button type="button" class="btn btn-outline-primary btn-sm erp-modal-button add_btn" data-entity="pi_id1" data-name="dest_addr_id" data-is-new="1" data-url="<?php echo e(route('get-dest-address-contact')); ?>" data-submit-url="<?php echo e(route('proforma-contact-dest-store')); ?>" title="Add"><i class="i-Add font-weight-bold"></i></button>
                                    <button type="button" class="btn btn-outline-primary btn-sm erp-modal-button edit_btn" data-entity="pi_id1" data-name="dest_addr_id" data-is-new="0" data-url="<?php echo e(route('get-dest-address-contact')); ?>" data-submit-url="<?php echo e(route('proforma-contact-dest-store')); ?>" title="Edit"><i class="i-Pen-2 font-weight-bold"></i></button>
                                </div>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1">Term</label>
                                <select class="form-control select2 erp-term erp-select" name="term">
                                    <option value="1">---SELECT---</option>
                                    <?php $__currentLoopData = Helper::shippingTermAll(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value=<?php echo e($sid->id); ?>  <?php echo e($sid->id == $proformaInvoice->term ? 'selected' : ''); ?>> <?php echo e($sid->text); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1">Payment</label>
                                <select class="form-control select2 erp-payment erp-select" name="payment">
                                    <option value="1">---SELECT---</option>
                                    <?php $__currentLoopData = Helper::paymentTermAll(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value=<?php echo e($pid->id); ?>  <?php echo e($pid->id == $proformaInvoice->payment ? 'selected' : ''); ?>> <?php echo e($pid->text); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1">Status</label>
                                <select class="form-control select2 erp-status erp-select" name="status">
                                    <option value="1">---SELECT---</option>
                                    <?php $__currentLoopData = Helper::proformaStatusAll(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value=<?php echo e($status->id); ?>  <?php echo e($status->id == $proformaInvoice->status ? 'selected' : ''); ?>> <?php echo e($status->text); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </form>
                <?php else: ?>
                    <form class="erp-form-submit">
                        <input type="hidden" class="erp-pili_id" name="pid" value="" />
                        <input type="hidden" name="pi_id2" value="<?php echo e($proformaInvoice ? $proformaInvoice->id : 0); ?>">
                        <div class="row">
                            <div class="col-md-12 form-group mb-3">
                                <label for="orderNumber">Order Number</label>
                                <input type="text" class="form-control erp-order_number erp-input" name="order_number" value="<?php echo e(random_int(100000, 999999)); ?>">
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="customerName">Customer Name</label>
                                <select class="form-control select2 erp-cust_name erp-select" name="cust_name">
                                    <option value="">---SELECT---</option>
                                    <?php $__currentLoopData = Helper::customerAll(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value=<?php echo e($list->id); ?>> <?php echo e($list->cust_name); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-6 form-group mb-3 erp-select2">
                                <label for="orderDate">Customer Address</label>
                                <select class="my-select select2 form-control customer-address" name="cust_address_id">
                                </select>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="orderDate">Order Date</label>
                                <div class="input-group">
                                    <input type="date" class="form-control erp-ordered_on erp-input" name="ordered_on" value="<?php echo e(\Carbon\Carbon::parse(\Carbon\Carbon::now())->format('Y-m-d')); ?>">
                                </div>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="expectedDate">Expected Date</label>
                                <div class="input-group">
                                    <input type="date" class="form-control erp-expected_on" name="ordered_on">
                                </div>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="leadTime">Lead Time</label>
                                <div class="input-group">
                                    <input type="date" class="form-control erp-lead_time erp-input" name="lead_time">
                                </div>
                            </div>
                            <div class="col-md-6 form-group erp-select2">
                                <label for="orderDate">From Address</label>
                                <div class="btn-field-grp">
                                    <select class="my-select select2 form-control from-addr-id" name="from_addr_id" data-my_select2="select_options_from_addr">
                                    </select>
                                    <button type="button" class="btn btn-outline-primary btn-sm erp-modal-button add_btn" data-entity="pi_id2" data-name="from_addr_id" data-is-new="1" data-url="<?php echo e(route('get-from-address-contact')); ?>" data-submit-url="<?php echo e(route('proforma-contact-store')); ?>" title="Add"><i class="i-Add font-weight-bold"></i></button>
                                    <button type="button" class="btn btn-outline-primary btn-sm erp-modal-button edit_btn" data-entity="pi_id2" data-name="from_addr_id" data-is-new="0" data-url="<?php echo e(route('get-from-address-contact')); ?>" data-submit-url="<?php echo e(route('proforma-contact-store')); ?>" title="Edit"><i class="i-Pen-2 font-weight-bold"></i></button>
                                </div>
                            </div>
                            <div class="col-md-6 form-group mb-3 erp-select2">
                                <label for="orderDate">Destination Address</label>
                                <div class="btn-field-grp">
                                    <select class="my-select select2 form-control dest-addr-id" name="dest_addr_id" data-my_select2="select_options_dest_addr">
                                    </select>
                                    <button type="button" class="btn btn-outline-primary btn-sm erp-modal-button add_btn" data-entity="pi_id2" data-name="dest_addr_id" data-is-new="1" data-url="<?php echo e(route('get-dest-address-contact')); ?>" data-submit-url="<?php echo e(route('proforma-contact-dest-store')); ?>" title="Add"><i class="i-Add font-weight-bold"></i></button>
                                    <button type="button" class="btn btn-outline-primary btn-sm erp-modal-button edit_btn" data-entity="pi_id2" data-name="dest_addr_id" data-is-new="0" data-url="<?php echo e(route('get-dest-address-contact')); ?>" data-submit-url="<?php echo e(route('proforma-contact-dest-store')); ?>" title="Edit"><i class="i-Pen-2 font-weight-bold"></i></button>
                                </div>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1">Term</label>
                                <select class="form-control select2 erp-term erp-select" name="term">
                                    <option value="1">---SELECT---</option>
                                    <?php $__currentLoopData = Helper::shippingTermAll(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value=<?php echo e($sid->id); ?>> <?php echo e($sid->text); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1">Payment</label>
                                <select class="form-control select2 erp-payment erp-select" name="payment">
                                    <option value="1">---SELECT---</option>
                                    <?php $__currentLoopData = Helper::paymentTermAll(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value=<?php echo e($pid->id); ?>> <?php echo e($pid->text); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1">Status</label>
                                <select class="form-control select2 erp-status erp-select" name="status">
                                    <option value="1">---SELECT---</option>
                                    <?php $__currentLoopData = Helper::proformaStatusAll(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
        <a href="<?php echo e(route('proformainvoice-index')); ?>" class="btn btn-outline-primary ml-2 float-right">Cancel</a>
        <div class="btn-group dropdown float-right">
            <button type="submit" class="btn btn-outline-primary erp-pili-edit-form">
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
                <h4 class="card-title mb-4">Proforma Invoice Item
                    <button class="btn btn btn-outline-primary float-right" data-toggle="modal" data-target="#hideShowColumns">Hide/Show Columns</button>
                    <button class="btn btn btn-outline-primary float-right addProformaInvoiceItem mr-1 erp-button">Create</button>
                </h4>
                <div class="modal fade" id="hideShowColumns" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">
                    <div class="modal-dialog modal-dialog modal-lg" role="document">
                        <form action="<?php echo e(route('proformainvoice-hideshowcolumns')); ?>" method="post">
                            <div class="modal-content">
                                <div class="modal-body">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" value="<?php echo e($proformaInvoice ? $proformaInvoice->id : ''); ?>" name="proformaInvoiceId" />
                                            <?php echo $__env->make('pages.Proforma-invoice.hideshowcolumn', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                    <?php
                        $column_list = $proformaInvoice->pi_fields ?? 0;
                    ?>
                <div class="table-responsive">
                    <table id="zero_configuration_table" class="display table table-striped table-bordered removeBorder zero_configuration_table erp-proformaInvoiceItem" width="100%">
                        <thead>
                            <tr>
                                <th style="min-width: 50px !important">#</th>
                                <?php if($proformaInvoice): ?>
                                    <th>Product</th>
                                    <th>Supplier</th>
                                    <?php if($column_list['erp-field-prd_supplier_item']['view'] ?? 0) { ?> <th>Supplier Item No</th> <?php } ?>
                                    <?php if($column_list['erp-field-prd_our_item_no']['view'] ?? 0) { ?> <th>Our Item No</th> <?php } ?>
                                    <?php if($column_list['erp-field-prd_barcode']['view'] ?? 0) { ?> <th>Bar Code</th> <?php } ?>
                                    <?php if($column_list['erp-field-prd_hs_code']['view'] ?? 0) { ?> <th>Hs Code</th> <?php } ?>
                                    <?php if($column_list['erp-field-prd_images_url']['view'] ?? 0) { ?> <th>Image</th> <?php } ?>
                                    <?php if($column_list['erp-field-prd_gwt_ctn']['view'] ?? 0) { ?> <th style="min-width: 150px" title="Gross Weight Per Carton">GWT-P-PKG</th> <?php } ?>
                                    <?php if($column_list['erp-field-prd_ctn_wt']['view'] ?? 0) { ?> <th title="Carton Weight">PKG-WT</th> <?php } ?>
                                    <?php if($column_list['erp-field-prd_pcs_per_ctn']['view'] ?? 0) { ?> <th title="Pieces Per Carton">ITEM-P-PKG</th> <?php } ?>
                                    <?php if($column_list['erp-field-prd_cbm_ctn']['view'] ?? 0) { ?> <th title="Cubic Meter Per Carton">VOL-P-PKG</th> <?php } ?>
                                    <?php if($column_list['erp-field-prd_unit_type']['view'] ?? 0) { ?> <th>Unit Type</th> <?php } ?>
                                    <?php if($column_list['erp-field-prd_ttl_pkg']['view'] ?? 0) { ?> <th title="Total Package">TTL PKG</th> <?php } ?>
                                    <?php if($column_list['erp-field-prd_ttl_cbm']['view'] ?? 0) { ?> <th title="Total Cubic Meter">TTL-VOL</th> <?php } ?>
                                    <?php if($column_list['erp-field-prd_gwt']['view'] ?? 0) { ?> <th title="Gross Weight">GWT</th> <?php } ?>
                                    <?php if($column_list['erp-field-prd_nwt']['view'] ?? 0) { ?> <th title="Net Weight">NWT</th> <?php } ?>
                                    <?php if($column_list['erp-field-prd_pup']['view'] ?? 0) { ?> <th title="Purchase Unit Price">PCUP</th> <?php } ?>
                                    <?php if($column_list['erp-field-pili_upmp']['view'] ?? 0) { ?> <th title="Unit Price Markup %">Markup <br>%</th> <?php } ?>
                                    <?php if($column_list['erp-field-pili_sup']['view'] ?? 0) { ?> <th title="Sales Unit Price">SUP</th> <?php } ?>
                                    <?php if($column_list['erp-field-pili_qty']['view'] ?? 0) { ?> <th>Quantity</th> <?php } ?>
                                    <?php if($column_list['erp-field-pili_unit']['view'] ?? 0) { ?> <th>Unit</th> <?php } ?>
                                    <?php if($column_list['erp-field-pili_total_usd']['view'] ?? 0) { ?> <th>Total USD</th> <?php } ?>
                                <?php else: ?>
                                    <th>Product</th>
                                    <th>Supplier</th>
                                    <th>Supplier Item No</th>
                                    <th>Our Item No</th>
                                    <th>Bar Code</th>
                                    <th>Hs Code</th>
                                    <th>Image</th>
                                    <th title="Gross Weight Per Carton">GWT-P-PKG</th>
                                    <th title="Carton Weight">PKG-WT</th>
                                    <th title="Pieces Per Carton">ITEM-P-PKG</th>
                                    <th title="Cubic Meter Per Carton">VOL-P-PKG</th>
                                    <th>Unit Type</th>
                                    <th title="Total Package">TTL PKG</th>
                                    <th title="Total Cubic Meter">TTL-VOL</th>
                                    <th title="Gross Weight">GWT</th>
                                    <th title="Net Weight">NWT</th>
                                    <th title="Purchase Unit Price">PCUP</th>
                                    <th title="Unit Price Markup %">Markup<br>(%)</th>
                                    <th title="Sales Unit Price">SUP</th>
                                    <th>Quantity</th>
                                    <th>Unit</th>
                                    <th>Total USD</th>
                                <?php endif; ?>
                                <th style="min-width: 50px !important">Action</th>
                            </tr>
                        </thead>
                        <tbody class="connectedSortable">
                            <?php $__currentLoopData = $proformaInvoiceItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr data-id="<?php echo e($list->id); ?>" data-changed="0">
                                    <td>#</td>
                                    <td>
                                        <select class="form-control select2 erp-field-pili_prd_id erp-select">
                                            <option>---SELECT---</option>
                                            <?php $__currentLoopData = Helper::productAll(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value=<?php echo e($pid->id); ?> <?php echo e($pid->id == $list->pili_prd_id ? 'selected' : ''); ?>> <?php echo e($pid->prd_supplier_item); ?> </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control erp-field-supplier_id rmBorder" disabled>
                                            <option value=<?php echo e($list->supplier ? $list->supplier->id : ''); ?>> <?php echo e($list->supplier ? $list->supplier->name : ''); ?> </option>
                                        </select>
                                    </td>
                                    <?php if($column_list['erp-field-prd_supplier_item']['view'] ?? 0) { ?>
                                        <td> <input class="form-control erp-field-prd_supplier_item erp-input" value="<?php echo e($list->product ? $list->product->prd_supplier_item : ''); ?>" disabled /> </td>
                                    <?php } ?>
                                    <?php if($column_list['erp-field-prd_our_item_no']['view'] ?? 0) { ?>
                                        <td> <input class="form-control erp-field-prd_our_item_no erp-input" value="<?php echo e($list->product ? $list->product->prd_our_item_no : ''); ?>" disabled /> </td>
                                    <?php } ?>
                                    <?php if($column_list['erp-field-prd_barcode']['view'] ?? 0) { ?>
                                        <td> <input class="form-control erp-field-prd_barcode erp-input" value="<?php echo e($list->product ? $list->product->prd_barcode : ''); ?>" disabled /> </td>
                                    <?php } ?>
                                    <?php if($column_list['erp-field-prd_hs_code']['view'] ?? 0) { ?>
                                        <td> <input class="form-control erp-field-prd_hs_code erp-input" value="<?php echo e($list->product ? $list->product->prd_hs_code : ''); ?>" disabled /> </td>
                                    <?php } ?>
                                    <?php if($column_list['erp-field-prd_images_url']['view'] ?? 0) { ?>
                                        <td>
                                            <img class="form-control erp-field-prd_images_url" src="<?php echo e($list->productImage ? asset('storage/product/'.$list->productImage->prd_id.'/'.$list->productImage->filename) : asset('assets/images/sample.jpg')); ?>" alt="image" />
                                        </td>
                                    <?php } ?>
                                    <?php if($column_list['erp-field-prd_gwt_ctn']['view'] ?? 0) { ?>
                                        <td><input class="form-control erp-field-prd_gwt_ctn erp-input pi-text" value="<?php echo e($list->product ? number_format($list->product->prd_gw_ctn,2) : 0); ?>" disabled /></td>
                                    <?php } ?>
                                    <?php if($column_list['erp-field-prd_ctn_wt']['view'] ?? 0) { ?>
                                        <td><input class="form-control erp-field-prd_ctn_wt erp-input pi-text" value="<?php echo e($list->product ? number_format($list->product->prd_ctn_wt,2) : 0); ?>" disabled /></td>
                                    <?php } ?>
                                    <?php if($column_list['erp-field-prd_pcs_per_ctn']['view'] ?? 0) { ?>
                                        <td> <input class="form-control erp-field-prd_pcs_per_ctn erp-input pi-text" value="<?php echo e($list->product ? number_format($list->product->prd_pcs_per_ctn,2) : 0); ?>" disabled /> </td>
                                    <?php } ?>
                                    <?php if($column_list['erp-field-prd_cbm_ctn']['view'] ?? 0) { ?>
                                        <td> <input class="form-control erp-field-prd_cbm_ctn erp-input pi-text" value="<?php echo e($list->product ? number_format($list->product->prd_cbm_ctn,2) : 0); ?>" disabled /> </td>
                                    <?php } ?>
                                    <?php if($column_list['erp-field-prd_unit_type']['view'] ?? 0) { ?>
                                        <td>
                                            <select class="form-control erp-field-prd_unit_type erp-select rmBorder" disabled>
                                                <option value=<?php echo e($list->product ? $list->product->prd_unit_type : ''); ?> <?php echo e("PKG" == $list->product ? ($list->product->prd_unit_type ? 'selected' : '') : ''); ?>> <?php echo e($list->product ? $list->product->prd_unit_type : ''); ?> </option>
                                                <option value=<?php echo e($list->product ? $list->product->prd_unit_type : ''); ?> <?php echo e("SINGLE" == $list->product ? ($list->product->prd_unit_type ? 'selected' : '' ): ''); ?>> <?php echo e($list->product ? $list->product->prd_unit_type : ''); ?> </option>
                                            </select>
                                        </td>
                                    <?php } ?>
                                    <?php $ttl_pkg = $list->product ? ($list->product->prd_unit_type == 'PKG' ? $list->pili_qty : ($list->pili_qty / $list->product->prd_pcs_per_ctn)) : 0 ; ?>
                                    <?php if($column_list['erp-field-prd_ttl_pkg']['view'] ?? 0) { ?>
                                        <td><input class="form-control erp-field-prd_ttl_pkg erp-input pi-text" value="<?php echo e(number_format($ttl_pkg,2) ?? 0); ?>" disabled /></td>
                                    <?php } ?>
                                    <?php if($column_list['erp-field-prd_ttl_cbm']['view'] ?? 0) { ?>
                                        <td> <input class="form-control erp-field-prd_ttl_cbm erp-input pi-text" value="<?php echo e($list->product ? number_format($ttl_pkg * $list->product->prd_cbm_ctn ,2) : 0); ?>" disabled /> </td>
                                    <?php } ?>
                                    <?php $gwt = $list->product ? $ttl_pkg * $list->product->prd_gw_ctn : 0; ?>
                                    <?php if($column_list['erp-field-prd_gwt']['view'] ?? 0) { ?>
                                        <td><input class="form-control erp-field-prd_gwt erp-input pi-text" value="<?php echo e(number_format($gwt,2)); ?>" disabled /></td>
                                    <?php } ?>
                                    <?php if($column_list['erp-field-prd_nwt']['view'] ?? 0) { ?>
                                        <td><input class="form-control erp-field-prd_nwt erp-input pi-text" value="<?php echo e($list->product ? number_format($gwt - ($list->product->prd_ctn_wt * $ttl_pkg),2) : 0); ?>" disabled /></td>
                                    <?php } ?>
                                    <?php if($column_list['erp-field-prd_pup']['view'] ?? 0) { ?>
                                        <td> <input class="form-control erp-field-prd_pup erp-input pi-text" value="<?php echo e($list->product ? number_format($list->product->prd_pup,2) : 0); ?>" disabled /> </td>
                                    <?php } ?>
                                    <?php if($column_list['erp-field-pili_upmp']['view'] ?? 0) { ?>
                                        <td> <input class="form-control erp-field-pili_upmp erp-input pi-text" value="<?php echo e($list->pili_upmp ? number_format($list->pili_upmp,2) : 0); ?>" /> </td>
                                    <?php } ?>
                                    <?php if($column_list['erp-field-pili_sup']['view'] ?? 0) { ?>
                                        <td> <input class="form-control erp-field-pili_sup erp-input pi-text" value="<?php echo e($list->pili_sup ? number_format($list->pili_sup,2) : 0); ?>" /> </td>
                                    <?php } ?>
                                    <?php if($column_list['erp-field-pili_qty']['view'] ?? 0) { ?>
                                        <td> <input class="form-control erp-field-pili_qty erp-input pi-text" value="<?php echo e($list->pili_qty ? number_format($list->pili_qty,2) : 0); ?>" /> </td>
                                    <?php } ?>
                                    <?php if($column_list['erp-field-pili_unit']['view'] ?? 0) { ?>
                                        <td>
                                            <input class="form-control erp-field-pili_unit erp-input pi-text" value="<?php echo e($list->product ? $list->product->prd_sold_by : ''); ?>" disabled />
                                        </td>
                                    <?php } ?>
                                    <?php if($column_list['erp-field-pili_total_usd']['view'] ?? 0) { ?>
                                        <td> <input class="form-control erp-field-pili_total_usd erp-input pi-text" value="<?php echo e(number_format($list->pili_sup * $list->pili_qty,2)); ?>" disabled /> </td>
                                    <?php } ?>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="_dot _inline-dot"></span>
                                            <span class="_dot _inline-dot"></span>
                                            <span class="_dot _inline-dot"></span>
                                        </button>
                                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 34px, 0px);">
                                            <a class="dropdown-item" href="<?php echo e(route('proformainvoiceitem-delete',$list->id)); ?>"><i class="nav-icon i-Close-Window font-weight-bold" aria-hidden="true"> </i> Delete</a>
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
<a href="<?php echo e(route('proformainvoice-index')); ?>" class="btn btn-outline-primary ml-2 float-right">Cancel</a>
<div class="btn-group dropdown float-right">
    <button type="submit" class="btn btn-outline-primary erp-pili-edit-form">
        Save
    </button>
    <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split _r_drop_right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <div class="dropdown-menu" x-placement="right-start">
        <a class="dropdown-item" href="#">print</a>
    </div>
</div>
<?php
    $contactId = \App\Models\GaToContacts::where('ga_id','=','1')->get(['contact_id']);
    $select_data = \App\Models\Contact::whereIn('id',$contactId)->get(['id','address'])->map(function($select_data){
        return [
            'id' => $select_data->id,
            'text' => $select_data->address
        ];
    });
    $contactId1 = \App\Models\GaToContacts::where('ga_id','=','2')->get(['contact_id']);
    $select_data1 = \App\Models\Contact::whereIn('id',$contactId1)->get(['id','address'])->map(function($select_data1){
        return [
            'id' => $select_data1->id,
            'text' => $select_data1->address
        ];
    });
?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-js'); ?>
    <script>
        xui.select2.select_options_from_addr = <?=json_encode($select_data); ?>
    </script>
    <script>
        xui.select2.select_options_dest_addr = <?=json_encode($select_data1); ?>
    </script>
    <script src="<?php echo e(asset('assets/js/vendor/pickadate/picker.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/vendor/pickadate/picker.date.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/form.basic.script.js')); ?>"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="<?php echo e(asset('assets/js/modal.script.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('bottom-js'); ?>
    <?php echo $__env->make('pages.Proforma-invoice.ajax', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('pages.common.modal-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/pages/Proforma-invoice/edit.blade.php ENDPATH**/ ?>