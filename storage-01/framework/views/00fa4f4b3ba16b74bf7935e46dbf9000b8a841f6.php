<!-- ============ Customizer ============= -->
<div class="customizer">
    
    <div class="customizer-body" data-perfect-scrollbar data-suppress-scroll-x="true">
        <div class="accordion" id="accordionCustomizer">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <p class="mb-0">
                        Sidebar Layout
                    </p>
                </div>

                

    <div class="card-body">
        <div class="layouts">

            <!---->
            <div class="layout-box mb-4 <?php echo e(Session::get('layout') == 'compact' ? 'active' : ''); ?>">
                <a href="<?php echo e(route('compact')); ?>">
                    <img alt="" src="<?php echo e(asset('assets/images/screenshots/02_preview.png')); ?>" /><i class="i-Eye"></i>
                </a>
            </div>
            <div
                class="layout-box mb-4 <?php echo e(Session::get('layout') == 'normal' || Session::get('layout') == ''  ? 'active' : ''); ?>">
                <a href="<?php echo e(route('normal')); ?>">
                    <img alt="" src="<?php echo e(asset('assets/images/screenshots/04_preview.png')); ?>" /><i class="i-Eye"></i>
                </a>
            </div>
            <div class="layout-box mb-4 <?php echo e(Session::get('layout') == 'horizontal'   ? 'active' : ''); ?>">
                <a href="<?php echo e(route('horizontal')); ?>">
                    <img alt="" src="<?php echo e(asset('assets/images/screenshots/horizontal.png')); ?>" /><i class="i-Eye"></i>
                </a>
            </div>
            <div class="layout-box mb-4 mt-30 <?php echo e(Session::get('layout') == 'vertical' ? 'active' : ''); ?>">
                <a href="<?php echo e(route('vertical')); ?>">
                    <span class="badge badge-danger p-1">New</span>

                    <img alt="" src="<?php echo e(asset('assets/images/screenshots/verticallayout.png')); ?>" />

                    <i class="i-Eye"></i>
                </a>
            </div>
        </div>
        <div class="text-center pt-3">More layouts coming...</div>
    </div>
    <div class="card <?php echo e(Session::get('layout')=='compact'?'d-block':'d-none'); ?>">
        <div class="card-header" id="headingOne">
            <p class="mb-0">
                Sidebar Colors
            </p>
        </div>

        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionCustomizer">
            <div class="card-body">
                <div class="colors sidebar-colors">
                    <a class="color gradient-purple-indigo" data-sidebar-class="sidebar-gradient-purple-indigo">
                        <i class="i-Eye"></i>
                    </a>
                    <a class="color gradient-black-blue" data-sidebar-class="sidebar-gradient-black-blue">
                        <i class="i-Eye"></i>
                    </a>
                    <a class="color gradient-black-gray" data-sidebar-class="sidebar-gradient-black-gray">
                        <i class="i-Eye"></i>
                    </a>
                    <a class="color gradient-steel-gray" data-sidebar-class="sidebar-gradient-steel-gray">
                        <i class="i-Eye"></i>
                    </a>
                    <a class="color dark-purple active" data-sidebar-class="sidebar-dark-purple">
                        <i class="i-Eye"></i>
                    </a>
                    <a class="color slate-gray" data-sidebar-class="sidebar-slate-gray">
                        <i class="i-Eye"></i>
                    </a>
                    <a class="color midnight-blue" data-sidebar-class="sidebar-midnight-blue">
                        <i class="i-Eye"></i>
                    </a>
                    <a class="color blue" data-sidebar-class="sidebar-blue">
                        <i class="i-Eye"></i>
                    </a>
                    <a class="color indigo" data-sidebar-class="sidebar-indigo">
                        <i class="i-Eye"></i>
                    </a>
                    <a class="color pink" data-sidebar-class="sidebar-pink">
                        <i class="i-Eye"></i>
                    </a>
                    <a class="color red" data-sidebar-class="sidebar-red">
                        <i class="i-Eye"></i>
                    </a>
                    <a class="color purple" data-sidebar-class="sidebar-purple">
                        <i class="i-Eye"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header" id="headingTwo">
        <p class="mb-0">
            RTL
        </p>
    </div>

    <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionCustomizer">
        <div class="card-body">
            <label class="checkbox checkbox-primary">
                <input type="checkbox" id="rtl-checkbox">
                <span>Enable RTL</span>
                <span class="checkmark"></span>
            </label>
        </div>
    </div>
</div>


<div class="card">
    <div class="card-header" id="headingTwo">
        <p class="mb-0">
            Dark Version
        </p>
    </div>

    <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionCustomizer">
        <div class="card-body">
            <label class="checkbox checkbox-primary">
                <input type="checkbox" id="dark-checkbox">
                <span>Enable Dark Mode</span>
                <span class="checkmark"></span>
            </label>
        </div>
    </div>
</div>


</div>
</div>
</div>
<!-- ============ End Customizer ============= -->
<?php /**PATH C:\xampp\htdocs\erp\resources\views/layouts/common/customizer.blade.php ENDPATH**/ ?>