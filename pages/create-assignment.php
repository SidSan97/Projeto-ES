<?php
function CreateAssignment(){
    $form = <<<XYZ
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
            <section>
                <form action="#" method="post">
                    <!--replace the action at some point-->

                    <label for="title">Título:</label>
                    <input type="text" id="title" name="assignmentTitle" />

                    <p></p>
                        
                    <label for="description">Descrição:</label>
                    <p></p>
                    <textarea name="description"></textarea>
                        
                    <p></p>

                    <input type="submit" value="Criar Atividade" name="submit">

                </form>

            </section>
            <p></p>
            <a href="../index.php">Voltar</a>
        </body>

        </html>
    XYZ;


    echo $form;
    if (isset($_POST['submit'])) {
        $name = $_POST['assignmentTitle'];
        @mkdir("../files/{$name}");
        @mkdir("../filesPDF/{$name}");
        @mkdir("../pages/{$name}/App/View", 7, 1);
        @mkdir("../pages/{$name}/App/css", 7, 1);
        @mkdir("../pages/{$name}/App/controller", 7, 1);

        $content = $_POST['description'];
        $file = fopen("../files/{$name}/readme.txt", "w");
        fwrite($file, $content);

        copy("../models/assignment.php", "../{$name}.php");
        copy("../models/App/View/uploadTarefa.php", "../pages/{$name}/App/View/upload-{$name}.php");
        copy("../models/App/css/uploadTarefa.css", "../pages/{$name}/App/css/upload{$name}.css");
        copy("../models/App/controller/UploadTarafefasBack.php", "../pages/{$name}/App/controller/upload-back-{$name}.php");

        header("Location: ../{$name}.php");
        exit();
    }


}

CreateAssignment();

?>
