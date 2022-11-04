<?php

class Logar
{
    private $conexao;

    public function __construct() 
    {
      $this->conexao = new Conexao();
    }

    // efetua login
    public function logar($login, $senha) 
    {

      $sql = "SELECT * FROM usuarios WHERE email = '$login' AND senha = '$senha'";

      $executa = mysqli_query($this->conexao->getCon(), $sql);

      if(mysqli_num_rows($executa) > 0) 
      {
        session_start();
        $_SESSION['logado'] = true;
        $_SESSION['nivel']  = "admin";
        return true;
      } 
      else 
      {
        return false;
      }
    }
}