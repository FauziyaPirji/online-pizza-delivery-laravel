<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Home</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel = "icon" href ="<?php echo e(asset('assets/images/logo.jpg')); ?>" type = "image/x-icon">
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
        <style>
            #myVideo{
                position:fixed;
                top:100px;
                right:0;
                bottom:0;
                min-width:100%;
                min-height:100%;
                opacity:60%;
            }
        </style>
    </head>
    <body>
        <?php echo $__env->make('view.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <video autoplay muted loop id="myVideo">
			<source src="<?php echo e(asset('assets/images/pizza.mp4')); ?>" type="video/mp4">
		</video>
        <div class="text-center">
		    <h1>Pizza House</h1> 
		    <h3>Just take a bite and your heart will says Ummm Yummm!!!</h3>
        </div>
        <?php echo $__env->make('view.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </body>
</html>
<?php /**PATH D:\College\Sem-4\Laravel project\pizza_website\resources\views/home.blade.php ENDPATH**/ ?>