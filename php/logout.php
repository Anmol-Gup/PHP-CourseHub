<?php
    session_start();

    // setcookie('emailcookie',NULL);
    // setcookie('passwordcookie',NULL);
    session_destroy();

    header('location:index.php');
?>