<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <title>ERP</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
        <?php echo $__env->yieldContent('before-css'); ?>
        
        <?php if(Session::get('layout') == 'vertical'): ?>
            <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/fontawesome-free-5.10.1-web/css/all.css')); ?>">
            <link rel="stylesheet" href="<?php echo e(asset('assets/styles/vendor/metisMenu.min.css')); ?>">
        <?php endif; ?>
        <link id="gull-theme" rel="stylesheet" href="<?php echo e(asset('assets\fonts\iconsmind\iconsmind.css')); ?>">
        <link id="gull-theme" rel="stylesheet" href="<?php echo e(asset('assets/styles/css/themes/lite-purple.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('assets/styles/vendor/perfect-scrollbar.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('assets/styles/vendor/toastr.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('assets/styles/css/custom.css')); ?>">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        
        <script>
            xui = {}; //Global xui variable
            xui.select2 = {};
        </script>
        <?php echo $__env->yieldContent('page-css'); ?>
    </head>
    <body class="text-left">
        <?php
            $layout = session('layout');
        ?>
        <!-- Pre Loader Strat  -->
        
        <!-- Pre Loader end  -->

        <!-- ============ Compact Layout start ============= -->
        <?php if($layout == 'compact'): ?>
            <?php echo $__env->make('layouts.compact-vertical-sidebar.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- ============ Compact Layout End ============= -->

        <!-- ============ Horizontal Layout start ============= -->
        <?php elseif($layout=="horizontal"): ?>
            <?php echo $__env->make('layouts.horizontal-bar.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- ============ Horizontal Layout End ============= -->

        <!-- ============ Vetical SIdebar Layout start ============= -->
        <?php elseif($layout=="vertical"): ?>
            <?php echo $__env->make('layouts.vertical-sidebar.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- ============ Vetical SIdebar Layout End ============= -->

        <!-- ============ Large SIdebar Layout start ============= -->
        <?php elseif($layout=="normal"): ?>
            <?php echo $__env->make('layouts.large-vertical-sidebar.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- ============ Large Sidebar Layout End ============= -->

        <?php else: ?>
        <!-- ============Deafult  Large SIdebar Layout start ============= -->
            <?php echo $__env->make('layouts.large-vertical-sidebar.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- ============ Large Sidebar Layout End ============= -->
        <?php endif; ?>

        <!-- ============ Search UI Start ============= -->
        
        <!-- ============ Search UI End ============= -->

        <!-- ============ Customizer UI Start ============= -->
        <?php echo $__env->make('layouts.common.customizer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- ============ Customizer UI Start ============= -->

        
        <script src="<?php echo e(asset('assets/js/common-bundle-script.js')); ?>"></script>
        
        <?php echo $__env->yieldContent('page-js'); ?>

        
        
        <script src="<?php echo e(asset('assets/js/script.js')); ?>"></script>
        <?php if($layout == 'compact'): ?>
            <script src="<?php echo e(asset('assets/js/sidebar.compact.script.js')); ?>"></script>
        <?php elseif($layout=='normal'): ?>
            <script src="<?php echo e(asset('assets/js/sidebar.large.script.js')); ?>"></script>
        <?php elseif($layout=='horizontal'): ?>
            <script src="<?php echo e(asset('assets/js/sidebar-horizontal.script.js')); ?>"></script>
        <?php elseif($layout=='vertical'): ?>
            <script src="<?php echo e(asset('assets/js/tooltip.script.js')); ?>"></script>
            <script src="<?php echo e(asset('assets/js/es5/script_2.js')); ?>"></script>
            <script src="<?php echo e(asset('assets/js/vendor/feather.min.js')); ?>"></script>
            <script src="<?php echo e(asset('assets/js/vendor/metisMenu.min.js')); ?>"></script>
            <script src="<?php echo e(asset('assets/js/layout-sidebar-vertical.js')); ?>"></script>
        <?php else: ?>
            <script src="<?php echo e(asset('assets/js/sidebar.large.script.js')); ?>"></script>
        <?php endif; ?>
            <script src="<?php echo e(asset('assets/js/customizer.script.js')); ?>"></script>
            <script src="<?php echo e(asset('assets/js/vendor/toastr.min.js')); ?>"></script>
            <script src="<?php echo e(asset('assets/js/toastr.script.js')); ?>"></script>

        
        
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {

                number = NaN;
                if (isNaN(number)) number = 0;
                
                $(".select2").select2();

                toastr.options = {
                    positionClass: "toast-bottom-left",
                    containerId: "toast-bottom-left",
                    timeOut: 3000,
                    fadeOut: 3000
                };
                <?php if(Session::has('error')): ?>
                    toastr.error('<?php echo e(Session::get('error')); ?>','<?php echo e(Session::get('title')); ?>');
                <?php elseif(Session::has('success')): ?>
                    toastr.info('<?php echo e(Session::get('success')); ?>','<?php echo e(Session::get('title')); ?>');
                <?php endif; ?>
            });
        </script>
        <?php echo $__env->yieldContent('bottom-js'); ?>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\erp\resources\views/layouts/master.blade.php ENDPATH**/ ?>