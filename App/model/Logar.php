<?php
namespace App\Models;
session_start();
//include('Conexao.php');
use App\Models\Conexao;

class Logar extends Conexao
{
  public function validarLogin($login, $senha)
  {
      $conn = $this->connect();

      $sql  = "SELECT * FROM usuarios WHERE email =:email LIMIT 1";
      $stmt = $conn->prepare($sql);

      $stmt->bindParam(':email', $login);

      if($stmt->execute()) {

          if(($linha = $stmt->fetch(\PDO::FETCH_ASSOC))) {

              if(password_verify($senha, $linha['senha'])) {
                  $_SESSION['cliente_autenticado'] = true;
                  $_SESSION['id_professor'] = $linha['id'];
                  $_SESSION['nome_professor'] = $linha['nome'];

                  return true;
                  exit;
              }
              else 
              {                    
                session_destroy();
                $_SESSION['cliente_autenticado'] = false; 
                  
                return false;
                exit;
              }
          }
          else 
          {
            session_destroy();
            $_SESSION['cliente_autenticado'] = false; 
                  
            return false;
            exit;
          }
      }
      else 
      {
        session_destroy();
        $_SESSION['cliente_autenticado'] = false; 

        return false;
        exit;
      }
  }
}