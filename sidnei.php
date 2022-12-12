<?php
require_once("pages/responses.php");
require_once("checador/main.php");

$database = array_values(array_diff(scandir("files"), array('.', '..')));

for ($i=0; $i<sizeof($database);$i++){
    fazerChecagem($database[$i]);
}

$path = basename(__FILE__, '.php');
$content = file_get_contents("files/{$path}/readme.txt");


$pageName = ucfirst($path);
$page = <<<XYZ
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Atividades Enviadas</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="stylesheet" href="styles/styleTable.css">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    </head>
    <body>
      <div class="container-fluid">
        <h1>$pageName</h1>
        <p>Descrição da atividade: $content</p>
        <form action="#" method="post">
        <input type="submit" value="Upload Link" name="submit">
XYZ;

$page2 = <<<XYZ
    </form>
    <h2>Arquivos Enviados</h2>
XYZ;

echo $page;
if (isset($_POST['submit'])) {
    echo " localhost/pages/{$path}/app/view/upload-{$path}.php";
}
echo $page2;
displayReports($path);

echo '
</div>
        <!-- Bootstrap -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> 
    </body>
    </html>
';
?>