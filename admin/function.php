<?php

    $conn = mysqli_connect("localhost", "root", "", "db_ecommerce");

    function loginAdmin($data)
    {
        session_start();
     
        global $conn;
        $email      = htmlspecialchars($data['email']);
        $password   = sha1($data['password']);

        $result     = mysqli_query($conn, "SELECT * FROM tbl_login WHERE email = '$email' AND password = '$password'");

        if (mysqli_num_rows($result) == 1) {
            $_SESSION['login'] = "Admin";
            $_SESSION['message'] = "Hello selamat datang";
            $_SESSION['message_type'] = "success";
            header("Location: dashboard.php");
            exit();
        } else {
            $_SESSION['message'] = "Email atau password anda salah !";
            $_SESSION['message_type'] = "danger";
            header("Location:index.php");
            // echo "<script> 
            //     alert('Email atau password anda salah !');
            //     document.location.href = 'index.php';
            // </script>";
        }
    }
    
?>