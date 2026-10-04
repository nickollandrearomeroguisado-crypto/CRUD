<?php

function validarSession() {
    // session_destroy();
    session_start();
    if (!isset($_SESSION['Cedula'])) {
        header("Location: ../../index.php");
    }
}

function debug($arg) {
    echo "<pre>";
    var_dump($arg);
    echo "</pre>";
    exit;
}