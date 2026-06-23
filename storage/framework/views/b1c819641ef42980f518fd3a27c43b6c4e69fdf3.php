<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin</title>
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
                            <h2>Admin <b>Details</b></h2>
                        </div>
                        <div class="col">
                            <button class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#newAdmin">
                                <i class="fa fa-plus"></i> New admin
                            </button>
                        </div>
                        <div class="col">
                            <form action="<?php echo e(route('admin.trash')); ?>" method="get">
                                <button class="btn btn-primary float-right btn-sm">Go to trash admin</button>
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
                                    <button class="btn btn-sm btn-primary" style="margin-left:35px;" data-toggle="modal" data-target="#editUser<?php echo e($user->id); ?>" type="button">Edit</button><br>
                                    <!-- <a href="<?php echo e(route('admin.delete', ['id' => $user->id])); ?>"><button class="btn btn-sm btn-danger" style="margin-left:35px;margin-top:4px;">Trash</button></a> -->
                                    <form action="<?php echo e(route('admin.delete', ['id' => $user->id])); ?>" method="get">
                                        <button name="removeUser" class="btn btn-sm btn-danger" style="margin-left:35px;margin-top:4px;">Trash</button>
                                    </form>
                                </td>
                            </tr>
                            <!-- editAdmin Modal -->
                        <div class="modal fade text-dark" id="editUser<?php echo e($user->id); ?>" tabindex="-1" role="dialog" aria-labelledby="editUser<?php echo e($user->id); ?>" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: rgb(111 202 203);">
                                        <h5 class="modal-title" id="editUser<?php echo e($user->id); ?>">User Id: <b><?php echo e($user->id); ?></b></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <?php if(session('error')): ?>
                                            <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
                                        <?php endif; ?>
                                        <form action="<?php echo e(route('admin.users.update', $user->id)); ?>" method="post" enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <div class="form-group row my-0">
                                                <div class="form-group col-md-6">
                                                    <b><label for="photo">Upload Photo:</label></b>
                                                    <input type="file" name="photo" id="photo">

                                                    <?php if($user->file_name): ?>
                                                        <img src="<?php echo e(asset('/storage/'. $user->file_name)); ?>" width="100">
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <b><label for="firstName">First Name:</label></b>
                                                    <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo e($user->f_name); ?>" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <b><label for="MiddleName">Middle Name:</label></b>
                                                    <input type="text" class="form-control" id="middleName" name="middleName" value="<?php echo e($user->m_name); ?>" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <b><label for="lastName">Last name:</label></b>
                                                    <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo e($user->l_name); ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group row my-0">
                                                <div class="form-group col-md-6">
                                                    <b><label>User Type:</label></b>
                                                    <input type="text" name="usertype" class="form-control" value="<?php echo e($user->usertype); ?>" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <b><label>Date of Birth:</label></b>
                                                    <input type="date" name="dob" class="form-control" value="<?php echo e($user->dob); ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="form-group col-md-6 my-0">
                                                    <b><label for="email">Email:</label></b>
                                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo e($user->email); ?>" required>
                                                </div>
                                                <div class="form-group col-md-6 my-0">
                                                <b><label for="phone">Phone No:</label></b>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon">+91</span>
                                                        </div>
                                                        <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo e($user->phone); ?>" required pattern="[0-9]{10}" maxlength="10">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <b><label>New Password (Optional):</label></b>
                                                <input type="password" name="password" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <b><label>Confirm Password:</label></b>
                                                <input type="password" name="password_confirmation" class="form-control">
                                            </div>
                                            <button type="submit" name="editUser<?php echo e($user->id); ?>" class="btn btn-success">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div> 
        <!-- New Admin model -->
        <div class="modal fade" id="newAdmin" tabindex="-1" role="dialog" aria-labelledby="newAdmin" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: rgb(111 202 203);">
                        <h5 class="modal-title" id="newCustomer">Create New Admin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-dark">
                        <form action="<?php echo e(route('admin_admin_list')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <b><label for="firstName">First Name:</label></b>
                                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" required>
                                    <?php $__errorArgs = ['firstName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="alert alert-danger mb-1 mt-1"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <b><label for="middleName">Middle Name:</label></b>
                                    <input type="text" class="form-control" id="middleName" name="middleName" placeholder="Middle Name" required>
                                    <?php $__errorArgs = ['middleName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="alert alert-danger mb-1 mt-1"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <b><label for="lastName">Last name:</label></b>
                                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last name" required>
                                    <?php $__errorArgs = ['lastName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="alert alert-danger mb-1 mt-1"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <b><label for="photo">Select image to upload:</label></b>
                                <input type="file" name="photo" id="photo" required>
                                <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="alert alert-danger mb-1 mt-1"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <b><label for="dob">Date Of Birth : </label></b>
                                <input type="date" class="form-control" id="dob" name="dob" required>
                                <?php $__errorArgs = ['dob'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="alert alert-danger mb-1 mt-1"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <b><label for="email">Email:</label></b>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email" required>
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="alert-danger mb-1 mt-1"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group row my-0">
                                <div class="form-group col-md-6 my-0">
                                    <b><label for="phone">Phone No:</label></b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon">+91</span>
                                        </div>
                                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter Phone No" required pattern="[0-9]{10}" maxlength="10">
                                        <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="alert alert-danger mb-1 mt-1"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <b><label for="password">Password:</label></b>
                                <input class="form-control" id="password" name="password" placeholder="Enter Password" type="password" required data-toggle="password" minlength="4" maxlength="21">
                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="alert alert-danger mb-1 mt-1"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <b><label for="password_confirmation">Renter Password:</label></b>
                                <input class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Renter Password" type="password" required data-toggle="password" minlength="4" maxlength="21">
                            </div>
                            <button type="submit" name="submit" class="btn btn-lg btn-info btn-block">Submit</button>
                        </form>
                    </div>
                </div>
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
<?php /**PATH C:\New\pizza_website\resources\views/admin/admin_admin_list.blade.php ENDPATH**/ ?>