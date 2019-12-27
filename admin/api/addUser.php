<?php

    session_start();

    $conn = mysqli_connect("localhost", "root", "", "db_ecommerce");

    $item = [];

    $dataUser = 
        [
            'nama'          => htmlspecialchars($_POST['nama']),
            'email'         => htmlspecialchars($_POST['email']),
            'no_handphone'  => htmlspecialchars($_POST['no_handphone']),
            'password'      => sha1($_POST['password'])
        ];

    if ($dataUser['nama'] == null or $dataUser['email'] == null or $dataUser['no_handphone'] == null or $dataUser['password'] == null) {
        $respon = array(
            'message'   => "Failed",
            'status'    => 400,
            'item'      => "Data input not null"
        );
    } else {
        $sql        = "INSERT INTO tbl_registrasi (nama, email, no_handphone, password) VALUES ('$dataUser[nama]', '$dataUser[email]', '$dataUser[no_handphone]', '$dataUser[password]')";
        $result     = mysqli_query($conn, $sql);
        $item       = $dataUser;

        $respon = array(
            'message'   => "Success",
            'status'    => 200,
            $_SESSION['message']        = "Berhasil menambah data",
            $_SESSION['message_type']   = "success",
            'item'      => $dataUser
        );
    }

    echo json_encode($respon);

    header("Location: ../dashboard_user.php");

?>