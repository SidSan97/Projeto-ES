<?php
session_start();

if(!isset($_SESSION['cliente_autenticado']))
    header('location: admin/App/View/login.php');

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
    </head>
    <body>
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
?>