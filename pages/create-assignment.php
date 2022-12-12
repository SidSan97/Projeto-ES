<?php
    session_start();
   
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

            <!-- Bootstrap -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        </head>

        <body>
            <div class="container">
                <H1>Criar nova atividade</H1>
                <section  class="form-group">
                    <form action="#" method="post">
                        <!--replace the action at some point-->

                        <label for="title">Título:</label>
                        <input type="text" class="form-control" id="title" name="assignmentTitle" />

                        <p></p>
                            
                        <label for="description">Descrição:</label>
                        <p></p>
                        <textarea class="form-control" name="description"></textarea>
                            
                        <p></p>

                        <input class="btn btn-primary" type="submit" value="Criar Atividade" name="submit">

                    </form>

                </section>
                <p></p>
                <button class="btn btn-success"><a class="text-light" href="../index.php">Voltar</a></button>

                <!-- Bootstrap -->
                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> 
            </div>
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

        copy("../admin/assignment.php", "../{$name}.php");
        copy("../admin/App/View/uploadTarefa.php", "../pages/{$name}/App/View/upload-{$name}.php");
        copy("../admin/App/css/uploadTarefa.css", "../pages/{$name}/App/css/upload{$name}.css");
        copy("../admin/App/controller/UploadTarafefasBack.php", "../pages/{$name}/App/controller/upload-back-{$name}.php");

        header("Location: ../{$name}.php");
        exit();
    }


}

if(isset($_SESSION['cliente_autenticado']))
    CreateAssignment();
else
    header('location: ../admin/App/View/login.php');

?>
