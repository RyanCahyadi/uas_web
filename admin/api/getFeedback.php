<?php

    $conn = mysqli_connect("localhost", "root", "", "db_ecommerce");

    $sql        = "SELECT * FROM tbl_contact";
    $result     = mysqli_query($conn, $sql);
    $row        = mysqli_num_rows($result);
    $item       = [];

    if ($row > 0) {
        while ( $data = mysqli_fetch_assoc($result) ) {
            $item[] = array(
                'id'            => $data['id'],
                'email'         => $data['email'],
                'description'  => $data['description']
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