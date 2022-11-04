<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/forms.css">
        
</head>


<body>
    <h1>Criar Conta</h1>
    <section id="new-user" method="post">
        <form action="">
            <!--replace the action at some point-->
            <div>
                <label for="user">Email:</label>
                <input type="email" id="user" name="userEmail" />
            </div>
            <p></p>
            <div>
                <label for="password">Senha:</label>
                <input type="password" id="user-password" name="userPassword" />
            </div>
            <p></p>
            <div>
                <label for="class-name">Nome da Turma:</label>
                <input type="text" id="class-name" name="className">
            </div>
            <p></p>
            <div class="button">
                <input type="submit">
            </div>
        </form>

    </section>
</body>



</html>