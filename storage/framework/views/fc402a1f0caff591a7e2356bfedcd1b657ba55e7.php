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
        <?php echo $__env->make('admin.view.admin_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		<div class="container-md card bg-body-tertiary" style="margin-top:98px;background: aliceblue;">
            <div class="table-wrapper">
                <div class="table-title card bg-body-tertiary">
                    <div class="form-row d-flex">
                        <div class="col-sm-4">
                            <h2>Categorie Trash <b>Details</b></h2>
                        </div>
                        <div class="col">
                            <form action="<?php echo e(route('admin_item_list')); ?>" method="get">
                                <button class="btn btn-primary float-right btn-sm">Back to all items</button>
                            </form>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover table-center table-responsive-md" id="NoOrder">
                    <thead style="background-color: rgb(111 202 203);">
                        <tr>
                            <th class="text-center" style="width:3%;">Cat. Id</th>
                            <th class="text-center">Img</th>
							<th class="text-center" style="width:15px;">Item Name</th>
                            <th class="text-center" style="width:50%;">Item Detail</th>
                            <th class="text-center" style="width:18%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $pizzas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pizza): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($pizza->pizzaCategorieId); ?></td>
								<td><img src="<?php echo e(asset('/storage/'. $pizza->pizzaPhoto)); ?>" class="card-img-top" alt="image for this item" width="100px" height="100px"></td>
								<td><?php echo e($pizza->pizzaName); ?></td>
								<td><?php echo e($pizza->pizzaDesc); ?> <br> <b>price :</b> <?php echo e($pizza->pizzaPrice); ?></td>
								<td>
                                    <a href="<?php echo e(route('item.permanentDelete', ['id' => $pizza->pizzaId])); ?>"><button class="btn btn-sm btn-danger" style="margin-left:35px;margin-top:4px;">Delete</button></a>
                                    <a href="<?php echo e(route('item.restore', ['id' => $pizza->pizzaId])); ?>"><button class="btn btn-sm btn-primary" style="margin-left:35px;margin-top:4px;">Restore</button></a> 
								</td>
							</tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
        <style>
            .table-title {
                color: #fff;
                background: #4b5366;		
                padding: 16px 25px;
                margin: -20px -25px 10px; 
                border-radius: 3px 3px 0 0;
            }
        </style>
	</body>
</html>
<?php /**PATH C:\New\pizza_website\resources\views/admin/item-trash.blade.php ENDPATH**/ ?>