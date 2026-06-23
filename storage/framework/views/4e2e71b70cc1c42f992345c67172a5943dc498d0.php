<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Category Trash</title>
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
                            <form action="<?php echo e(route('admin_categories_list')); ?>" method="get">
                                <button class="btn btn-primary float-right btn-sm">Back to all categories</button>
                            </form>
                        </div>
                    </div>
                </div>
                
                <table class="table table-striped table-hover table-center table-responsive-md" id="NoOrder">
                    <thead style="background-color: rgb(111 202 203);">
                        <tr>
                            <th class="text-center" style="width:3%;">Id</th>
                            <th class="text-center">Img</th>
                            <th class="text-center" style="width:15%;">Category Name</th>
                            <th class="text-center" style="width:50%;">Category description</th>
                            <th class="text-center" style="width:18%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($categorie->id); ?></td>
                            <td><img src="<?php echo e(asset('/storage/'. $categorie->image)); ?>" class="card-img-top" alt="image for this category" width="100px" height="100px"></td>
                            <td><?php echo e($categorie->name); ?></td>
                            <td><?php echo e($categorie->description); ?></td>
                            <td>
                                <a href="<?php echo e(route('categorie.permanentDelete', ['id' => $categorie->id])); ?>"><button class="btn btn-sm btn-danger" style="margin-left:35px;margin-top:4px;">Delete</button></a>
                                <a href="<?php echo e(route('categorie.restore', ['id' => $categorie->id])); ?>"><button class="btn btn-sm btn-primary" style="margin-left:35px;margin-top:4px;">Restore</button></a>
                                <!-- <button class="btn btn-primary btn-sm" style="margin-left:35px;" data-toggle="modal" data-target="#editModal<?php echo e($categorie->id); ?>">Edit</button>  -->
                                <!-- <a href="#" class="btn btn-danger btn-sm">Delete</a>  -->
                                <!-- <form action="<?php echo e(route('categorie.delete', ['id' => $categorie->id])); ?>" method="get"> -->
                                    <!-- <button name="removeCategorie" class="btn btn-sm btn-danger" style="margin-left:35px;margin-top:4px;">Trash</button> -->
                                <!-- </form> -->
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
</html><?php /**PATH C:\New\pizza_website\resources\views/admin/categories-trash.blade.php ENDPATH**/ ?>