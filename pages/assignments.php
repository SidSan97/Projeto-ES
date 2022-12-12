<?php

if(!isset($_SESSION['cliente_autenticado']))
{
    header('location: ../admin/App/View/login.php');
}

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

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

        <style>
            .formu button
            {
                width: 200px;
            }
        </style>
    </head>
    <body>
      <div class="container">
        <br>
        <h1>Atividades</h1>
    XYZ;

    $part2 = <<<XYZ
        <p></p>
        <a href="../index.php">Voltar</a>

        </div>
        <!-- Bootstrap -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> 
    </body>
    </html>
    XYZ;

    for ($i=0; $i<sizeof($database); $i++){
        array_push($table, array("<form class='form-group formu' action='../{$database[$i]}.php'><button class='btn btn-success' type='submit' name='submit'>{$database[$i]}</button></form>"));
    }

    echo $part1;
    echo makeTable($table);
    echo $part2;
    
}

displayAssignments()

?>