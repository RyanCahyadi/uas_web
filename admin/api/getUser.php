<?php

    $conn = mysqli_connect("localhost", "root", "", "db_ecommerce");

    $sql        = "SELECT * FROM tbl_registrasi ORDER BY nama ASC";
    $result     = mysqli_query($conn, $sql);
    $row        = mysqli_num_rows($result);
    $item       = [];

    if ($row > 0) {
        while ( $data = mysqli_fetch_assoc($result) ) {
            $item[] = array(
                'id'            => $data['id'],
                'nama'          => $data['nama'],
                'email'         => $data['email'],
                'no_handphone'  => $data['no_handphone'],
                'password'      => $data['password'],
                'tgl_lahir'     => $data['tgl_lahir'],
                'jenis_kelamin' => $data['jenis_kelamin']
            );
        }

        $respon = array(
            'message'   => "Success",
            'status'    => 200,
            'item'      => $item
        );

    } else { 
        $respon = array(
            'message'   => "Failed",
            'status'    => 400,
            'item'      => $item
        );
    }

    echo json_encode($respon);

?>