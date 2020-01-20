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
   <link rel="stylesheet" type="text/css" href="stylecontact.css">

    <title>Registrasi</title>
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
        <h2 class="text-center">Register</h2>
        <hr>
         <form action="http://localhost/kampus/uts_ecommerce/admin/api/register.php" method="post">
            <div class="form-group">
              <label for="email">Email address</label>
              <div class="input-group">
                <!-- <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                </div> -->
                 <input type="email" class="form-control" id="email" placeholder="Masukan email anda . . ." name="email">
              </div>
               <!-- <small id="emailHelp" class="form-text text-muted">Utamakan Email address.</small> -->
            </div>

            <div class="form-group">
              <label for="password">Password</label>
                <div class="input-group">
                  <!-- <div class="input-group-prepend">
                    <div class="input-group-text"><b>?</b></div>
                  </div> -->
                  <input type="password" class="form-control" id="password" placeholder="Masukan password anda . . ." name="password">
                </div>
            </div>

            <div class="form-group">
              <label for="nama">Nama</label>
                <div class="input-group">
                  <!-- <div class="input-group-prepend">
                    <div class="input-group-text"><b>?</b></div>
                  </div> -->
                  <input type="text" class="form-control" id="nama" placeholder="Masukan nama anda . . ." name="nama">
                </div>
            </div>

            <div class="form-group">
              <label for="no_handphone">Nomor handphone</label>
                <div class="input-group">
                  <!-- <div class="input-group-prepend">
                    <div class="input-group-text"><b>?</b></div>
                  </div> -->
                  <input type="number" class="form-control" id="no_handphone" placeholder="Masukan nomor handphone anda . . ." name="no_handphone">
                </div>
            </div>

            <div class="form-group">
              <label for="tgl_lahir">Tanggal lahir</label>
                <div class="input-group">
                  <!-- <div class="input-group-prepend">
                    <div class="input-group-text"><b>?</b></div>
                  </div> -->
                    <input type="date" name="tgl_lahir" class="form-control">
                </div>
            </div>

            <div class="form-group">
              <label for="jenis_kelamin">Jenis kelamin</label>
                <div class="input-group">
                  <!-- <div class="input-group-prepend">
                    <div class="input-group-text"><b>?</b></div>
                  </div> -->
                  <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                      <option value="">--Pilih jenis kelamin--</option>
                      <option value="Pria">Pria</option>
                      <option value="Wanita">Wanita</option>
                  </select>
                </div>
            </div>

           <button type="reset" class="btn btn-dark">Batal</button>
            <button type="submit" class="btn btn-success">Register</button>
          </form>
          
          <br><a href="index.php"><h6>Kembali ke beranda</h6></a>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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



