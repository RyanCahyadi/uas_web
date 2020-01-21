<?php
    session_start();
    $dataJson   = file_get_contents("http://localhost/uas_web/admin/api/getBarang.php");
    $dataBarang = json_decode($dataJson, true);

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>A.R.A SHOP</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-info fixed-top">
      <h3><i class="fas fa-cart-plus mr-3 text-light"></i></h3>
      <a class="navbar-brand font-weight-bold text-light">A.R.A SHOP</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mr-4">
          <li class="nav-item active">
            <a class="nav-link text-light font-weight-bold" href="index.php" data-touggle="tooltip" title="Halaman Utama">Beranda<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link text-light font-weight-bold" href="contact.php" data-touggle="tooltip" title="Hubungi Kami">Hubungi kami<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <?php if (isset($_SESSION['nama'])): ?>
            <a class="nav-link text-light font-weight-bold" href="#" data-touggle="tooltip" title="Halaman Login"><?= $_SESSION['nama']; ?><span class="sr-only">(current)</span></a>
            <?php else: ?>
            <a class="nav-link text-light font-weight-bold" href="register.php" data-touggle="tooltip" title="Halaman Register">Register<span class="sr-only">(current)</span></a>
            <?php endif ?>
          </li>
          <li class="nav-item active">
            <?php if (isset($_SESSION['nama'])):?>
            <a class="nav-link text-light font-weight-bold" href="logout.php" data-touggle="tooltip" title="Halaman Login">Logout<span class="sr-only">(current)</span></a>  
            <!-- <li>
              <a class="nav-link text-light font-weight-bold" href="logout.php" data-touggle="tooltip" title="Halaman Login">Logout<span class="sr-only">(current)</span></a>
            </li> -->
            <?php else: ?>
            <a class="nav-link text-light font-weight-bold" href="login.php" data-touggle="tooltip" title="Halaman Login">Login<span class="sr-only">(current)</span></a>             
            <?php endif ?>
          </li>
        </ul>
          <!-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0 bg-light" type="submit">Search</button>
          </form> -->
        <!-- <div class="icon mt-2">
            <h5>
              <a class="icon" href="#">
                <i class="fas fa-cart-plus ml-3 mr-2 text-dark" data-touggle="tooltip" title="Keranjang Belanja"></i>
              </a>
              <a class="icon" href="#">
                <i class="fas fa-envelope mr-2 text-danger" data-touggle="tooltip" title="Kotak Masuk"></i>
              </a>
            </h5>
          </div> -->
        </div>
      </div>
    </nav>

    <div class="container">
      <div class="col-md-12">  
        <div id="carouselEControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="slide">
              <div class="carousel-item active">
                <img src="image/fashionwanita/baju1.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="image/fashionpria/celana.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="image/fashionwanita/baju5.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="image/hoby/sepatu.jpg" class="d-block w-100" alt="...">
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>     
          
        <h4 class="text-center font-wight-bold m-4">Produk kami</h4><h5></h5>

        <div class="row" style="padding: 50px;">
          <?php 
            if (is_array($dataBarang)):
            foreach ($dataBarang['item'] as $key => $row):
          ?>
          <div class="card" style="width: 18rem; margin: 20px; border: none; padding: 10px;" data-touggle="tooltip" title="Cariel Arei">
            <img src="admin/dir/<?= $row['gambar']; ?>" class="card-img-top img-responsive" alt="...">
            <div class="card-body bg-light">
              <h5 class="card-title"><?= $row['nama_barang']; ?></h5>
              <b>Rp. <?= number_format($row['harga_barang'], 2, ',', '.'); ?></b><br /><br />
              <a href="#" class="btn btn-primary" data-target="#detailBarang<?= $row['id']; ?>" data-toggle="modal">Detail</a>
              <a href="#" class="btn btn-success" data-target="#beliBarang<?= $row['id']; ?>" data-toggle="modal">Beli</a>
            </div>
          </div>
          
          <!-- Modal detail -->
          <div class="modal fade" id="detailBarang<?= $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Detail Produk</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-4">
                      <img src="admin/dir/<?= $row['gambar']; ?>">
                    </div>
                    <div class="col-md-8">
                      <table class="table table-responsive">
                        <tr>
                          <th>Nama Produk</th>
                          <td><?= $row['nama_barang']; ?></td>
                        </tr>
                        <tr>
                          <th>Stok Produk</th>
                          <td><?= $row['stok_barang']; ?></td>
                        </tr>
                        <tr>
                          <th>Harga</th>
                          <td>Rp. <?= number_format($row['harga_barang'], 2, ',', '.'); ?></td>
                        </tr>
                        <tr>
                          <th>Deskripsi</th>
                          <td><?= $row['deskripsi_barang']; ?></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                </div>
              </div>
            </div>
          </div>
          <!-- End modal detail -->

          <!-- Modal beli -->
          <div class="modal fade" id="beliBarang<?= $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Pesan Produk</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-4">
                      <img src="admin/dir/<?= $row['gambar']; ?>">
                    </div>
                    <div class="col-md-8">
                      <table class="table table-responsive">
                        <tr>
                          <th>Nama Produk</th>
                          <td><?= $row['nama_barang']; ?></td>
                        </tr>
                        <tr>
                          <th>Stok Produk</th>
                          <td><?= $row['stok_barang']; ?></td>
                        </tr>
                        <tr>
                          <th>Harga</th>
                          <td>Rp. <?= number_format($row['harga_barang'], 2, ',', '.'); ?></td>
                        </tr>
                        <tr>
                          <th>Deskripsi</th>
                          <td><?= $row['deskripsi_barang']; ?></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <hr />
                  <div class="row">
                    <div class="col-md-12">
                      <form action="http://localhost/uas_web/admin/api/transaksiBarang.php" method="post">
                        <input type="hidden" value="<?= $row['nama_barang']; ?>" name="nama_barang">
                        <div class="form-group">
                          <label for="">Nama</label>
                          <input type="text" name="nama_customer" class="form-control" placeholder="Masukan nama anda . . ." readonly value="<?php if (isset($_SESSION['nama'])){ echo $_SESSION['nama']; } ?>">
                        </div>
                        <div class="form-group">
                          <label for="">Email</label>
                          <input type="email" name="email" class="form-control" placeholder="Masukan email anda . . ." readonly value="<?php if (isset($_SESSION['email'])){ echo $_SESSION['email']; } ?>">
                        </div>
                        <div class="form-group">
                          <label for="">No handphone</label>
                          <input type="number" name="no_handphone" class="form-control" placeholder="Masukan no handphone anda . . ." readonly value="<?php if (isset($_SESSION['no_handphone'])){ echo $_SESSION['no_handphone']; } ?>">
                        </div>
                        <div class="form-group">
                          <label for="">Quantity</label>
                          <input type="number" name="qty" class="form-control" placeholder="Masukan qty yang dibeli . . .">
                        </div>
                        <input type="hidden" name="harga_barang" value="<?= $row['harga_barang']; ?>">
                        <div class="form-group">
                          <label for="">Metode pembayaran</label>
                          <select name="metode_pembayaran" id="" class="form-control">
                            <option value="">--Pilih metode pembayaran--</option>
                            <option value="Cash">Cash</option>
                            <option value="Transfer">Transfer</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="">Alamat</label>
                          <textarea name="alamat" id="" cols="30" rows="10" class="form-control" placeholder="Masukan alamat anda . . ."></textarea>
                        </div>
                        <div class="modal-footer" style="border: none;">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                          <button type="submit" class="btn btn-success">Proses</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <!-- End Modal beli -->
          
      <!-- Modal pesan beli cariel -->
      <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-style-mail">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><p class="text-primary">Menunggu Pembayaran</p></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p class="text-center">Mohon selesaikan pembayan anda sebelum tangggal :</p>
                <p class="text-center">25 Januari 2020 19:45</p>
                <p class="text-center">Total Rp 750.000</p><br><br>
                <h4><p class="text-dark text-center">BNI Virtual Acount</p></h4>
                <p class="text-center text-danger">No rek : 977235661981</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div> -->
          <!-- End modal beli -->
          <?php endforeach ?>
        <?php endif ?>
        </div>
      </div>
    </div>
    <!--   this is footer -->

      <footer class="bg-info text-white p-3 mt-4 bg-dark">
        <div class="row text-light">
          <div class="col-md-3">
            <h5>Layanan Pelanggan</h5>
              <div class="color text-light font-weight-bold">
                <ul>
                  <li>Pusat Bantuan</li>
                  <li>Cara Pembelian</li>
                </ul>
              </div>
          </div>

          <div class="col-md-3">
            <h5>Tentang Kami</h5>
              <div class="color text-light font-weight-bold">
                <ul>
                  <li>PT. ARA Terdiri Dari Agus, Ryan & Ahmad</li>
                </ul>
              </div>
          </div>

          <div class="col-md-3">
            <h5>Mitra Kerjasama</h5>
              <div class="color text-light font-weight-bold">
                <ul>
                  <li>JNE</li>
                  <li>TIKI</li>
                </ul>
              </div>  
          </div>

          <div class="col-md-3">
            <h5>Hubungi Kami</h5>
              <div class="color text-light font-weight-bold">
                <ul>
                  <li>022-2355-6437</li>
                  <li>customer@arashop.com</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
   </div>

  <div class="copyright text-center font-wight-bold p-3 fixed-under bg-info text-dark font-weight-bold mt-1">
    <p>Developed by ARADEV Copyright <i class="far fa-copyright"></i>2020</p>
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>