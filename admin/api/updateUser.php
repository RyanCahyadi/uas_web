<?php

    session_start();

    $conn = mysqli_connect("localhost", "root", "", "db_ecommerce");

    $item = [];

    $dataUser = 
        [
            'id'            => $_POST['id'],
            'nama'          => htmlspecialchars($_POST['nama']),
            'email'         => htmlspecialchars($_POST['email']),
            'no_handphone'  => htmlspecialchars($_POST['no_handphone']),
            'password'      => sha1($_POST['password']),
            'tgl_lahir'     => htmlspecialchars($_POST['tgl_lahir']),
            'jenis_kelamin' => htmlspecialchars($_POST['jenis_kelamin'])
        ];

    if ($dataUser['nama'] == null or $dataUser['email'] == null or $dataUser['no_handphone'] == null or $dataUser['password'] == null) {
        $respon = array(
            'message'   => "Failed",
            'status'    => 400,
            'item'      => "Data input not null"
        );
    } else {
        $sql        = "UPDATE tbl_registrasi SET nama = '$dataUser[nama]', email = '$dataUser[email]', no_handphone = '$dataUser[no_handphone]', password = '$dataUser[password]', tgl_lahir = '$dataUser[tgl_lahir]', jenis_kelamin = '$dataUser[jenis_kelamin]' WHERE id = '$dataUser[id]'";
        $result     = mysqli_query($conn, $sql);
        $item       = $dataUser;

        $respon = array(
            'message'   => "Success",
            'status'    => 200,
            $_SESSION['message']        = "Berhasil meng-update data",
            $_SESSION['message_type']   = "success",
            'item'      => $dataUser
        );
    }

    echo json_encode($respon);

    header("Location: ../dashboard_user.php");

?>