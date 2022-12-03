<?php
require_once("responses.php");
function displayAssignments(){
    $database = array_values(array_diff(scandir("../files"), array('.', '..', 'readme.txt')));
    

    $table = [];
    
    $part1 = <<<XYZ
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Atividades</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
    </head>
    <body>
        <h1>Atividades</h1>
    XYZ;

    $part2 = <<<XYZ
        <p></p>
        <a href="../index.php">Voltar</a>
    </body>
    </html>
    XYZ;

    for ($i=0; $i<sizeof($database); $i++){
        array_push($table, array("<form action='../{$database[$i]}.php'><button type='submit' name='submit'>{$database[$i]}</button></form>"));
    }

    echo $part1;
    echo makeTable($table);
    echo $part2;
    
}

displayAssignments()

?>