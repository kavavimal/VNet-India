
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
<div class="breadcrumb">
    <div class="col-sm-12 col-md-12">
        <h4> <a href="<?php echo e(route('dashboard')); ?>">ERP</a> | <a href="<?php echo e(route('user-index')); ?>">User</a> | User <?php echo e($user ? 'Edit: '.$user->id : 'New'); ?> </a>
        <a href="<?php echo e(route('user-index')); ?>" class="btn btn-outline-primary ml-2 float-right">Cancel</a>
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
<h4 class="heading-color">User</h4>
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-body">
                <?php if($user): ?>
                    <form class="erp-user-submit" data-url="<?php echo e(route('user-store')); ?>" data-id="uid" data-name="name" data-email="email" data-pass="password">
                        <input type="hidden" id="erp-id" class="erp-id" value="<?php echo e($user->id); ?>" name="uid" />
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="fname">First Name</label>
                                <input placeholder="Enter First Name" class="form-control" id="fname" name="fname" type="text" value="<?php echo e($user->fname); ?>">
                                <div class="error" style="color:red;" id="fname_error"></div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="lname">Last Name</label>
                                <input placeholder="Enter Last Name" class="form-control" id="lname" name="lname" type="text" value="<?php echo e($user->lname); ?>">
                                <div class="error" style="color:red;" id="lname_error"></div>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="email">Email</label>
                                <input placeholder="Enter Email Address" class="form-control" id="email" name="email" type="text" value="<?php echo e($user->email); ?>" readonly>
                                <div class="error" style="color:red;" id="email_error"></div>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="roles">Role</label>
                                <select class="form-control" id="roles" name="roles[]">
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($role); ?>"> <?php echo e($role); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                </select>
                                <div class="error" style="color:red;" id="roles_error"></div>
                            </div>
                            <div class="col-md-12 form-group">
                                <label>User Status</label>
                                <input class="status" name="status" type="radio" value="1" <?php if($user->status == 1){echo 'checked="checked"';} ?>> Enable
                                <input class="status" name="status" type="radio" value="0" <?php if($user->status == 0){echo 'checked="checked"';} ?>> Disable
                            </div>
                        </div>
                    </form>
                <?php else: ?>
                <form class="erp-user-submit" data-url="<?php echo e(route('user-store')); ?>" data-id="uid" data-name="name" data-email="email" data-pass="password">
                    <input type="hidden" id="erp-id" class="erp-id" name="uid" value="0" />
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="fname">First Name</label>
                            <?php echo Form::text('fname', null, array('placeholder' => 'Enter First Name','class' => 'form-control' , 'id' => 'fname')); ?>

                            <div class="error" style="color:red;" id="fname_error"></div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="lname">Last Name</label>
                            <?php echo Form::text('lname', null, array('placeholder' => 'Enter Last Name','class' => 'form-control' , 'id' => 'lname')); ?>

                            <div class="error" style="color:red;" id="lname_error"></div>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="email">Email</label>
                            <?php echo Form::text('email', null, array('placeholder' => 'Enter Email Address','class' => 'form-control' , 'id' => 'email')); ?>

                            <div class="error" style="color:red;" id="email_error"></div>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="roles">Role</label>
                            <?php echo Form::select('roles[]', $roles,[], array('class' => 'form-control', 'id' => 'roles')); ?>

                            <div class="error" style="color:red;" id="roles_error"></div>
                        </div>                        
                        <div class="col-md-12 form-group">
                            <label for="password">Password</label>
                            <?php echo Form::password('password', array('placeholder' => 'Enter Password','class' => 'form-control', 'id' => 'password')); ?>

                            <div class="error" style="color:red;" id="password_error"></div>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <?php echo Form::password('confirm_password', array('placeholder' => 'Enter Confirm Password','class' => 'form-control' , 'id' => 'confirm_password')); ?>

                            <div class="error" style="color:red;" id="confirm_password_error"></div>
                        </div>
                        <div class="col-md-12 form-group">
                            <label>User Status</label>
                            <input class="status" name="status" checked="checked" type="radio" value="1"> Enable
                            <input class="status" name="status" type="radio" value="0"> Disable
                        </div>
                    </div>
                </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<a href="<?php echo e(route('user-index')); ?>" class="btn btn-outline-primary ml-2 float-right">Cancel</a>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-js'); ?>
<script src="<?php echo e(asset('assets/js/carousel.script.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('bottom-js'); ?>
    <?php echo $__env->make('pages.common.modal-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/pages/user/edit.blade.php ENDPATH**/ ?>