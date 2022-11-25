<?php

use App\Models\Logar;

include('../model/Conexao.php');
include('../model/Logar.php');

if(isset($_POST['logar']))
{
    $fazerLogin = new Logar();

    $login = $_POST['email'];
    $senha = $_POST['senha'];

    $fazerLogin->validarLogin($login, $senha);


    if($fazerLogin == true)
    {
        header('location: ../../index.php');
    }
    else
        header('location: ../../login.php?errorLogin');
}