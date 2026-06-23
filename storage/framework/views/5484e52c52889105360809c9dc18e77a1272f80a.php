<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Home</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel = "icon" href ="<?php echo e(asset('assets/images/logo.jpg')); ?>" type = "image/x-icon">
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
    </head>
    <body>
        <?php echo $__env->make('admin.view.admin_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert" style="width:100%">
            <strong>Success!</strong> You are logged in
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
        </div>
        <?php if(auth()->guard()->check()): ?>
        <h1 style="margin-top:98px">Welcome back <b> <?php echo e(Auth::user()->f_name); ?> <?php echo e(Auth::user()->m_name); ?> </b></h1>
        <?php endif; ?>
        <script>
                $('.nav-home').addClass('active')
        </script>

    </body>
</html>
<?php /**PATH C:\New\pizza_website\resources\views/admin/admin_home.blade.php ENDPATH**/ ?>