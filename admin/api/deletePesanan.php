<?php

    session_start();

    $conn = mysqli_connect("localhost", "root", "", "db_ecommerce");

    $dataPesanan = 
        [
            'id'    => $_POST['id']         
        ];

    $item = [];

    $sql    = "DELETE FROM tbl_pesanan WHERE id = '$dataPesanan[id]'";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        $respon = array(
            'message'   => "Success",
            'status'    => 200,
            $_SESSION['message']        = "Berhasil menghapus data",
            $_SESSION['message_type']   = "success",
            'item'      => $dataPesanan
        );
    } else {
        $respon = array(
            'message'   => "Failed",
            'status'    => 400,
            'item'      => $dataPesanan
        );
    }

    echo json_encode($respon);

    header("Location: ../dashboard_pesanan.php");

?>