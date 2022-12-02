<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/uploadTarefa.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Upload</title>
</head>

<body>
    
    <h2 class="titulo">Faça aqui seu upload</h2>

    <div class="container">
        <form action="../Controller/UploadTarafefasBack.php" enctype="multipart/form-data" method="POST">
            <div class="form-group">
                <label for="tituloTarefa">Informe o título da tarefa</label>
                <input type="text" class="form-control" name="tituloTarefa" id="tituloTarefa" required>
            </div>

            <div class="form-group">
                <label for="descricaoTarefa">Descrição da tarefa</label>
                <textarea class="form-control" id="descricaoTarefa" name="descricaoTarefa" rows="3" required></textarea>
            </div>

            <div class="form-group">
                <label for="uploadTarefa">Upload da tarefa</label>
                <input type="file" class="form-control-file" name="uploadTarefa" id="uploadTarefa">
            </div>

            <button class="btn btn-primary" type="submit" name="enviar">Enviar</button>
        </form>
    </div>

    <!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> 
</body>
</html>