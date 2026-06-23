<!doctype html>
<html lang="en">
    <head>
        <title>Search</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link rel = "icon" href ="<?php echo e(asset('assets/images/logo.jpg')); ?>" type = "image/x-icon">
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
    </head>
    <body>
        <?php echo $__env->make('view.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Pizza container starts here -->
        <div class="container my-3" id="cont">
            <div class="col-lg-4 text-center my-3" style="margin:auto;border-top: 2px groove black;border-bottom: 2px groove black;">     
                <h2 class="text-center"><span id="catTitle">Search</span></h2>
            </div>
            <div class="row text-dark">
                <?php if($pizzas->isEmpty()): ?>
                    <div class="jumbotron jumbotron-fluid text-dark">
                        <div class="container">
                            <p class="display-4">Sorry Not Found</p>
                            <p class="lead"></p>
                        </div>
                    </div>
                <?php else: ?>
                    <?php $__currentLoopData = $pizzas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pizza): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="card" style="width: 18rem;">
                                <img src="<?php echo e(asset('/storage/'. $pizza->pizzaPhoto)); ?>" class="card-img-top" alt="image for this pizza" width="249px" height="270px">
                                <div class="card-body">
                                    <h5 class="card-title"> <?php echo e(\Illuminate\Support\str::limit($pizza->pizzaName, $limit = 20, $end = "...")); ?></h5>
                                    <h6 style="color: #ff0000">Rs. <?php echo e($pizza->pizzaPrice); ?>/-</h6>
                                    <p class="card-text"> <?php echo e(\Illuminate\Support\str::limit($pizza->pizzaDesc, $limit = 29, $end = "...")); ?></p>   
                                    <div class="row justify-content-center">
                                        <form action="#" method="POST">
                                            <input type="hidden" name="itemId" value="">
                                            <button type="submit" name="addToCart" class="btn btn-primary mx-2">Add to Cart</button>       
                                        </form>                            
                                        <a href="<?php echo e(route('viewPizza', $pizza->pizzaId)); ?>" class="mx-2"><button class="btn btn-primary">Quick View</button></a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>  
            </div>
        </div>
    </body>
</html><?php /**PATH C:\New\pizza_website\resources\views/search.blade.php ENDPATH**/ ?>