<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <script src="js/login.js"></script>

    <title>Login</title>
</head>
<body>
    <h1 class="titulo">Faça seu login</h1>

    <form action="App/Controller/LoginController.php" method="POST" class="form">
        <div style="display: flex; justify-content: center">
            <div class="div-login">
                <h2>LOGIN</h2>
        
                <input type="email" name="email" id="email" placeholder="Nome de usuário">
                
                <input type="password" name="senha" id="senha" placeholder="Digite sua senha">
            </div>
        </div>

        <div style="display: flex; justify-content: center">
            <button class="btn-login" type="submit" name="logar">ENTRAR</button>
        </div>
    </form>

    <?php
      if(isset($_GET['errorLogin'])):
    ?>
		<div class="notification">
			<p align="center">ERRO: Usuário ou senha inválidos.</p>
		</div>
                    
    <?php
        endif;
        unset($_SESSION['nao_autenticado']);
    ?>
</body>
</html>