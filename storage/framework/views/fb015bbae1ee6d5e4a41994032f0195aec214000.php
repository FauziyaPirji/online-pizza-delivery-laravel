<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Navbar</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel = "icon" href ="<?php echo e(asset('assets/images/logo.jpg')); ?>" type = "image/x-icon">
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
        <style>
            body{
              background-image: url("<?php echo e(asset('assets/images/bg_4.jpg')); ?>");
            }
            input{
              background: transparent !important;
              border: none;
              border-bottom: 1px solid #fac564;
            }
        </style>
    </head>
    <body class="text-light">
        <!-- navbar start -->
        <nav class="navbar navbar-expand-lg navbar-dark ftco-navbar bg-dark ftco-navbar-light" id="ftco-navbar">
            <div class="container-fluid">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="oi oi-menu"></span> Menu
                  </button>
              <div class="collapse navbar-collapse" id="ftco-nav">
              <img src="<?php echo e(asset('assets/images/logo1.jpg')); ?>" style="width:7%;height:7">
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="<?php echo e(route('admin_home')); ?>" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="<?php echo e(route('admin.order')); ?>" class="nav-link">Orders</a></li>
                    <li class="nav-item"><a href="<?php echo e(route('admin_categories_list')); ?>" class="nav-link">Category</a></li>
                    <li class="nav-item"><a href="<?php echo e(route('admin_item_list')); ?>" class="nav-link">Menu</a></li>
                    <li class="nav-item"><a href="<?php echo e(route('admin_user_list')); ?>" class="nav-link">Customers</a></li>
                    <li class="nav-item"><a href="<?php echo e(route('admin_admin_list')); ?>" class="nav-link">Admin</a></li>
                  </ul>
                  <a href="<?php echo e(route('logout')); ?>"><button type="button" class="btn btn-info mx-2">Log Out</button></a>
                </div>
            </div>
          </nav>
        <!-- END nav -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    </body>
</html>   <?php /**PATH C:\New\pizza_website\resources\views/admin/view/admin_navbar.blade.php ENDPATH**/ ?>