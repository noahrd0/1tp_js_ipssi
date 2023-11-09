<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    session_destroy();
    echo $_SESSION['newsession'];
    header('location: ./connexion.php');
?>