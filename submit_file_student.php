<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Submission</title>
</head>


<body>
    <H1>Submissão de resposta</H1>

    <section id="file-submission">
        <form action="/submited-page(??)"> <!--replace the action at some point-->
            <label for="file-submit" style="display: block; font: 1rem 'Fira Sans', sans-serif;">submeta sua resposta aqui:</label>
            <input type="file" id="file-submission" name="submited-file" accept=".txt, .pdf" style="margin: .4rem 0;">
            <p></p>
            <input type="submit">
        </form>
    </section>
</body>

</html>