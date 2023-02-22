
<?php $__env->startSection('page-css'); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
<style>
    .form-group label {
        width: 100%;
    }
    .select2-container {
       width: 150px;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
<form class="form-horizontal" method="POST" action="<?php echo e(route('changePasswordPost')); ?>">
    <?php $user = auth()->user();?>
    <div class="breadcrumb">
        <div class="col-sm-12 col-md-12">
            <h4> <a href="<?php echo e(route('dashboard')); ?>">ERP</a> | <a href="<?php echo e(route('profile-settings',$user['id'])); ?>">Profile Settings</a> | Password Update </a>
            <a href="<?php echo e(route('profile-settings',$user['id'])); ?>" class="btn btn-outline-primary ml-2 float-right">Cancel</a>
            <div class="btn-group dropdown float-right">
                <button type="submit" class="btn btn-outline-primary erp-user-form">
                    Save
                </button>
                <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split _r_drop_right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu" x-placement="right-start">
                    <a class="dropdown-item" href="#">Action</a>
                </div>
            </div>
        </div>
    </div>
    <h4 class="heading-color">Change password</h4>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <?php if(session('error')): ?>
                        <div class="alert alert-danger">
                            <?php echo e(session('error')); ?>

                        </div>
                    <?php endif; ?>
                    <?php if(session('success')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>
                    <?php if($errors): ?>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="alert alert-danger"><?php echo e($error); ?></div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    <?php echo e(csrf_field()); ?>

                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="fname">Current Password</label>
                            <input id="current-password" type="password" class="form-control" name="current-password" required>
                            <?php if($errors->has('current-password')): ?>
                                <div class="error" style="color:red;">
                                    <?php echo e($errors->first('current-password')); ?>

                                </div>    
                            <?php endif; ?>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="lname">New Password</label>
                            <input id="new-password" type="password" class="form-control" name="new-password" required>
                            <?php if($errors->has('new-password')): ?>
                                <div class="error" style="color:red;" >
                                    <?php echo e($errors->first('new-password')); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="lname">Confirm New Password</label>
                            <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <a href="<?php echo e(route('profile-settings',$user['id'])); ?>" class="btn btn-outline-primary ml-2 float-right">Cancel</a>
    <div class="btn-group dropdown float-right">
        <button type="submit" class="btn btn-outline-primary profile_settings_form">
            Save
        </button>
        <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split _r_drop_right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="sr-only">Toggle Dropdown</span>
        </button>
        <div class="dropdown-menu" x-placement="right-start">
            <a class="dropdown-item" href="#">Action</a>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('page-js'); ?>
    <script src="<?php echo e(asset('assets/js/carousel.script.js')); ?>"></script>
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('bottom-js'); ?>
        <?php echo $__env->make('pages.common.modal-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopSection(); ?>
</form>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/auth/passwords/change-password.blade.php ENDPATH**/ ?>