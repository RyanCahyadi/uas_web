<?php
    session_start();
    $dataJson   = file_get_contents("http://localhost/uas_web/admin/api/getPesanan.php");
    $dataPesanan = json_decode($dataJson, true);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Print</title>
        <link href="../dist/css/style.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../dist/css/datatables.css">
    </head>
    <body>
        <table class="table table-hover" id="table-user">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama customer</th>
                    <th>Nama barang</th>
                    <th>Qty barang</th>
                    <th>Grand total</th>
                    <th>Metode pembayaran</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>No handphone</th>
                    <th class="mdi mdi-settings btn-lg""></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    if (is_array($dataPesanan)):
                        foreach ($dataPesanan['item'] as $key => $row):
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['nama_customer']; ?></td>
                    <td><?= $row['nama_barang']; ?></td>
                    <td><?= $row['qty_barang']; ?></td>
                    <!-- <td>Rp. <?= number_format($row['harga_barang'], 2, ',', '.'); ?></td> -->
                    <td>Rp. <?= number_format($row['grand_total'], 2, ',', '.'); ?></td>
                    <td><?= $row['metode_pembayaran']; ?></td>
                    <td><?= $row['alamat']; ?></td>
                    <td><?= $row['email']; ?></td>
                    <td><?= $row['no_handphone']; ?></td>
                    <td>
                        <!-- <a class="mdi mdi-grease-pencil btn-lg" data-toggle="modal" data-target="#modalEditPesanan<?= $row['id']; ?>"></a> -->
                        <a class="mdi mdi-delete-circle btn-lg" data-toggle="modal" data-target="#modalDeletePesanan<?= $row['id']; ?>"></a>
                    </td>
                </tr>
                <?php endforeach ?>
                <?php endif ?>
            </tbody>
        </table>
        <script>
            window.print();
        </script>
        <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
        <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
        <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
        <script src="../assets/extra-libs/sparkline/sparkline.js"></script>
        <script src="../dist/js/waves.js"></script>
        <script src="../dist/js/sidebarmenu.js"></script>
        <script src="../dist/js/custom.min.js"></script>
        <script src="../assets/libs/flot/excanvas.js"></script>
        <script src="../assets/libs/flot/jquery.flot.js"></script>
        <script src="../assets/libs/flot/jquery.flot.pie.js"></script>
        <script src="../assets/libs/flot/jquery.flot.time.js"></script>
        <script src="../assets/libs/flot/jquery.flot.stack.js"></script>
        <script src="../assets/libs/flot/jquery.flot.crosshair.js"></script>
        <script src="../assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
        <script src="../dist/js/pages/chart/chart-page-init.js"></script> 
        <script src="../dist/js/datatables.js"></script>
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