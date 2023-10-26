<?php

    UNSET( $_SESSION['login']);
    UNSET( $_SESSION['username']);
    UNSET($_SESSION['message_pass']);
    $_SESSION['message_pass'] = " ";
    header("Location: ../login.php");
?>