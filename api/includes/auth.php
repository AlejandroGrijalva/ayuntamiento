<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function requerirLogin() {
    if (!isset($_SESSION['logeado']) || $_SESSION['logeado'] !== true) {
        header("Location: login.php");
        exit;
    }
}


function logout() {
   
    $_SESSION = [];
    session_unset();
    session_destroy();
    // Redirigir al login
    header("Location: login.php");
    exit;
}
?>