<?php
require_once ("filetypes.php");
require_once ("checador.php");



function fazerChecagem($assignment) {
    $diretorio = "files/" . $assignment;
    $PDFdiretorio = "filesPDF/" . $assignment;
    $Checador = new checador();
    $PDFdatabase = array_values(array_diff(scandir($PDFdiretorio), array('.', '..') ));

    for ($i = 0; $i< sizeof($PDFdatabase); $i++){
        $filePDF = new PDFfile();
        $filePDF->pdf2txt($assignment, $PDFdatabase[$i]);
    }

    $database = array_values(array_diff(scandir($diretorio), array('.', '..') ));

    for ($i = 0; $i< sizeof($database); $i++){
        $file = new txtfile($assignment, $database[$i]);
        $Checador->checar($file);
    }

}


