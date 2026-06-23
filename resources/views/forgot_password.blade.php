<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Forgot</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link rel = "icon" href ="{{ asset('assets/images/logo.jpg') }}" type = "image/x-icon">
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <style>
            body{
              background-image: url("{{ asset('assets/images/bg_4.jpg') }}");
            }
            input{
                background: transparent !important;
                color: white!important;
                border: none;
                border-bottom: 1px solid #fac564;
            }
        </style>
    </head>
    <body>  
        <!-- Background image -->
        <div class="bg-image" style="background-image: url( 'assets/images/bg_2.jpg' );height: 150px;background-size:cover;">
        </div>
        <!-- Background image-->
        <div class="container-md card bg-body-tertiary text-light" style="background-image: url( 'assets/images/blur.jpg' );margin-top:-50px;">
            <center>
            <form class="needs-validation" action="{{ route('password.request') }}" method="post" novalidate>
                @csrf
                <br>
                <h1>Reset password Here</h1>
                <hr class="bg-dark">
                <br>
                @if($errors->any())
                    <div class="form-row d-flex justify-content-center">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    </li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                <div class="form-row d-flex justify-content-center">
                    <div class="col-md-6 mb-3">
                        <h3><label>Email : </label></h3>
                        <input type="text" id="email" name="email" class="form-control" required>
                        <div class="invalid-tooltip">
                            Required
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-row d-flex justify-content-center">
                    <div class="col-md-6 mb-3">
                        <h3><label>Set New Password : </label></h3>
                        <input type="password" id="password" name="password" class="form-control" required>
                        <div class="invalid-tooltip">
                            Required
                        </div>
                    </div>
                </div>
                <button type="submit">Reset Password</button>
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
</html>