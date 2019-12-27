<?php

    $conn = mysqli_connect("localhost", "root", "", "db_ecommerce");

    $sql        = "SELECT * FROM tbl_barang ORDER BY nama_barang ASC";
    $result     = mysqli_query($conn, $sql);
    $row        = mysqli_num_rows($result);
    $item       = [];

    if ($row > 0) {
        while ( $data = mysqli_fetch_assoc($result) ) {
            $item[] = array(
                'id'                    => $data['id'],
                'nama_barang'           => $data['nama_barang'],
                'harga_barang'          => $data['harga_barang'],
                'stok_barang'           => $data['stok_barang'],
                'deskripsi_barang'      => $data['deskripsi_barang'],
                'gambar'                => $data['gambar']
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