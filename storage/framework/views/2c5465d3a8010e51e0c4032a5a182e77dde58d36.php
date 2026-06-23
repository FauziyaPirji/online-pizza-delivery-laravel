<!DOCTYPE html>
<html lang="en">
    <head>
        <title>LogIn</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel = "icon" href ="<?php echo e(asset('assets/images/logo.jpg')); ?>" type = "image/x-icon">
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
        <style>
            body{
              background-image: url('assets/images/bg_4.jpg');
            }
            input{
              background: transparent !important;
              color: white !important;
              border: none; 
              border-bottom: 1px solid #fac564; 
            }
        </style>
    </head>
    <body>  
        <!-- Background image -->
        <div class="bg-image" style="background-image: url('assets/images/bg_2.jpg');height: 150px;background-size:cover;"></div>
        <!-- Background image-->
        <div class="container-md card bg-body-tertiary text-light" style="background-image: url('assets/images/blur.jpg');margin-top:-50px;">
            <center>
            <form class="needs-validation" action="<?php echo e(route('loginMatch')); ?>" method="get" novalidate>
                <?php echo csrf_field(); ?>
                <br>
                <h1>Login Here</h1>
                <hr class="bg-dark">
                <br>
                <div class="form-row d-flex justify-content-center">
                    <div class="col-md-6 mb-3">
                        <h3><label>Email</label></h3>
                        <input type="text-light" id="email" name="email" class="form-control" required>
                        <div class="invalid-tooltip">
                            Required
                        </div>
                    </div>
                </div>
                <div class="form-row d-flex justify-content-center">
                    <div class="col-md-6 mb-3">
                        <h3><label>Password</label></h3>
                        <input type="password" name="password" id="password" class="form-control" required>
                        <div class="invalid-tooltip">
                            Required
                        </div>
                    </div>
                </div>
                <?php if($errors->any()): ?>
                    <div class="form-row d-flex justify-content-center">
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    </li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>
                <div><a href="forgot_password">Forgot Password?</a></div>
                <br>
                <button class="btn btn-primary btn-block" type="submit" name="submit" id="submit">Log In</button>
                <br>
                <p>Don't have an account? <a href="/register">Sign up now</a></p>
            </form>
            </center>
        </div>
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
</html><?php /**PATH D:\College\Sem-4\Laravel project\pizza_website\resources\views/welcome.blade.php ENDPATH**/ ?>