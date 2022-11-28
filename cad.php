<?php
namespace App\Models\Conexao;

include('App/model/Conexao.php');
use App\Models\Conexao;


/*class CadUsuario extends Conexao
{
    private $nome;
    private $email;
    private $senha;
    private $conexao;

    public function __construct() 
    {
      $this->conexao = new Conexao();
      $this->nome  = "Professor 1";
      $this->email = "admin@email.com";
      $this->senha = "admin123";
    }



}*/

$nome  = "Ivan";
$email = "prof1@email.com";
$senha = "admin012";

$senha2 = password_hash($senha, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (nome, email, senha) VALUES 
                    ('".$nome."','".$email."', '".$senha2."')";

$con = new Conexao();
//$executa = mysqli_query($conn, $sql);

if($conn->query($sql)) 
    die("inseriu");
else
    die("n inseriu");
