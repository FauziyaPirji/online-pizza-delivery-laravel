<!DOCTYPE html>
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
        <!-- Category container starts here -->
        <div class="container my-3 mb-5">
            <div class="col-lg-2 text-center my-3" style="margin:auto;border-top: 2px groove black;border-bottom: 2px groove black;">     
                <h2 class="text-center">Menu </h2>
            </div>
            <form method="GET" action="<?php echo e(route('menu')); ?>" class="mb-4 flex gap-2">
    
            <select name="category" class="px-3 py-1 border rounded">
                <option value="">All Categories</option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($cat->id); ?>" <?php echo e(request('category') == $cat->id ? 'selected' : ''); ?>>
                        <?php echo e($cat->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

            <button type="submit" class="btn px-4 py-1 rounded btn-primary">Filter</button>
        </form>
            <div class="row">
            <!-- Fetch all the categories and use a loop to iterate through categories -->
            <?php $__currentLoopData = $Categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    <div class="card" style="width: 18rem;">
                        <img src="<?php echo e(asset('storage/'. $categorie->image)); ?>" class="card-img-top" alt="image for this category" width="249px" height="270px">
                        <div class="card-body">
                            <h5 class="card-title text-dark"><a href="<?php echo e(route('category.pizzas', $categorie->id)); ?>"><?php echo e($categorie->name); ?></a></h5>
                            <p class="card-text text-dark"><?php echo e(\Illuminate\Support\str::limit($categorie->description,$limit = 30,$end = "...")); ?></p>
                            <a href="<?php echo e(route('category.pizzas', $categorie->id)); ?>" class="btn btn-primary">View All</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </body>
</html>
<?php /**PATH C:\A\pizza_website\resources\views/menu.blade.php ENDPATH**/ ?>