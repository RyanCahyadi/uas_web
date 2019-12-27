<?php

    session_start();

    $conn = mysqli_connect("localhost", "root", "", "db_ecommerce");

    $item = [];

    $dataBarang = 
        [
            'nama_barang'       => htmlspecialchars($_POST['nama_barang']),
            'harga_barang'      => htmlentities($_POST['harga_barang']),
            'stok_barang'       => htmlspecialchars($_POST['stok_barang']),
            'deskripsi_barang'  => htmlspecialchars($_POST['deskripsi_barang']),
            'nama_gambar'       => $_FILES['gambar']['name'],
            'tmp_gambar'        => $_FILES['gambar']['tmp_name'],
            'size_gambar'       => $_FILES['gambar']['size']
        ];
    
    $path = "../dir/".$dataBarang['nama_gambar'];
    
    if (move_uploaded_file($dataBarang['tmp_gambar'], $path)) {
        $sql        = "INSERT INTO tbl_barang (nama_barang, harga_barang, stok_barang, deskripsi_barang, gambar) VALUES ('$dataBarang[nama_barang]', '$dataBarang[harga_barang]', '$dataBarang[stok_barang]', '$dataBarang[deskripsi_barang]', '$dataBarang[nama_gambar]')";
        $result     = mysqli_query($conn, $sql);
        $item       = $dataBarang;
        $respon = array(
            'message'   => "Success",
            'status'    => 200,
            $_SESSION['message']        = "Berhasil menambah data",
            $_SESSION['message_type']   = "success",
            'item'      => $dataBarang
        );
    } else {
        $respon = array(
            'message'   => "Failed",
            'status'    => 400,
            'item'      => $dataUser
        );
    }
    

    echo json_encode($respon);

    header("Location: ../dashboard_barang.php");

?>