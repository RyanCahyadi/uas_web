<?php

    session_start();
    session_destroy();
    session_unset();

    header("Location: http://localhost/uas_web/index.php");

?>