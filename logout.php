<?php

    session_start();
    // session_destroy();
    unset($_SESSION['nama']);

    header("Location: http://localhost/uas_web/index.php");

?>