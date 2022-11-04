<?php

include('../model/Conexao.php');
include('../model/Logar.php');

if(isset($_POST['entrar']))
{
    $login = $_POST['email'];
    $senha = $_POST['senha'];

    $fazerLogin = new Logar;

    $fazerLogin->logar($login, $senha);

    if($fazerLogin === true)
    {
        header('location: ../../index.php');
    }
    else
        header('location: ../../index.php?errorLogin');
}