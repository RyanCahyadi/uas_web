<?php

    $conn = mysqli_connect("localhost", "root", "", "db_ecommerce");

    $sql        = "SELECT * FROM tbl_pesanan";
    $result     = mysqli_query($conn, $sql);
    $row        = mysqli_num_rows($result);
    $item       = [];

    if ($row > 0) {
        while ( $data = mysqli_fetch_assoc($result) ) {
            $item[] = array(
                'id'                => $data['id'],
                'nama_customer'     => $data['nama'],
                'nama_barang'       => $data['nama_barang'],
                'qty_barang'        => $data['qty'],
                'grand_total'       => $data['grand_total'],
                'metode_pembayaran' => $data['metode_pembayaran'],
                'alamat'            => $data['alamat'],
                'email'             => $data['email'],
                'no_handphone'      => $data['no_handphone']
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