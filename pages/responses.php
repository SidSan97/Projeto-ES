<?php
function makeTable($data){
    $tbl_array = [];
    $tbl_array[] = "<table>";
    foreach ($data as $row) {
        $tbl_array[] = "<tr>";
        foreach ($row as $cell){
            $tbl_array[] = "<td>$cell</td>";
        }
        $tbl_array[] = "</tr>";
    }
    $tbl_array[] = "</table>";
    return implode('', $tbl_array); //returns table as a string
}

function displayReports($assignment) {
    $diretorio = "files/" . $assignment;
    $PDFdiretorio = "filesPDF/" . $assignment;
    $databaseTXT = array_values(array_diff(scandir($diretorio), array('.', '..', 'readme.txt') ));
    $PDFdatabase = array_values(array_diff(scandir($PDFdiretorio), array('.', '..', 'readme.txt') ));

    $database = array_merge($databaseTXT, $PDFdatabase);
    for ($i = 0; $i < sizeof($database); $i++){
        $element = str_replace(".txt", "", $database[$i]);
        $element = str_replace(".pdf", "", $element);
        $database[$i] = $element;
    }
    $database = array_unique($database);


    $table = [];
    for ($i = 0; $i < sizeof($database); $i++){
        array_push($table, array($database[$i], "enviado com sucesso"));
    }

    $pageName = ucfirst($assignment);
    $part1 = <<<XYZ
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Atividades Enviadas</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="stylesheet" href="styles/styleTable.css">
    </head>
    <body>
        <h1>$pageName</h1>
        <h2>Arquivos Enviados</h2>
    XYZ;

    $part2 = <<<XYZ
        <h2>Relatório de Similaridade</h2>
    XYZ;

    $part3 = <<<XYZ
        <p></p>
        <a href="pages/assignments.php">Voltar</a>
    </body>
    </html>
    XYZ;

    $report = Report($database, $assignment);

    //echo $part1;
    echo makeTable($table);
    echo $part2;
    echo makeTable($report);
    echo $part3;

}

function Report($data, $assignment) {
    sort($data);

    $copyData = $data;
    array_unshift($copyData, "");
    

    $reportTable = [];
    array_push($reportTable, $copyData);

    for ($i=0; $i<sizeof($data); $i++){
        $array1 = ReportLine($data, $assignment, $i);
        array_unshift($array1, $data[$i]);
        array_push($reportTable , $array1);
    }

    //echo '<pre>'; print_r($reportTable); echo '<pre/>';
    return $reportTable;

}

function ReportLine($data, $assignment, $i){
    sort($data);
    $arrayLine = [];

    $filename = ($data[$i] . ".csv");
    $filepath = ("scan results/" . $assignment . "/" . $filename);

    $file = fopen($filepath, "r");
    while (($line = fgetcsv($file)) !== false) {

        //array_push($arrayLine, array($line[1], $line[2]));
        array_push($arrayLine, number_format($line[2], 2));
        //echo var_dump($line);
    }
    return $arrayLine;
}



//displayReports("assignment 1");

?>

