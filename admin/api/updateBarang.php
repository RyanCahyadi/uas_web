<?php

    session_start();

    $conn = mysqli_connect("localhost", "root", "", "db_ecommerce");

    $item = [];

    $dataBarang = 
        [
            'id'                => $_POST['id'],
            'nama_barang'       => htmlspecialchars($_POST['nama_barang']),
            'harga_barang'      => htmlentities($_POST['harga_barang']),
            'stok_barang'       => htmlspecialchars($_POST['stok_barang']),
            'deskripsi_barang'  => htmlspecialchars($_POST['deskripsi_barang']),
            'nama_gambar'       => $_FILES['gambar']['name'],
            'tmp_gambar'        => $_FILES['gambar']['tmp_name'],
            'size_gambar'       => $_FILES['gambar']['size']
        ];
    
    if ( isset($_POST['check']) ) {
        $path = "../dir/".$dataBarang['nama_gambar'];
        if ( move_uploaded_file($dataBarang['tmp_gambar'], $path) ) {
            $sql    = "SELECT * FROM tbl_barang WHERE id = '$dataBarang[id]'";
            $result = mysqli_query($conn, $sql);
            $data   = mysqli_fetch_assoc($result);
            if ( is_file("../dir/".$data['gambar']) ) {
                unlink("../dir/".$data['gambar']);
                $sql    = "UPDATE tbl_barang set nama_barang = '$dataBarang[nama_barang]', harga_barang = '$dataBarang[harga_barang]', stok_barang = '$dataBarang[stok_barang]', deskripsi_barang = '$dataBarang[deskripsi_barang]', gambar = '$dataBarang[nama_gambar]' WHERE id = '$dataBarang[id]'";
                $result = mysqli_query($conn, $sql);
                $respon = array(
                    'message'   => "Success",
                    'status'    => 200,
                    $_SESSION['message']        = "Berhasil meng-update data",
                    $_SESSION['message_type']   = "success",
                    'item'      => $dataBarang
                );
            }
        }
    } else {
        $sql    = "UPDATE tbl_barang set nama_barang = '$dataBarang[nama_barang]', harga_barang = '$dataBarang[harga_barang]', stok_barang = '$dataBarang[stok_barang]', deskripsi_barang = '$dataBarang[deskripsi_barang]' WHERE id = '$dataBarang[id]'";
        $result = mysqli_query($conn, $sql);
        $respon = array(
            'message'   => "Success",
            'status'    => 200,
            $_SESSION['message']        = "Berhasil meng-update data",
            $_SESSION['message_type']   = "success",
            'item'      => $dataBarang
        );
    }
    echo json_encode($respon);

    header("Location: ../dashboard_barang.php");

?>