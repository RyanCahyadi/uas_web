<?php 

session_start();

$conn = mysqli_connect("localhost", "root", "", "db_ecommerce");

    $item = [];

    $dataRegistrasi = 
        [
            'nama'          => htmlspecialchars($_POST['nama']),
            'email'         => htmlentities($_POST['email']),
            'password'      => htmlspecialchars(sha1($_POST['password'])),
            'no_handphone'  => htmlspecialchars($_POST['no_handphone']),
            'tgl_lahir'     => htmlspecialchars($_POST['tgl_lahir']),
            'jenis_kelamin' => htmlspecialchars($_POST['jenis_kelamin'])
        ];
    
    $sql    = "INSERT INTO tbl_registrasi (nama, email, password, no_handphone, tgl_lahir, jenis_kelamin) VALUES ('$dataRegistrasi[nama]', '$dataRegistrasi[email]', '$dataRegistrasi[password]', '$dataRegistrasi[no_handphone]', '$dataRegistrasi[tgl_lahir]', '$dataRegistrasi[jenis_kelamin]')";
    $result = mysqli_query($conn, $sql);
    $item   = $dataRegistrasi;
    $respon = array(
        'message'   => "Success",
        'status'    => 200,
        'item'      => $dataRegistrasi,
        $_SESSION['message'] = "Berhasil register !",
        $_SESSION['message_type'] = "success"
    );

    echo json_encode($respon);

    header("location:http://localhost/kampus/uts_ecommerce/register.php");

?>