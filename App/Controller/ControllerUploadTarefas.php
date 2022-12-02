<?php
use App\Models\FazerUpload;

include('../model/Conexao.php');
include('../model/UploadTarefasModel.php');

if(isset($_POST['enviar']))
{
    $upload = new FazerUpload;

    $tituloTarefa    = $_POST['tituloTarefa'];
    $descricaoTarefa = $_POST['descricaoTarefa'];
    $uploadTarefa    = $_FILES['uploadTarefa'];

    $upload->FazerUpload($uploadTarefa);

    if($upload === true)
    {
        
    }
}