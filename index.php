<?php
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
    <title>Menu</title>
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Menu do Professor</title>
    </head>
    <body>
        <h1>Menu</h1>

        <a href="pages/create-assignment.php"><button>Criar nova atividade</button></a>
        <a href="pages/assignments.php"><button>Lista de atividades</button></a>
        
    </body>
    </html>

</body>
</html>
    




