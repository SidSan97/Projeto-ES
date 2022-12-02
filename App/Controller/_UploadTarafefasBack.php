<?php

if(isset($_POST['enviar']))
{
    $formatosPermitidos = array("txt", "TXT", "PDF", "pdf");
    $extensao = pathinfo($_FILES['uploadTarefa']['name'], PATHINFO_EXTENSION);

    if(in_array($extensao, $formatosPermitidos) || ($extensao == ""))
    {
        if($extensao == "TXT" || $extensao == "txt")
            $pasta = "../../files/assignment 1/";
        else
            $pasta = "../../filesPDF/assignment 1/";

        $temporario = $_FILES['uploadTarefa']['tmp_name'];
        $novoNome   = $_FILES['uploadTarefa']['name'];

        if(!move_uploaded_file($temporario, $pasta.$novoNome))
        {
            echo '<script>alert("Não foi possivel fazer o upload")</script>';
        }
        else
        {
            move_uploaded_file($temporario, $pasta.$novoNome); 
            echo "<script>alert('Upload feito com sucesso!');location.href=\"../view/uploadTarefa.php\";</script>";
        }      
       
    }
    else 
    {
     echo "<script>alert('O formato $extensao não é permitido');location.href=\"../view/uploadTarefa.php\";</script>";
    }
}