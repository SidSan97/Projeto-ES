<?php

namespace App\Models;
session_start();
use App\Models\Conexao;

class FazerUpload extends Conexao
{
    public function fazerUpload($upload)
    {
        $formatosPermitidos = array("txt", "TXT", "PDF", "pdf");
        $extensao = pathinfo($upload['name'], PATHINFO_EXTENSION);
    
        if(in_array($extensao, $formatosPermitidos) || ($extensao == ""))
        {
            if($extensao == "TXT" || $extensao == "txt")
                $pasta = "../../files/assignment 1/";
            else
                $pasta = "../../filesPDF/assignment 1/";
    
            $temporario = $upload['tmp_name'];
            $novoNome   = $upload['name'];
    
            if(!move_uploaded_file($temporario, $pasta.$novoNome))
            {
                echo '<script>alert("Não foi possivel fazer o upload")</script>';
                return false;
            }
            else
            {
                move_uploaded_file($temporario, $pasta.$novoNome); 
                echo "<script>alert('Upload feito com sucesso!');/*location.href=\"../view/uploadTarefa.php\";*/</script>";
                return true;

            }      
           
        }
        else 
        {
         echo "<script>alert('O formato $extensao não é permitido');/*location.href=\"../view/uploadTarefa.php\";*/</script>";
         return false;
        }
    }
}
