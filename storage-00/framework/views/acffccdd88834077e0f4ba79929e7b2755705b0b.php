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
    <div class="col-sm-12">
        <h4><a href="<?php echo e(route('dashboard')); ?>">ERP</a> | <a href="<?php echo e(route('consignment-index')); ?>"> Consignment </a> | Consignment <?php echo e($consignment ? 'Edit: '.$consignment->id : 'New'); ?>

        <a href="<?php echo e(route('consignment-index')); ?>" class="btn btn-outline-primary ml-2 float-right">Cancel</a>
        <div class="btn-group dropdown float-right">
            <button type="submit" class="btn btn-outline-primary erp-con-edit-form">
                Save
            </button>
            <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split _r_drop_right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu" x-placement="right-start">
                <?php if($consignment): ?>
                    <a class="dropdown-item" href="<?php echo e(route('consignment-print',$consignment->id)); ?>" target="__blank">print</a>
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
                <?php if($consignment): ?>
                    <form class="erp-form-submit">
                        <input type="hidden" class="erp-con_id" value="<?php echo e($consignment->id); ?>" name="cid" />
                        <input type="hidden" value="<?php echo e($consignment->id); ?>" name="ci_id1" />
                        <div class="row">
                            <div class="col-md-12 form-group mb-3">
                                <label for="orderNumber">Consignment Number</label>
                                <input type="text" class="form-control erp-con_number erp-input" id="con_number" name="con_number" value="<?php echo e($consignment->con_number); ?>">
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="customerName">Customer</label>
                                <input type="hidden" class="form-control erp-cust_name erp-input" id="customerName" name="cust_name" value="<?php echo e($consignment->customer->id); ?>">
                                <input type="text" class="form-control" id="customerName" name="cust_name" value="<?php echo e($consignment->customer->cust_name); ?>">
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="orderDate">Date</label>
                                <div class="input-group">
                                    <input type="date" class="form-control erp-date erp-input" name="date" value="<?php echo e($consignment->date); ?>">
                                </div>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="expectedDate">Shipment Date</label>
                                <div class="input-group">
                                    <input type="date" class="form-control erp-date_ship erp-input" name="date_ship" value="<?php echo e($consignment->date_ship); ?>">
                                </div>
                            </div>
                            <div class="col-md-6 form-group erp-select2">
                                <label for="orderDate">Ship From</label>
                                <div class="btn-field-grp">
                                    <select class="my-select select2 form-control from_addr_id" name="from_addr_id" data-my_select2="select_options_from_addr">
                                    </select>
                                    <button type="button" class="btn btn-outline-primary btn-sm erp-modal-button add_btn" data-entity="ci_id1" data-name="from_addr_id" data-is-new="1" data-url="<?php echo e(route('get-from-address-contact')); ?>" data-submit-url="<?php echo e(route('proforma-contact-store')); ?>" title="Add"><i class="i-Add font-weight-bold"></i></button>
                                    <button type="button" class="btn btn-outline-primary btn-sm erp-modal-button edit_btn" data-entity="ci_id1" data-name="from_addr_id" data-is-new="0" data-url="<?php echo e(route('get-from-address-contact')); ?>" data-submit-url="<?php echo e(route('proforma-contact-store')); ?>" title="Edit"><i class="i-Pen-2 font-weight-bold"></i></button>
                                </div>
                            </div>
                            <div class="col-md-6 form-group mb-3 erp-select2">
                                <label for="orderDate">Ship To</label>
                                <div class="btn-field-grp">
                                    <select class="my-select select2 form-control dest_addr_id" name="dest_addr_id" data-my_select2="select_options_dest_addr">
                                    </select>
                                    <button type="button" class="btn btn-outline-primary btn-sm erp-modal-button add_btn" data-entity="ci_id1" data-name="dest_addr_id" data-is-new="1" data-url="<?php echo e(route('get-dest-address-contact')); ?>" data-submit-url="<?php echo e(route('proforma-contact-dest-store')); ?>" title="Add"><i class="i-Add font-weight-bold"></i></button>
                                    <button type="button" class="btn btn-outline-primary btn-sm erp-modal-button edit_btn" data-entity="ci_id1" data-name="dest_addr_id" data-is-new="0" data-url="<?php echo e(route('get-dest-address-contact')); ?>" data-submit-url="<?php echo e(route('proforma-contact-dest-store')); ?>" title="Edit"><i class="i-Pen-2 font-weight-bold"></i></button>
                                </div>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1">Vessel</label>
                                <input type="text" class="form-control erp-con_vessel_id erp-input" name="con_vessel_id" value="<?php echo e($consignment->con_vessel_id); ?>">
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1">BL No</label>
                                <input type="text" class="form-control erp-con_blno erp-input" name="con_blno" value="<?php echo e($consignment->con_blno); ?>">
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1">Payment</label>
                                <select class="form-control select2 erp-con_payment_type_id erp-select" name="con_payment_type_id">
                                    <option value="1">---SELECT---</option>
                                    <?php $__currentLoopData = Helper::ConPaymentAll(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value=<?php echo e($payment->id); ?>  <?php echo e($payment->id == $consignment->con_payment_type_id ? 'selected' : ''); ?>> <?php echo e($payment->text); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1">Type</label>
                                <select class="form-control select2 erp-con_type_id erp-select" name="con_type_id">
                                    <option value="1">---SELECT---</option>
                                    <?php $__currentLoopData = Helper::ConTypeAll(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value=<?php echo e($type->id); ?>  <?php echo e($type->id == $consignment->con_type_id ? 'selected' : ''); ?>> <?php echo e($type->text); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1">Status</label>
                                <select class="form-control select2 erp-con_status_id erp-select" name="con_status_id">
                                    <option value="1">---SELECT---</option>
                                    <?php $__currentLoopData = Helper::ConStatusAll(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value=<?php echo e($status->id); ?>  <?php echo e($status->id == $consignment->con_status_id ? 'selected' : ''); ?>> <?php echo e($status->text); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </form>
                <?php else: ?>
                    <form class="erp-form-submit">
                        <input type="hidden" class="erp-con_id" name="cid" value="" />
                        <input type="hidden" name="ci_id2" value="<?php echo e($consignment ? $consignment->id : 0); ?>">
                        <div class="row">
                            <div class="col-md-12 form-group mb-3">
                                <label for="orderNumber">Consignment Number</label>
                                <input type="text" class="form-control erp-con_number erp-input" name="con_number" value="<?php echo e(random_int(100000, 999999)); ?>">
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="customerName">Customer</label>
                                <?php if($customer): ?>
                                    <input type="hidden" class="form-control erp-cust_name erp-input" id="customerName" name="cust_name" value="<?php echo e($customer->id); ?>">
                                    <input type="text" class="form-control" id="customerName" value="<?php echo e($customer->cust_name); ?>">
                                <?php else: ?>
                                    <select class="form-control select2 erp-cust_name erp-select" name="cust_name">
                                        <option value="">---SELECT---</option>
                                        <?php $__currentLoopData = Helper::customerAll(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value=<?php echo e($list->id); ?>> <?php echo e($list->cust_name); ?> </option>
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
                                <label for="expectedDate">Shipment Date</label>
                                <div class="input-group">
                                    <input type="date" class="form-control erp-date_ship" name="date_ship">
                                </div>
                            </div>
                            <div class="col-md-6 form-group erp-select2">
                                <label for="orderDate">Ship From</label>
                                <div class="btn-field-grp">
                                    <select class="my-select select2 form-control from_addr_id" name="from_addr_id" data-my_select2="select_options_from_addr">
                                    </select>
                                    <button type="button" class="btn btn-outline-primary btn-sm erp-modal-button add_btn" data-entity="ci_id2" data-name="from_addr_id" data-is-new="1" data-url="<?php echo e(route('get-from-address-contact')); ?>" data-submit-url="<?php echo e(route('proforma-contact-store')); ?>" title="Add"><i class="i-Add font-weight-bold"></i></button>
                                    <button type="button" class="btn btn-outline-primary btn-sm erp-modal-button edit_btn" data-entity="ci_id2" data-name="from_addr_id" data-is-new="0" data-url="<?php echo e(route('get-from-address-contact')); ?>" data-submit-url="<?php echo e(route('proforma-contact-store')); ?>" title="Edit"><i class="i-Pen-2 font-weight-bold"></i></button>
                                </div>
                            </div>
                            <div class="col-md-6 form-group mb-3 erp-select2">
                                <label for="orderDate">Ship To</label>
                                <div class="btn-field-grp">
                                    <select class="my-select select2 form-control dest_addr_id" name="dest_addr_id" data-my_select2="select_options_dest_addr">
                                    </select>
                                    <button type="button" class="btn btn-outline-primary btn-sm erp-modal-button add_btn" data-entity="ci_id2" data-name="dest_addr_id" data-is-new="1" data-url="<?php echo e(route('get-dest-address-contact')); ?>" data-submit-url="<?php echo e(route('proforma-contact-dest-store')); ?>" title="Add"><i class="i-Add font-weight-bold"></i></button>
                                    <button type="button" class="btn btn-outline-primary btn-sm erp-modal-button edit_btn" data-entity="ci_id2" data-name="dest_addr_id" data-is-new="0" data-url="<?php echo e(route('get-dest-address-contact')); ?>" data-submit-url="<?php echo e(route('proforma-contact-dest-store')); ?>" title="Edit"><i class="i-Pen-2 font-weight-bold"></i></button>
                                </div>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1">Vessel</label>
                                <div class="input-group">
                                    <input type="text" class="form-control erp-con_vessel_id" name="con_vessel_id">
                                </div>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1">BL No</label>
                                <div class="input-group">
                                    <input type="text" class="form-control erp-con_blno" name="con_blno">
                                </div>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1">Payment</label>
                                <select class="form-control select2 erp-con_payment_type_id erp-select" name="con_payment_type_id">
                                    <option value="1">---SELECT---</option>
                                    <?php $__currentLoopData = Helper::ConPaymentAll(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value=<?php echo e($pid->id); ?>> <?php echo e($pid->text); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1">Type</label>
                                <select class="form-control select2 erp-con_type_id erp-select" name="con_type_id">
                                    <option value="1">---SELECT---</option>
                                    <?php $__currentLoopData = Helper::ConTypeAll(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value=<?php echo e($tid->id); ?>> <?php echo e($tid->text); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1">Status</label>
                                <select class="form-control select2 erp-con_status_id erp-select" name="con_status_id">
                                    <option value="1">---SELECT---</option>
                                    <?php $__currentLoopData = Helper::ConStatusAll(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
        <a href="<?php echo e(route('consignment-index')); ?>" class="btn btn-outline-primary ml-2 float-right">Cancel</a>
        <div class="btn-group dropdown float-right">
            <button type="submit" class="btn btn-outline-primary erp-con-edit-form">
                Save
            </button>
            <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split _r_drop_right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropdown</span>
            </button>
        </div>
    </div>
</div>
<div class="row mb-4">
    <div class="col-md-12 mb-4">
        <div class="card text-left">
            <div class="card-body">
                <h4 class="card-title mb-4">Consignment Item
                    <button class="btn btn btn-outline-primary float-right" data-toggle="modal" data-target="#hideShowColumns">Hide/Show Columns</button>
                    <button class="btn btn btn-outline-primary float-right addConsignmentItem mr-1 erp-button">Create</button>
                </h4>
                <div class="modal fade" id="hideShowColumns" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">
                    <div class="modal-dialog modal-dialog modal-lg" role="document">
                        <form action="<?php echo e(route('consignment-hideshowcolumns')); ?>" method="post">
                            <div class="modal-content">
                                <div class="modal-body">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" value="<?php echo e($consignment ? $consignment->id : ''); ?>" name="consignmentId" />
                                            <?php echo $__env->make('pages.consignment.hideshowcolumn', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                    $column_list = $consignment->con_fields ?? 0;
                ?>
                <div class="table-responsive">
                    <table id="zero_configuration_table" class="display table table-striped table-bordered removeBorder zero_configuration_table erp-consignmentItem" width="100%">
                        <thead>
                            <tr>
                                <th style="min-width: 50px !important">#</th>
                                <th title="Proforma Invoice Item">PI Line</th>
                                <?php if($consignment): ?>
                                    <?php if($column_list['erp-field-brand_name']['view'] ?? 0) { ?> <th>Brand Name</th> <?php } ?>
                                    <?php if($column_list['erp-field-prd_supplier_item']['view'] ?? 0) { ?> <th>Product Name</th> <?php } ?>
                                    <?php if($column_list['erp-field-prd_description']['view'] ?? 0) { ?> <th>Product Description</th> <?php } ?>
                                    <?php if($column_list['erp-field-prd_barcode']['view'] ?? 0) { ?> <th>Bar Code</th> <?php } ?>
                                    <?php if($column_list['erp-field-prd_hs_code']['view'] ?? 0) { ?> <th>Hs Code</th> <?php } ?>
                                    <?php if($column_list['erp-field-pili_qty']['view'] ?? 0) { ?> <th>Qty-Items</th> <?php } ?>
                                    <?php if($column_list['erp-field-ttl_pkg']['view'] ?? 0) { ?> <th title="Total Package">Qty-PKG</th> <?php } ?>
                                    <?php if($column_list['erp-field-gwt']['view'] ?? 0) { ?> <th title="Gross Weight">GWT</th> <?php } ?>
                                    <?php if($column_list['erp-field-nwt']['view'] ?? 0) { ?> <th title="Net Weight">NWT</th> <?php } ?>
                                    <?php if($column_list['erp-field-volume']['view'] ?? 0) { ?> <th>Volume</th> <?php } ?>
                                <?php else: ?>
                                    <th>Brand Name</th>
                                    <th>Product Name</th>
                                    <th>Product Description</th>
                                    <th>Bar Code</th>
                                    <th>Hs Code</th>
                                    <th>Qty-Items</th>
                                    <th title="Total Package">Qty-PKG</th>
                                    <th title="Gross Weight">GWT</th>
                                    <th title="Net Weight">NWT</th>
                                    <th>Volume</th>
                                <?php endif; ?>
                                <th style="min-width: 50px !important">Action</th>
                            </tr>
                        </thead>
                        <tbody class="connectedSortable">
                            <?php $__currentLoopData = $consignmentItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr data-id="<?php echo e($list->id); ?>" data-changed="0">
                                    <td>#</td>
                                    <td>
                                        <select class="form-control select2 erp-field-conli_pi_id erp-select">
                                            <option>---SELECT---</option>
                                            <?php $__currentLoopData = Helper::piAll($customer ? $customer->id : $consignment->customer_id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value=<?php echo e($pid->id); ?> <?php echo e($pid->id == $list->conli_pi_id ? 'selected' : ''); ?>> <?php echo e($pid->id); ?> - <?php echo e($pid->product ? $pid->product->prd_our_item_no : ''); ?> </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </td>
                                    <input type="hidden" class="erp-field-gwt_ctn" value="<?php echo e($list->prd_gw_ctn); ?>">
                                    <input type="hidden" class="erp-field-ctn_wt" value="<?php echo e($list->prd_ctn_wt); ?>">
                                    <input type="hidden" class="erp-field-cbm_ctn" value="<?php echo e($list->prd_cbm_ctn); ?>">
                                    <input type="hidden" class="erp-field-prd_pcs_per_ctn" value="<?php echo e($list->prd_pcs_per_ctn); ?>">
                                    <?php if($column_list['erp-field-brand_name']['view'] ?? 0) { ?>
                                        <input type="hidden" class="erp-field-brand_name" value="<?php echo e($list->conli_cust_id); ?>" >
                                        <td> <input class="form-control erp-field-bname erp-input" value="<?php echo e($list->product ? $list->product->brand_name : ''); ?>" disabled /> </td>
                                    <?php } ?>
                                    <?php if($column_list['erp-field-prd_supplier_item']['view'] ?? 0) { ?>
                                        <td> <input class="form-control erp-field-prd_supplier_item erp-input" value="<?php echo e($list->product ? $list->product->prd_supplier_item : ''); ?>" disabled /> </td>
                                    <?php } ?>
                                    <?php if($column_list['erp-field-prd_description']['view'] ?? 0) { ?>
                                        <td> <input class="form-control erp-field-prd_description erp-input" value="<?php echo e($list->product ? $list->product->prd_description : ''); ?>" disabled /> </td>
                                    <?php } ?>
                                    <?php if($column_list['erp-field-prd_barcode']['view'] ?? 0) { ?>
                                        <td> <input class="form-control erp-field-prd_barcode erp-input" value="<?php echo e($list->product ? $list->product->prd_barcode : ''); ?>" disabled /> </td>
                                    <?php } ?>
                                    <?php if($column_list['erp-field-prd_hs_code']['view'] ?? 0) { ?>
                                        <td> <input class="form-control erp-field-prd_hs_code erp-input" value="<?php echo e($list->product ? $list->product->prd_hs_code : ''); ?>" disabled /> </td>
                                    <?php } ?>
                                    <?php if($column_list['erp-field-pili_qty']['view'] ?? 0) { ?>
                                        <td><input class="form-control erp-field-conli_qty erp-input pi-text" value="<?php echo e($list->product ? ($list->product->prd_pcs_per_ctn * $list->conli_total_pkg) : 0); ?>" disabled /></td>
                                    <?php } ?>
                                    <?php if($column_list['erp-field-ttl_pkg']['view'] ?? 0) { ?>
                                        <td><input class="form-control erp-field-ttl_pkg erp-input pi-text" value="<?php echo e($list->conli_total_pkg ?? 0); ?>" /></td>
                                    <?php } ?>
                                    <?php $gwt =  $list->conli_total_pkg * ($list->product ? $list->product->prd_gw_ctn : 0); ?>
                                    <?php if($column_list['erp-field-gwt']['view'] ?? 0) { ?>
                                        <td><input class="form-control erp-field-gwt erp-input pi-text" value="<?php echo e($gwt ?? 0); ?>" disabled /></td>
                                    <?php } ?>
                                    <?php $nwt = $gwt-(($list->product ? $list->product->prd_ctn_wt : 0) * $list->conli_total_pkg); ?>
                                    <?php if($column_list['erp-field-nwt']['view'] ?? 0) { ?>
                                        <td> <input class="form-control erp-field-nwt erp-input pi-text" value="<?php echo e($nwt ?? 0); ?>" disabled /> </td>
                                    <?php } ?>
                                    <?php $vol = $list->conli_total_pkg * ($list->product ? $list->product->prd_cbm_ctn : 0 ); ?>
                                    <?php if($column_list['erp-field-volume']['view'] ?? 0) { ?>
                                        <td> <input class="form-control erp-field-volume erp-input pi-text" value="<?php echo e($vol ?? 0); ?>" disabled /> </td>
                                    <?php } ?>
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
<a href="<?php echo e(route('consignment-index')); ?>" class="btn btn-outline-primary ml-2 float-right">Cancel</a>
<div class="btn-group dropdown float-right">
    <button type="submit" class="btn btn-outline-primary erp-con-edit-form">
        Save
    </button>
    <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split _r_drop_right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="sr-only">Toggle Dropdown</span>
    </button>
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
    <?php echo $__env->make('pages.consignment.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('pages.common.modal-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/pages/consignment/edit.blade.php ENDPATH**/ ?>