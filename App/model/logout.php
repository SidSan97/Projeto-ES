<?php
session_start();
unset($_SESSION['cliente_autenticado']);
session_destroy();
header('Location: ../../index.php');
exit();

//FUNÇÃO PARA DESLOGAR USUÁRIO