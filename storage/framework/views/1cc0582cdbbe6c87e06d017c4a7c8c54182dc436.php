<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin Trash</title>
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
                            <h2>Admin Trash <b>Details</b></h2>
                        </div>
                        <div class="col">
                            <form action="<?php echo e(route('admin_admin_list')); ?>" method="get">
                                <button class="btn btn-primary float-right btn-sm">Back to all admin</button>
                            </form>
                        </div>
                    </div>
                </div>
                
                <table class="table table-striped table-hover table-center table-responsive-md" id="NoOrder">
                    <thead style="background-color: rgb(111 202 203);">
                        <tr>
                            <th>User Id</th>
                            <th style="width:7%;">Photo</th>
                            <th>Name</th>
                            <th>Email</th>						
                            <th>Phone No.</th>
                            <th>Join Date</th>
                            <th>Action</th>						
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($user->id); ?></td>
                                <td><img src="<?php echo e(asset('/storage/'. $user->file_name)); ?>" alt="image for this user" width="100px" height="100px"></td>
                                <td>
                                    <p>First Name : <b><?php echo e($user->f_name); ?></b></p>
                                    <p>Middle Name : <b><?php echo e($user->m_name); ?></b></p>
                                    <p>Last Name : <b><?php echo e($user->l_name); ?></b></p>
                                </td>
                                <td><?php echo e($user->email); ?></td>
                                <td><?php echo e($user->phone); ?></td>
                                <td><?php echo e($user->created_at); ?></td>
                                <td>
                                <a href="<?php echo e(route('admin.permanentDelete', ['id' => $user->id])); ?>"><button class="btn btn-sm btn-danger" style="margin-left:35px;margin-top:4px;">Delete</button></a>
                                <a href="<?php echo e(route('admin.restore', ['id' => $user->id])); ?>"><button class="btn btn-sm btn-primary" style="margin-left:35px;margin-top:4px;">Restore</button></a>
                                    <!-- <form action="#" method="POST"> -->
                                        <!-- <button name="removeUser" class="btn btn-sm btn-danger" style="margin-left:35px;margin-top:4px;">Trash</button> -->
                                        <!-- <input type="hidden" name="Id" value="'.$id. '"> -->
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
</html>
<?php /**PATH C:\New\pizza_website\resources\views/admin/admin-trash.blade.php ENDPATH**/ ?>