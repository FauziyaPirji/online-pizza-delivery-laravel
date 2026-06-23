<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Category List</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel = "icon" href ="<?php echo e(asset('assets/images/logo.jpg')); ?>" type = "image/x-icon">
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
    </head>
    <body>
        <?php echo $__env->make('admin.view.admin_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="container-fluid" style="margin-top:98px">
            <div class="form-row d-flex" style="margin-right:10px">
                <div class="col">
                    <form action="<?php echo e(route('categorie.trash')); ?>" method="get">
                        <button class="btn btn-primary float-right btn-sm">Go to trash categories</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row">
                <!-- FORM Panel -->
                    <div class="col-md-4">
                        <form action="<?php echo e(route('admin_categories_list')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="card text-dark">
                                <div class="card-header" style="background-color: rgb(111 202 203);">
                                    Create New Category
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="control-label">Category Name: </label>
                                        <input type="text" class="form-control" name="name" id="name" required>
                                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Category Desc: </label>
                                        <input type="text" class="form-control" name="description" id="description" required>
                                            <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                    </div>
                                    <div class="form-group">
                                        <label for="image" class="control-label">Image:</label>
                                        <input type="file" name="image" id="image" accept=".png,,jpeg,.jpg" class="form-control" required style="border:none;">
                                        <small id="Info" class="form-text text-muted mx-3">Please .png,.jpeg,.jpg file upload.</small>
                                            <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                 <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>  
                                </div>  
                                <button type="submit" name="submit" id="submit" class="btn btn-lg btn-primary btn-block"> Create </button>
                            </div>
                        </form>
                    </div>
                <!-- FORM Panel -->
                <!-- Table Panel -->
                    <div class="col-md-8 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered table-hover mb-0">
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
                                        <?php $__currentLoopData = $Categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($categorie->id); ?></td>
                                                <td><img src="<?php echo e(asset('/storage/'. $categorie->image)); ?>" class="card-img-top" alt="image for this category" width="100px" height="100px"></td>
                                                <td><?php echo e($categorie->name); ?></td>
                                                <td><?php echo e($categorie->description); ?></td>
                                                <td>
                                                    <button class="btn btn-primary btn-sm" style="margin-left:35px;" data-toggle="modal" data-target="#editModal<?php echo e($categorie->id); ?>">Edit</button> 
                                                    <!-- <a href="#" class="btn btn-danger btn-sm">Delete</a>  -->
                                                    <form action="<?php echo e(route('categorie.delete', ['id' => $categorie->id])); ?>" method="get">
                                                        <button name="removeCategorie" class="btn btn-sm btn-danger" style="margin-left:35px;margin-top:4px;">Trash</button>
                                                    </form>
                                                </td>
                                                <!-- Modal -->
                                                <div class="modal fade text-dark" id="editModal<?php echo e($categorie->id); ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true" style="width: -webkit-fill-available;">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header" style="background-color: rgb(111 202 203);">
                                                                <h5 class="modal-title" id="editModal<?php echo e($categorie->id); ?>">Category Id: <b><?php echo e($categorie->id); ?></b></h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?php echo e(route('categories.update', $categorie->id)); ?>" method="post" enctype="multipart/form-data">
                                                                    <?php echo csrf_field(); ?>
                                                                    <div class="form-group row my-0">
                                                                        <div class="form-group col-md-6">
                                                                            <b><label for="image">Upload Photo:</label></b>
                                                                            <input type="file" name="image" id="image">

                                                                            <?php if($categorie->image): ?>
                                                                                <img src="<?php echo e(asset('/storage/'. $categorie->image)); ?>" width="100">
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="text-left my-2">
                                                                        <b><label for="name">Name</label></b>
                                                                        <input class="form-control" id="name" name="name" value="<?php echo e($categorie->name); ?>" type="text" required>
                                                                    </div>
                                                                    <div class="text-left my-2">
                                                                        <b><label for="desc">Description</label></b>
                                                                        <textarea class="form-control" id="description" name="description" rows="2" required><?php echo e($categorie->description); ?></textarea>
                                                                    </div>
                                                                    <button type="submit" class="btn btn-success" name="updateCategory">Update</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html><?php /**PATH D:\College\Sem-4\Laravel project\pizza_website\resources\views/admin/admin_categories_list.blade.php ENDPATH**/ ?>