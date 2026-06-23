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
            li{
              list-style-type: none;
            }
        </style>
    </head>
    <body class="text-light">
        <!-- navbar start -->
        <nav class="navbar navbar-expand-lg navbar-dark ftco-navbar bg-dark ftco-navbar-light" id="ftco-navbar">
            <div class="container-fluid">
                  <a class="navbar-brand" href=""></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="oi oi-menu"></span> Menu
                  </button>
              <div class="collapse navbar-collapse" id="ftco-nav">
                <img src="<?php echo e(asset('assets/images/logo1.jpg')); ?>" style="width:7%;height:7">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item"><a href="home" class="nav-link">Home</a></li>
                  <li class="nav-item"><a href="/menu" class="nav-link">Menu</a></li>
                  <li class="nav-item"><a href="/orders" class="nav-link">Your Orders</a></li>
                  <li class="nav-item"><a href="/about_us" class="nav-link">About Us</a></li>
                </ul>
                <form method="get" action="<?php echo e(route('search')); ?>" class="form-inline">
                    <input class="form-control mr-sm-2 mx-2" style="color: white !important;" type="search" name="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-info my-2 my-sm-0 mx-2" type="submit">Search</button>
                </form>
                  <a href="<?php echo e(route('cart.index')); ?>"><button type="button" class="btn btn-secondary mx-2">Cart</button></a>
                  <ul>
                    <!-- User Profile Dropdown -->
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle text-light" href="#" id="userDropdown" role="button" data-toggle="dropdown">
                        Welcome <?php echo e(Auth::user()->f_name); ?> <?php echo e(Auth::user()->m_name); ?>

                      </a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="/profile">Profile</a>
                      </div>
                    </li>
                  </ul>
                  <a href="<?php echo e(route('logout')); ?>"><button type="button" class="btn btn-info mx-2">Log Out</button></a>
              </div>
            </div>
        </nav>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    </body>
</html><?php /**PATH C:\New\pizza_website\resources\views/view/navbar.blade.php ENDPATH**/ ?>