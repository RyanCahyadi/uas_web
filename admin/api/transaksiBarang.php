<?php

    session_start();

    $conn = mysqli_connect("localhost", "root", "", "db_ecommerce");

    $item = [];

    $dataTransaksi = 
        [
            'nama_barang'       => htmlspecialchars($_POST['nama_barang']),
            'nama_customer'     => htmlspecialchars($_POST['nama_customer']),
            'email'             => htmlspecialchars($_POST['email']),
            'no_handphone'      => htmlspecialchars($_POST['no_handphone']),
            'qty'               => htmlspecialchars($_POST['qty']),
            'grand_total'       => htmlspecialchars($_POST['harga_barang']) * htmlspecialchars($_POST['qty']),
            'metode_pembayaran' => htmlspecialchars($_POST['metode_pembayaran']),
            'alamat'            => htmlspecialchars($_POST['alamat'])
        ];

    if ($_SESSION['nama'] == NULL) {
        $respon = array(
            'message'   => "Silahkan login dulu",
            'status'    => 200,
            'item'      => $dataTransaksi,
            $_SESSION['message']        = "Silahkan login terlebih dahulu",
            $_SESSION['message_type']   = "warning"
        );

        header("Location: http://localhost/uas_web/login.php");

    } else {
        $sql        = "INSERT INTO tbl_pesanan (nama_barang, nama, email, no_handphone, qty, grand_total, metode_pembayaran, alamat) VALUES 
        ('$dataTransaksi[nama_barang]', '$dataTransaksi[nama_customer]', '$dataTransaksi[email]', '$dataTransaksi[no_handphone]', '$dataTransaksi[qty]', 
        '$dataTransaksi[grand_total]', '$dataTransaksi[metode_pembayaran]', '$dataTransaksi[alamat]')";
        $result     = mysqli_query($conn, $sql);
        $item       = $dataTransaksi;

        // if ($result) {
        //     echo "Hello berhasil";
        // } else {
        //     echo mysqli_error($conn);
        // }

        $respon = array(
            'message'   => "Success",
            'status'    => 200,
            'item'      => $dataTransaksi
        );

        // echo json_encode($respon);

        echo "
                <script> 
                    alert('Permintaan anda akan kami proses, dan barang akan segera dikirim');
                    document.location.href = 'http://localhost/uas_web/index.php';
                </script>
             ";
    }
    
    // else {
    //     $sql        = "INSERT INTO tbl_pesanan (alamat, qty, metode_pembayaran, email, no_handphone, nama, nama_barang) VALUES ('$dataTransaksi[alamat]', '$dataTransaksi[qty]', '$dataTransaksi[metode_pembayaran]' , '$dataTransaksi[email]' , '$dataTransaksi[no_handphone]', '$dataTransaksi[nama_customer]', '$dataTransaksi[nama_barang]')";
    //     $result     = mysqli_query($conn, $sql);
    //     $item       = $dataUser;

    //     $respon = array(
    //         'message'   => "Success",
    //         'status'    => 200,
    //         $_SESSION['message']        = "Berhasil menambah data",
    //         $_SESSION['message_type']   = "success",
    //         'item'      => $dataUser
    //     );
    // }

?>