<?php $__env->startComponent('mail::message'); ?>
    # <?php echo e($mailData['title']); ?>

    use below credentials for the login into ERP
    email: <?php echo e($mailData['email']); ?>

    password: <?php echo e($mailData['password']); ?>

<?php $__env->startComponent('mail::button', ['url' => $mailData['url']]); ?>
    Click here to login
<?php echo $__env->renderComponent(); ?>
Thanks,<br>
    <?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views/Email/sendEmail.blade.php ENDPATH**/ ?>