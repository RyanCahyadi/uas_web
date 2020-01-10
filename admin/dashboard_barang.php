<?php
    session_start();
    $dataJson   = file_get_contents("http://localhost/kampus/uts_ecommerce/admin/api/getBarang.php");
    $dataBarang = json_decode($dataJson, true);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Halaman dashboard barang</title>
        <link href="dist/css/style.min.css" rel="stylesheet">
        <link rel="stylesheet" href="dist/css/datatables.css">
    </head>
    <body>
        <div id="main-wrapper">
            <header class="topbar" data-navbarbg="skin5">
                <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                    <div class="navbar-header" data-logobg="skin5">
                        <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                            <a class="navbar-brand" href="index.html">
                                <b class="logo-icon p-l-10">
                                    <img src="assets/images/logo-icon.png" alt="homepage" class="light-logo" />
                               </b>
                                <span class="logo-text">
                                    <img src="assets/images/logo-text.png" alt="homepage" class="light-logo" />
                                </span>
                            </a>
                            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                        </a>    
                    </div>
                </nav>
            </header>
            <aside class="left-sidebar" data-sidebarbg="skin5">
                <div class="scroll-sidebar">
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav" class="p-t-30">
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dashboard.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dashboard_user.php" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">User</span></a></li>
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dashboard_barang.php" aria-expanded="false"><i class="mdi mdi-briefcase"></i><span class="hide-menu">Barang</span></a></li>
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dashboard_pesanan.php" aria-expanded="false"><i class="mdi mdi-cart"></i><span class="hide-menu">Pesanan</span></a></li>
                            <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-circle"></i><span class="hide-menu"><?= $_SESSION['login']; ?></span></a>
                                <ul aria-expanded="false" class="collapse  first-level">
                                    <li class="sidebar-item"><a href="logout.php" class="sidebar-link"><i class="mdi mdi-logout"></i><span class="hide-menu">Logout</span></a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <div class="page-wrapper">
                <div class="page-breadcrumb">
                    <div class="row">
                        <div class="col-12 d-flex no-block align-items-center">
                            <h4 class="page-title">Barang</h4>
                            <div class="ml-auto text-right">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Barang</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div>
                                <h4 class="card-title">Data barang</h4>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahBarang">Tambah</button>
                                <?php if (isset($_SESSION['message'])): ?>
                                <div class="alert alert-<?= $_SESSION['message_type']; ?>" style="margin-top: 10px;" id="alert">
                                    <?= $_SESSION['message']; ?>
                                    <?php unset($_SESSION['message']); ?>
                                </div>
                                <?php endif ?>
                                <!-- Modal Tambah barang-->
                                <div class="modal fade" id="modalTambahBarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah barang</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="http://localhost/kampus/uts_ecommerce/admin/api/addBarang.php" method="POST" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <input type="text" name="nama_barang" class="form-control" placeholder="Masukan nama barang . . .">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="number" name="harga_barang" class="form-control" placeholder="Masukan harga barang . . .">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="number" name="stok_barang" class="form-control" placeholder="Masukan stok barang anda . . .">
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="deskripsi_barang" class="form-control" placeholder="Masukan deskripsi barang"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Gambar</label>
                                                        <input type="file" name="gambar" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End modal tambah barang -->
                                <br /><br />
                                <div class="table-responsive">
                                    <table class="table table-hover" id="table-user">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Gambar</th>
                                                <th>Nama barang</th>
                                                <th>Harga barang</th>
                                                <th>Stock barang</th>
                                                <th>Deskripsi barang</th>
                                                <th class="mdi mdi-settings btn-lg""></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no = 1;
                                                if (is_array($dataBarang)):
                                                    foreach ($dataBarang['item'] as $key => $row):
                                            ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><img src="dir/<?= $row['gambar']; ?>" width="75" height="75" class="img img-rounded"></td>
                                                <td><?= $row['nama_barang']; ?></td>
                                                <td> Rp. <?= number_format($row['harga_barang'], 2, ',', '.'); ?></td>
                                                <td><?= $row['stok_barang']; ?></td>
                                                <td><?= $row['deskripsi_barang']; ?></td>
                                                <td>
                                                    <a class="mdi mdi-grease-pencil btn-lg" data-toggle="modal" data-target="#modalEditBarang<?= $row['id']; ?>"></a>
                                                    <a class="mdi mdi-delete-circle btn-lg" data-toggle="modal" data-target="#modalDeleteBarang<?= $row['id']; ?>"></a>
                                                </td>
                                            </tr>
                                            
                                            <!-- Modal delete -->
                                            <div class="modal fade" id="modalDeleteBarang<?= $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <form action="http://localhost/kampus/uts_ecommerce/admin/api/deleteBarang.php" method="POST">
                                                            <input type="hidden" value="<?= $row['id']; ?>" name="id">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Delete barang</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">Apakah anda yakin ingin menghapus data ini ?</div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End modal delete -->

                                            <!-- Modal Edit -->
                                            <div class="modal fade" id="modalEditBarang<?= $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit barang</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="http://localhost/kampus/uts_ecommerce/admin/api/updateBarang.php" method="POST" enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                                                <div class="form-group">
                                                                    <label for="">Nama barang</label>
                                                                    <input type="text" name="nama_barang" class="form-control" value="<?= $row['nama_barang']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Harga barang</label>
                                                                    <input type="number" name="harga_barang" class="form-control" value="<?= $row['harga_barang']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Jumlah barang</label>
                                                                    <input type="number" name="stok_barang" class="form-control" value="<?= $row['stok_barang']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Deskripsi barang</label>
                                                                    <textarea name="deskripsi_barang" class="form-control" placeholder="Masukan deskripsi barang"><?= $row['deskripsi_barang'] ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Gambar</label><br />
                                                                    <img src="dir/<?= $row['gambar']; ?>" width="100" height="100" class="img img-circle" id="gambar"><br /><br />
                                                                    <input type="checkbox" name="check" id="ubah-gambar"> Checklist apabila ingin merubah gambar <br /><br />
                                                                    <input type="file" name="gambar" class="form-control" id="lihatGambar">
                                                                    <!-- <input type="file" name="gambar" class="form-control"> -->
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End modal tambah user -->
                                            <?php endforeach ?>
                                            <?php endif ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="footer text-center">
                    All Rights Reserved by Matrix-admin. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
                </footer>
            </div>
        </div> 
        <script src="assets/libs/jquery/dist/jquery.min.js"></script>
        <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
        <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
        <script src="assets/extra-libs/sparkline/sparkline.js"></script>
        <script src="dist/js/waves.js"></script>
        <script src="dist/js/sidebarmenu.js"></script>
        <script src="dist/js/custom.min.js"></script>
        <script src="assets/libs/flot/excanvas.js"></script>
        <script src="assets/libs/flot/jquery.flot.js"></script>
        <script src="assets/libs/flot/jquery.flot.pie.js"></script>
        <script src="assets/libs/flot/jquery.flot.time.js"></script>
        <script src="assets/libs/flot/jquery.flot.stack.js"></script>
        <script src="assets/libs/flot/jquery.flot.crosshair.js"></script>
        <script src="assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
        <script src="dist/js/pages/chart/chart-page-init.js"></script> 
        <script src="dist/js/datatables.js"></script>
        <script>
            $('#table-user').DataTable();
            $('#alert').ready(function() {
                $('#alert').fadeOut(2000);
            });
            // $('#ubah-gambar').click(function() {
            //     $('#gambar').fadeOut(500);
            // });
        </script>
    </body>
</html>