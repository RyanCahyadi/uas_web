<!DOCTYPE html>
<html dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
        <title>Halaman login admin</title>
        <link href="dist/css/style.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="main-wrapper">
            <div class="preloader">
                <div class="lds-ripple">
                    <div class="lds-pos"></div>
                    <div class="lds-pos"></div>
                </div>
            </div>
            <?php 
                require 'function.php';

                if (isset($_POST['btn-login'])) {
                    loginAdmin($_POST);
                }
            ?>
            <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
                <div class="auth-box bg-dark border-top border-secondary">
                    <div id="loginform">
                        <div class="text-center p-t-20 p-b-20">
                            <span class="db"><img src="assets/images/logo.png" alt="logo" /></span>
                        </div>
                        <form class="form-horizontal m-t-20" id="loginform" action="" method="POST">
                            <div class="row p-b-30">
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-email"></i></span>
                                        </div>
                                        <input type="email" class="form-control form-control-lg" name="email" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" required="">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                        </div>
                                        <input type="password" class="form-control form-control-lg" name="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required="">
                                    </div>
                                    <div class="form-group">
                                        <div class="row m-t-20 p-t-20 border-top border-secondary">
                                            <div class="col-12">
                                                <?php if (isset($error)){ ?>
                                                <p style="color: red;">Email atau password salah</p>
                                                <?php } ?>
                                                <button class="btn btn-success float-right" type="submit" name="btn-login">Login</button>    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="assets/libs/jquery/dist/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
        <script>
            $('[data-toggle="tooltip"]').tooltip();
            $(".preloader").fadeOut();
            $('#to-recover').on("click", function() {
                $("#loginform").slideUp();
                $("#recoverform").fadeIn();
            });
            $('#to-login').click(function(){ 
                $("#recoverform").hide();
                $("#loginform").fadeIn();
            });
        </script>
    </body>
</html>