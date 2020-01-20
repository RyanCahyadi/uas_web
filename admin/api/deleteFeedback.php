<?php

    session_start();

    $conn = mysqli_connect("localhost", "root", "", "db_ecommerce");

    $dataFeedback = 
        [
            'id'    => $_POST['id']         
        ];

    $item = [];

    $sql    = "DELETE FROM tbl_contact WHERE id = '$dataFeedback[id]'";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        $respon = array(
            'message'   => "Success",
            'status'    => 200,
            $_SESSION['message']        = "Berhasil menghapus data",
            $_SESSION['message_type']   = "success",
            'item'      => $dataFeedback
        );
    } else {
        $respon = array(
            'message'   => "Failed",
            'status'    => 400,
            'item'      => $dataFeedback
        );
    }

    echo json_encode($respon);

    header("Location: ../dashboard_feedback.php");

?>