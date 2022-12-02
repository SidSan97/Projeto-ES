<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    index
    <?php
        if(isset( $_SESSION['cliente_autenticado']) == true)
        {
            echo '<p><a href="App/Model/logout.php">sair</a></p>';
            echo 'logado';
        }
        else
        {
            echo '<p><a href="App/View/login.php">Logar</a></p>';
            echo 'n logado';
        }
    ?>
    
</body>
</html>