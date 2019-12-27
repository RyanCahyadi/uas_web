<?php

    session_start();

    $conn = mysqli_connect("localhost", "root", "", "db_ecommerce");

    $dataBarang = 
        [
            'id'    => $_POST['id']         
        ];

    $sql    = "SELECT * FROM tbl_barang WHERE id = '$dataBarang[id]'";
    $result = mysqli_query($conn, $sql);
    $data   = mysqli_fetch_assoc($result);

    if (is_file("../dir/".$data['gambar'])) {
        unlink("../dir/".$data['gambar']);
        $sql    = "DELETE FROM tbl_barang WHERE id = '$dataBarang[id]'";
        $result = mysqli_query($conn, $sql);
        $respon = array(
            'message'   => "Success",
            'status'    => 200,
            $_SESSION['message']        = "Berhasil menghapus data",
            $_SESSION['message_type']   = "success",
            'item'      => $dataBarang
        );
    } else {
        $respon = array(
            'message'   => "Failed",
            'status'    => 400,
            'item'      => $dataBarang
        );
    }

    echo json_encode($respon);

    header("Location: ../dashboard_barang.php");

?>