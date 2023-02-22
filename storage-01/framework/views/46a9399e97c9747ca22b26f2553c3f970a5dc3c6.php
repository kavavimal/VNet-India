<div class="side-content-wrap">
    <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <ul class="navigation-left">
            <li class="nav-item <?php echo e(request()->is('/*') ? 'active' : ''); ?>">
                <a class="nav-item-hold" href="<?php echo e(route('dashboard')); ?>">
                    <i class="nav-icon i-Bar-Chart"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
                <div class="triangle"></div>
            </li>
            
                <li class="nav-item <?php echo e(request()->is('suppliers/*') ? 'active' : ''); ?>">
                    <a class="nav-item-hold" href="<?php echo e(route('supplier-index')); ?>">
                        <i class="nav-icon i-Library"></i>
                        <span class="nav-text">Suppliers</span>
                    </a>
                    <div class="triangle"></div>
                </li>
            
            
                <li class="nav-item <?php echo e(request()->is('customer/*') ? 'active' : ''); ?>">
                    <a class="nav-item-hold" href="<?php echo e(route('customer-index')); ?>">
                        <i class="nav-icon i-Suitcase"></i>
                        <span class="nav-text">Customer</span>
                    </a>
                    <div class="triangle"></div>
                </li>
            
            
                <li class="nav-item <?php echo e(request()->is('product/*') ? 'active' : ''); ?>">
                    <a class="nav-item-hold" href="<?php echo e(route('product-index')); ?>">
                        <i class="nav-icon i-Computer-Secure"></i>
                        <span class="nav-text">Products</span>
                    </a>
                    <div class="triangle"></div>
                </li>
            
            
                <li class="nav-item <?php echo e(request()->is('proformainvoice/*') ? 'active' : ''); ?>">
                    <a class="nav-item-hold" href="<?php echo e(route('proformainvoice-index')); ?>">
                        <i class="nav-icon i-File-Clipboard-File--Text"></i>
                        <span class="nav-text">Proforma Invoice</span>
                    </a>
                    <div class="triangle"></div>
                </li>
            
            
                <li class="nav-item <?php echo e(request()->is('consignment/*') ? 'active' : ''); ?>">
                    <a class="nav-item-hold" href="<?php echo e(route('consignment-index')); ?>">
                        <i class="nav-icon i-Ship-2"></i>
                        <span class="nav-text">Consignment</span>
                    </a>
                    <div class="triangle"></div>
                </li>
            
            
                <li class="nav-item <?php echo e(request()->is('purchaseorder/*') ? 'active' : ''); ?>">
                    <a class="nav-item-hold" href="<?php echo e(route('purchaseorder-index')); ?>">
                        <i class="nav-icon i-Shopping-Cart"></i>
                        <span class="nav-text">Purchase Order</span>
                    </a>
                    <div class="triangle"></div>
                </li>
            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-tab-show')): ?>
                <li class="nav-item <?php echo e(request()->is('user/*') ? 'active' : ''); ?>">
                    <a class="nav-item-hold" href="<?php echo e(route('user-index')); ?>">
                        <i class="nav-icon i-Add-User"></i>
                        <span class="nav-text">User</span>
                    </a>
                    <div class="triangle"></div>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-tab-show')): ?>
                <li class="nav-item <?php echo e(request()->is('role/*') ? 'active' : ''); ?>">
                    <a class="nav-item-hold" href="<?php echo e(route('roles.index')); ?>">
                        <i class="nav-icon i-Double-Tap"></i>
                        <span class="nav-text">Settings</span>
                    </a>
                    <div class="triangle"></div>
                </li>
            <?php endif; ?>
        </ul>
    </div>

    <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
    </div>
    <div class="sidebar-overlay"></div>
</div>
<!--=============== Left side End ================-->
<?php /**PATH C:\xampp\htdocs\erp\resources\views/layouts/large-vertical-sidebar/sidebar.blade.php ENDPATH**/ ?>