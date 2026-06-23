<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Edit User Profile</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel = "icon" href ="<?php echo e(asset('assets/images/logo.jpg')); ?>" type = "image/x-icon">
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
    </head>
    <body>
        <?php echo $__env->make('view.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="container mt-5">
            <div class="card">
                <div class="card-header text-white" style="background-color: rgb(111 202 203);">
                    <h3>Edit Profile</h3>
                </div>
                <div class="card-body text-dark">
                    <form action="<?php echo e(route('user.profile.update')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row my-0 d-flex justify-content-between align-items-center">
                            <div class="col-md-6">
                                <b><label for="photo">Upload Photo:</label></b>
                                <input type="file" name="photo" id="photo">
                            </div>

                            <!-- Image on Right -->
                            <div class="col-md-6 text-end">
                                <img src="<?php echo e(asset('/storage/'. $user->file_name)); ?>" width="100" class="rounded">
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
                        <button type="submit" class="btn btn-lg btn-primary btn-block">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html><?php /**PATH C:\New\pizza_website\resources\views/profile_edit.blade.php ENDPATH**/ ?>