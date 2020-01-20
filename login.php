<?php 
  session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css">
   <link rel="stylesheet" type="text/css" href="stylelogin.css">

    <title>form login</title>
  </head>

  <body>

 <!-- form login -->

    <div class="container">
      <?php if (isset($_SESSION['message'])): ?>
      <div class="alert alert-<?= $_SESSION['message_type']; ?>" style="margin-top: 10px;" id="alert">
        <?= $_SESSION['message']; ?>
        <?php unset($_SESSION['message']); ?>
      </div>
      <?php endif ?>
      <h2 class="text-center">FORM LOGIN</h2>
      <hr>
       <form action="http://localhost/kampus/uts_ecommerce/admin/api/loginUser.php" method="post">
          <div class="form-group">
            <label for="email">Email</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-user"></i></div>
              </div>
               <input type="email" class="form-control" id="email" placeholder="Masukan Email Anda . . ." name="email">
            </div>
          </div>

          <div class="form-group">
            <label for="pasword">Password</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-unlock-alt"></i></div>
                </div>
                <input type="password" class="form-control" id="pasword" placeholder="Masukan Password Anda" name="password">
              </div>
          </div>

          <div class="form-group form-check">
            <!-- <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label> -->
          </div>
          <button type="reset" class="btn btn-danger">Batal</button>
          <button type="submit" class="btn btn-success">Login</button>
        </form>
        <br><a href="index.php"><h6>Kembali Ke beranda</h6></a>
    </div>
    <script src="admin/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="admin/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="admin/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="admin/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="admin/assets/extra-libs/sparkline/sparkline.js"></script>
    <script src="admin/dist/js/waves.js"></script>
    <script src="admin/dist/js/sidebarmenu.js"></script>
    <script src="admin/dist/js/custom.min.js"></script>
    <script src="admin/assets/libs/flot/excanvas.js"></script>
    <script src="admin/assets/libs/flot/jquery.flot.js"></script>
    <script src="admin/assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="admin/assets/libs/flot/jquery.flot.time.js"></script>
    <script src="admin/assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="admin/assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="admin/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="admin/dist/js/pages/chart/chart-page-init.js"></script> 
    <script src="admin/dist/js/datatables.js"></script>
    <script type="text/javascript" src="js/bootsrap.js.css" ></script>
    <script type="text/javascript" src="script.js"></script>
    <script>
        $('#alert').ready(function() {
            $('#alert').fadeOut(2000);
        });
    </script>
  </body>
</html>