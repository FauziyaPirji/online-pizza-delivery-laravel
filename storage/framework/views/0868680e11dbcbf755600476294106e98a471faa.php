<!DOCTYPE html>
<html lang="en">
    <head>
        <title>SignUp</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel = "icon" href ="<?php echo e(asset('assets/images/logo.jpg')); ?>" type = "image/x-icon">
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
        <style>
            input{
                background: transparent !important;
                color: white!important;
                border: none;
                border-bottom: 1px solid #fac564;
            }
            body{
              background-image: url("<?php echo e(asset('assets/images/bg_4.jpg')); ?>");
            }
        </style>
    </head>
    <body>
        <!-- Background image -->
        <div class="bg-image" style="background-image: url( 'assets/images/bg_2.jpg' ); height: 150px;background-size:cover;">
        </div>
        <!-- Background image-->
        <div class="container-md card bg-body-tertiary text-light" style="background-image: url( 'assets/images/blur.jpg' );margin-top:-50px;">
        <center>
        <form action="<?php echo e(route('register')); ?>" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
        <?php echo csrf_field(); ?>
        <br>
            <h1>SignUp Here</h1>
            <hr class="bg-dark">
            <br>
            <div class="form-row d-flex">
                <div class="col-md-2 mb-3">
                    <h5><label for="firstName">First Name : </label></h5>
                </div>
                <div class="col-md-3 mb-3">
                    <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo e(old('firstName')); ?>" required>
                    <div class="invalid-tooltip">Required</div>
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
            </div>
            <div class="form-row d-flex">
                <div class="col-md-2 mb-3">
                    <h5><label for="middleName">Middle Name : </label></h5>
                </div>
                <div class="col-md-3 mb-3">
                    <input type="text" class="form-control" id="middleName" name="middleName" value="<?php echo e(old('middleName')); ?>" required>
                    <div class="invalid-tooltip">Required</div>
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
                <div class="col-md-2 mb-3">
                    <h5><label for="lastName">Last Name : </label></h5>
                </div>
                <div class="col-md-3 mb-3">
                    <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo e(old('lastName')); ?>" required>
                    <div class="invalid-tooltip">Required</div>
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
            <div class="form-row d-flex">
                <div class="col-md-2 mb-3">
                    <h5><label for="photo">Select image to upload:</label></h5>
                </div>
                <div class="col-md-3 mb-3">
                    <input type="file" name="photo" id="photo" class="form-control" accept=".png,.jpg,.jpeg" required>
                    <div class="invalid-tooltip">Required</div>
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
                <div class="col-md-2 mb-3">
                    <h5><label for="dob">Date Of Birth : </label></h5>
                </div>
                <div class="col-md-3 mb-3">
                    <input type="date" class="form-control" id="dob" name="dob" value="<?php echo e(old('dob')); ?>" required>
                    <div class="invalid-tooltip">Required</div>
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
            </div>
            <div class="form-row d-flex">
                <div class="col-md-2 mb-3">
                    <h5><label for="email">Email : </label></h5>
                </div>
                <div class="col-md-3 mb-3">
                    <input type="text" class="form-control" id="email" name="email" value="<?php echo e(old('email')); ?>" required>
                    <div class="invalid-tooltip">Required</div>
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
                <div class="col-md-2 mb-3">
                    <h5><label for="phone">Phone No : </label></h5>
                </div>
                <div class="col-md-3 mb-3">
                    <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo e(old('phone')); ?>" required>
                    <div class="invalid-tooltip">Required</div>
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
            <div class="form-row d-flex">
                <div class="col-md-2 mb-3">
                    <h5><label for="password">Password : </label></h5>
                </div>
                <div class="col-md-3 mb-3">
                    <input type="password" class="form-control" id="password" name="password" required autocomplete="new-password">
                    <div class="invalid-tooltip">Required</div>
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
                <div class="col-md-2 mb-3">
                    <h5><label for="password-confirm">Confirm Password : </label></h5>
                </div>
                <div class="col-md-3 mb-3">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
                    <div class="invalid-tooltip">Required</div>
                </div>
            </div>
            <br>
            <button class="btn btn-primary btn-block" type="submit" id="submit" name="submit">Sign Up</button>
            <br>
            <p>Already have an account? <a href="/">Login Here</a></p>
        </form>
        </center>
        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
                });
            }, false);
            })();
        </script>
    </body>
</html><?php /**PATH D:\College\Sem-4\Laravel project\pizza_website\resources\views/signup.blade.php ENDPATH**/ ?>