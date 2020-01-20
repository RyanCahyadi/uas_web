<?php

    session_start();

    $conn = mysqli_connect("localhost", "root", "", "db_ecommerce");

    $item = [];

    $dataTransaksi = 
        [
            'nama_barang'       => htmlspecialchars($_POST['nama_barang']),
            'nama_customer'     => htmlspecialchars($_POST['nama']),
            'email'             => htmlspecialchars($_POST['email']),
            'no_handphone'      => htmlspecialchars($_POST['no_handphone']),
            'qty'               => htmlspecialchars($_POST['qty']),
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

        header("Location: http://localhost/kampus/uts_ecommerce/login.php");

    } else {
        $sql        = "INSERT INTO tbl_pesanan (alamat, qty, metode_pembayaran, email, no_handphone, nama, nama_barang) VALUES ('$dataTransaksi[alamat]', '$dataTransaksi[qty]', '$dataTransaksi[metode_pembayaran]' , '$dataTransaksi[email]' , '$dataTransaksi[no_handphone]', '$dataTransaksi[nama_customer]', '$dataTransaksi[nama_barang]')";
        $result     = mysqli_query($conn, $sql);
        $item       = $dataTransaksi;

        $respon = array(
            'message'   => "Success",
            'status'    => 200,
            'item'      => $dataTransaksi
        );
        
        //echo json_encode($respon);

        echo "
                <script> 
                    alert('Permintaan anda akan kami proses, dan barang akan segera dikirim');
                    document.location.href = 'http://localhost/kampus/uts_ecommerce/index.php';
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