<!DOCTYPE html>
<html lang="en">
    <head>
        <title>User Profile</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel = "icon" href ="<?php echo e(asset('assets/images/logo.jpg')); ?>" type = "image/x-icon">
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
    </head>
    <body>
        <?php echo $__env->make('view.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="container mt-5">
        <div class="card mx-auto" style="max-width: 500px;">
            <div class="card-header text-white text-center" style="background-color: rgb(111 202 203);">
                <h3>User Profile</h3>
            </div>
            <div class="card-body text-center text-dark">
                <!-- User Profile Picture -->
                <img src="<?php echo e(asset('/storage/'. $user->file_name)); ?>" class="rounded-circle mb-3" width="150" height="150" alt="Profile Picture">
                
                <h4><?php echo e($user->f_name); ?> <?php echo e($user->m_name); ?> <?php echo e($user->l_name); ?></h4>
                <p class="text-muted"><?php echo e($user->email); ?></p>

                <hr>
                
                <p><strong>Date of Birth:</strong> <?php echo e($user->dob); ?></p>
                <p><strong>Phone:</strong> <?php echo e($user->phone); ?></p>

                <a href="<?php echo e(route('user.profile.edit')); ?>" class="btn btn-lg btn-primary btn-block">Edit Profile</a>
            </div>
        </div>
    </div>
    </body>
</html>

<?php /**PATH C:\A\pizza_website\resources\views/profile.blade.php ENDPATH**/ ?>