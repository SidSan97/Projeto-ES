<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Assignment</title>
    <link rel="stylesheet" href="css/forms.css">
</head>

<body>
    <H1>Criar nova atividade</H1>
    <section id="new-assignment" method="post">
        <form action="submited-assignment(??)">
            <!--replace the action at some point-->
            <div>
                <label for="title">Título:</label>
                <input type="text" id="title" name="assignmentTitle" />
            </div>
            <p></p>
            <div>
                <label for="expiration">Prazo:</label>
                <input type="date" id="expiration-date" name="expirationAssignment" />
            </div>
            <p></p>
            <div>
                <label for="description">Description:</label>
                <textarea id="desc" name="assignmentDesc"></textarea>
            </div>
            <p></p>
            <div class="button">
                <input type="submit" value="criar atividade">
            </div>
        </form>

    </section>
</body>

</html>