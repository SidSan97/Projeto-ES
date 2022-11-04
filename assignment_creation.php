<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Assignment</title>
    <style type="text/css">
        form {
            margin: 0 auto;
            width: 400px;
            padding: 1em;
            border: 1px solid #ccc;
            border-radius: 1em;
        }


        label {
            display: inline-block;
            width: 90px;
            text-align: right;
        }

        input,
        textarea {
            font: 1em sans-serif;

            width: 300px;
            box-sizing: border-box;

            border: 1px solid #999;
        }

        input:focus,
        textarea:focus {
            border-color: #000;
        }

        textarea {
            vertical-align: top;

            height: 5em;
        }

        .button {
            padding-left: 90px;
        }

        button {
            margin-left: 0.5em;
        }
    </style>
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
                <input type="submit">
            </div>
        </form>

    </section>
</body>

</html>