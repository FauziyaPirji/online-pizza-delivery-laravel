<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Orders</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel = "icon" href ="<?php echo e(asset('assets/images/logo.jpg')); ?>" type = "image/x-icon">
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
        <style>
            .table-title {
                color: #fff;
                background: #4b5366;		
                padding: 16px 25px;
                margin-top:10px;
            }
            table.table tr th, table.table tr td {
                border-color: #e9e9e9;
                padding: 12px 15px;
                vertical-align: middle;
                color:white;
            }
            table.table tr th:first-child {
                width: 60px; 
            }
        </style>
    </head>
    <body>
        <?php echo $__env->make('view.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="container d-flex justify-content-center align-items-center min-vh-100">
            <div class="card shadow-lg p-4" style="max-width: 600px; width: 100%; border-radius: 20px;">
                <div class="text-center">
                    <div class="checkmark-container">
                        <img src="<?php echo e(asset('assets/images/check.png')); ?>" width="72" height="72" fill="green" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    </div>

                    <h2 class="mt-4 text-success">Order Placed Successfully!</h2>

                    <?php if(session('message')): ?>
                        <p class="lead mt-3"><?php echo e(session('message')); ?></p>
                    <?php endif; ?>

                    <div class="mt-4">
                        <a href="/home" class="btn btn-outline-primary px-4">
                            <i class="bi bi-house-door-fill"></i> Back to Home
                        </a>
                        <a href="/orders" class="btn btn-primary px-4">
                            <i class="bi bi-receipt"></i> View Orders
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html><?php /**PATH D:\College\Sem-4\Laravel project\pizza_website\resources\views/success.blade.php ENDPATH**/ ?>