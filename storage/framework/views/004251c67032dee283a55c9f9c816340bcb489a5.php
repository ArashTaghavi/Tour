<?php $__env->startSection('content'); ?>

<div class="container">
    <form method="POST" class="appointment-form" id="appointment-form" action="<?php echo e(route('doLogin')); ?>">
        <h2>Login</h2>
        <?php echo csrf_field(); ?>
        <div class="form-group-1">
            <input type="text" name="email" id="email" placeholder="Email..." autocomplete="off"/>
        </div>
        <div class="form-group-1">
            <input type="password" name="password" id="password" placeholder="Password..." autocomplete="off"/>
        </div>
        <div class="form-submit">
            <button type="submit" name="submit" id="submit" class="submit">Login</button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hotel\resources\views/auth/login.blade.php ENDPATH**/ ?>