<?php
session_start();
require_once("checador/main.php");
$database = array_values(array_diff(scandir("files"), array('.', '..')));

for ($i=0; $i<sizeof($database);$i++){
    fazerChecagem($database[$i]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Menu do professor</title>
</head>

<body>
   
    <div class="container-fluid">
        <br><br>
        <h1>Menu</h1>

        <button class="btn btn-primary"><a href="pages/create-assignment.php" class="text-light">Criar nova atividade</a></button>
        <button class="btn btn-primary"><a href="pages/assignments.php" class="text-light">Lista de atividades</a></button>

        <br><br>

        <?php
            if(isset($_SESSION['cliente_autenticado']))
            {
                echo 'você está logado como: '.$_SESSION['nome_professor'];
                echo '<br>';
                echo '<a href="admin/App/model/logout.php">sair</a>';
            }
            else
            {
                echo 'você não está logado!';
                echo '<br>';
                echo '<a href="admin/App/view/login.php">Logar</a>';
            }
        ?>
    </div>
    
    <!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> 
</body>
</html>
    




