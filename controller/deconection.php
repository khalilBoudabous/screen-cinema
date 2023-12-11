<?php
    session_start();
    session_unset();
    session_destroy();
 
    $url = '\ff\login page\login.php';
    echo "<script>window.location.replace('$url');</script>";

    ?>
