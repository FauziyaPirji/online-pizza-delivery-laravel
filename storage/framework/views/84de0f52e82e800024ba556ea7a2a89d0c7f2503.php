<!doctype html>
<html lang="en">
    <head>
        <title>Menu</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link rel = "icon" href ="<?php echo e(asset('assets/images/logo.jpg')); ?>" type = "image/x-icon">
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
    </head>
<body>
    <?php echo $__env->make('view.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container my-4 text-dark" id="cont">
        <div class="row jumbotron">
            <div class="col-md-4">
                <img src="<?php echo e(asset('/storage/'. $pizza->pizzaPhoto)); ?>" width="249px" height="262px">
            </div> 
            <div class="col-md-8 my-4">
                <h3><?php echo e($pizza->pizzaName); ?></h3>
                <h5 style="color: #ff0000">Rs. <?php echo e($pizza->pizzaPrice); ?>/-</h5>
                <p class="mb-0"><?php echo e($pizza->pizzaDesc); ?></p>
                <form>
                    <a href="#"><button class="btn btn-primary my-2">Go to Cart</button></a>
                </form>
                <h6 class="my-1"> View </h6>
                <div class="mx-4">
                    <a href="<?php echo e(route('category.pizzas', $pizza->pizzaCategorieId)); ?>" class="active text-dark">
                    <i class="fas fa-qrcode"></i>
                        <span>All Pizza</span>
                    </a>
                </div>
                <div class="mx-4">
                    <a href="/menu" class="active text-dark">
                    <i class="fas fa-qrcode"></i>
                        <span>All Category</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html><?php /**PATH D:\College\Sem-4\Laravel project\pizza_website\resources\views/viewPizza.blade.php ENDPATH**/ ?>