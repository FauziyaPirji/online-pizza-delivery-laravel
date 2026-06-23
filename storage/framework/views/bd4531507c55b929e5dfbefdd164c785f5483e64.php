<!DOCTYPE html>
<html lang="en">
    <head>
        <title>About Us</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link rel = "icon" href ="<?php echo e(asset('assets/images/logo.jpg')); ?>" type = "image/x-icon">
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
    </head>
    <body>
        <?php echo $__env->make('view.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- carousel section -->
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="carousel-background">
                <img src="<?php echo e(asset('assets/images/slide-1.jpg')); ?>" class="d-block w-100" style="opacity:0.2;height:650px;">
              </div>
              <div class="carousel-caption d-flex flex-column h-100 align-item-center justify-content-center bottom-0">
                <h1>Welcome to <span>pizza house</span></h1>
                <a href="home">
                  <button class="btn btn-outline-success">Get Started</button>
                </a>
              </div>
            </div>
            <div class="carousel-item">
              <img src="<?php echo e(asset('assets/images/slide-2.jpg')); ?>" class="d-block w-100" style="opacity:0.2;height:650px;">
              <div class="carousel-caption d-flex flex-column h-100 align-item-center justify-content-center bottom-0">
                <h1>Our Mission</h1>
                <p>To be number one</p>
                <a href="home">
                  <button class="btn btn-outline-success">Get Started</button>
                </a>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </button>
        </div>
        <!-- End carousel -->
        <hr class="bg-dark">

        <!-- about section -->
         <div class="container-fluid" style="margin-top:20px;">
            <h1 class="text-center">About Us</h1>
            <div class="row">
              <div class="col">
                <h2>Welcome to Pizza House</h2>
                <h3>The Worldwild Leader in Pizza Delivery</h3>
              </div>

              <div class="col">
                <div class="skill-content">
                  <h5>Rating : </h5>
                  <span class="skill">5 Star <i class="val"></i></span>
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width:93%" aria-valuenow="93" aria-valuemin="0" aria-valuemax="100">
                    </div>
                  </div>
                  <br>

                  <span class="skill">4 Star <i class="val"></i></span>
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                    </div>
                  </div>
                  <br>

                  <span class="skill">3 Star <i class="val"></i></span>
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                    </div>
                  </div>
                  <br>

                  <span class="skill">4 Star <i class="val"></i></span>
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 5%" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100">
                    </div>
                  </div>
                  <br>

                  <span class="skill">1 Star <i class="val"></i></span>
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <!-- about end -->
        <hr class="bg-dark">
        
        <!-- team section -->
        <div class="container mt-5">
          <h2 class="text-center mb-4">OUR TEAM</h2>
          <div class="row text-dark">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="<?php echo e(asset('assets/images/team-1.jpg')); ?>" class="card-img-top" alt="Team Member 1">
                    <div class="card-body">
                        <h5 class="card-title">Barad MahavirSinh</h5>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="<?php echo e(asset('assets/images/team-2.jpg')); ?>" class="card-img-top" alt="Team Member 2">
                    <div class="card-body">
                        <h5 class="card-title">Devmorari Devanshi</h5>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="<?php echo e(asset('assets/images/team-3.jpg')); ?>" class="card-img-top" alt="Team Member 3">
                    <div class="card-body">
                        <h5 class="card-title">Pirji Fauziya</h5>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <!-- team end -->
        <?php echo $__env->make('view.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    </body>
</html>
<?php /**PATH D:\College\Sem-4\Laravel project\pizza_website\resources\views/about_us.blade.php ENDPATH**/ ?>