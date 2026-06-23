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

        <div>&nbsp;
            <a href="/menu" class="active text-light">
                <i class="fas fa-qrcode"></i>
                <span>All Category</span>
            </a>
        </div>

        <!-- Pizza container starts here -->
        <div class="container my-3" id="cont">
            <div class="col-lg-4 text-center my-3" style="margin:auto;border-top: 2px groove black;border-bottom: 2px groove black;">     
                <h2 class="text-center"><span id="catTitle">Items</span></h2>
            </div>
            <form method="GET" action="<?php echo e(route('category.pizzas_filter', $category->id)); ?>" class="mb-4 flex gap-2">
                <select name="sort" class="px-3 py-1 border rounded">
                    <option value="">Sort by</option>
                    <option value="asc" <?php echo e(request('sort') == 'asc' ? 'selected' : ''); ?>>Price Low to High</option>
                    <option value="desc" <?php echo e(request('sort') == 'desc' ? 'selected' : ''); ?>>Price High to Low</option>
                </select>

                <button type="submit" class="btn px-3 py-1 rounded btn-primary">Filter</button>
            </form>
            <div class="row text-dark">
                <?php if($pizzas->isEmpty()): ?>
                    <div class="jumbotron jumbotron-fluid text-dark">
                        <div class="container">
                            <p class="display-4">Sorry In this category No items available.</p>
                            <p class="lead"> We will update Soon.</p>
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
                                        <form action="<?php echo e(route('cart.add', $pizza->pizzaId)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="itemId" value="<?php echo e($pizza->pizzaId); ?>">
                                            <input type="hidden" name="userId" value="<?php echo e(Auth::user()->id); ?>">
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
</html><?php /**PATH C:\New\pizza_website\resources\views/item.blade.php ENDPATH**/ ?>