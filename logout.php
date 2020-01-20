<?php

    session_start();
    session_destroy();
    session_unset();

    header("Location: http://localhost/kampus/uts_ecommerce/index.php");

?>