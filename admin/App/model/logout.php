<?php
    session_start();
    unset($_SESSION['nome_cliente']);
    unset($_SESSION['id_cliente']);
    session_destroy();

    header('location: ../../../index.php');

    exit();