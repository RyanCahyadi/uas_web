<?php 

session_start();

$conn = mysqli_connect("localhost", "root", "", "db_ecommerce");

    $item = [];

    $dataContact = 
        [
            'email'         => htmlspecialchars($_POST['email']),
            'description'   => htmlspecialchars($_POST['description'])
        ];
    
    $sql    = "INSERT INTO tbl_contact (email, description) VALUES ('$dataContact[email]', '$dataContact[description]')";
    $result = mysqli_query($conn, $sql);
    $item   = $dataContact;
    $respon = array(
        'message'   => "Success",
        'status'    => 200,
        'item'      => $dataContact,
        $_SESSION['message'] = "Pesan anda akan kami proses !",
        $_SESSION['message_type'] = "success"
    );

    echo json_encode($respon);

    header("location:http://localhost/kampus/uts_ecommerce/contact.php");

?>