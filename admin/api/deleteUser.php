<?php

    session_start();

    $conn = mysqli_connect("localhost", "root", "", "db_ecommerce");

    $dataUser = 
        [
            'id'    => $_POST['id']         
        ];

    $item = [];

    $sql    = "DELETE FROM tbl_registrasi WHERE id = '$dataUser[id]'";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        $respon = array(
            'message'   => "Success",
            'status'    => 200,
            $_SESSION['message']        = "Berhasil menghapus data",
            $_SESSION['message_type']   = "success",
            'item'      => $dataUser
        );
    } else {
        $respon = array(
            'message'   => "Failed",
            'status'    => 400,
            'item'      => $dataUser
        );
    }

    echo json_encode($respon);

    header("Location: ../dashboard_user.php");

?>