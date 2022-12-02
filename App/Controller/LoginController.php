<?php

use App\Models\Logar;

include('../model/Conexao.php');
include('../model/Logar.php');

if(isset($_POST['logar']))
{
    $fazerLogin = new Logar();

    $login = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $senha = filter_var($_POST['senha'], FILTER_SANITIZE_SPECIAL_CHARS);

    $fazerLogin->validarLogin($login, $senha);


    if($fazerLogin == true)
    {
        header('location: ../../index.php');
    }
    else
        header('location: ../../login.php?errorLogin');
}