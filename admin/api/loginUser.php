<?php

    $conn = mysqli_connect("localhost", "root", "", "db_ecommerce");
    session_start();

    $dataUser = 
    [
        'email'     => htmlspecialchars($_POST['email']),
        'password'  => htmlspecialchars(sha1($_POST['password']))
    ];

    $result     = mysqli_query($conn, "SELECT * FROM tbl_registrasi WHERE email = '$dataUser[email]' AND password = '$dataUser[password]'");
    $data       = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['no_handphone'] = $data['no_handphone'];
        $_SESSION['message'] = "Hello selamat datang";
        $_SESSION['message_type'] = "success";
        header("Location: http://localhost/kampus/uts_ecommerce/index.php");
        exit();
    } 
    else {
        $_SESSION['message'] = "Email atau password anda salah !";
        $_SESSION['message_type'] = "danger";
        header("Location: http://localhost/kampus/uts_ecommerce/login.php");
    //         // echo "<script> 
    //         //     alert('Email atau password anda salah !');
    //         //     document.location.href = 'index.php';
    //         // </script>";
    }
    
?>