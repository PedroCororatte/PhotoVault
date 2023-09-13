<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Upload</title>
</head>

<body>
    <?php
    if (isset($_POST['send'])) {
        $imageDirectory = "images/";
        $targetFile = $imageDirectory.basename($_FILES["fileToUpload"]["name"]);
        $tmpFile = $_FILES["fileToUpload"]["tmp_name"];
        $checkFile = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

        if ($checkFile !== false) {
            // Move o arquivo para o diretório de destino
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
                echo "A imagem " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " foi enviada com sucesso.";
            } else {
                echo "Desculpe, houve um erro no envio do arquivo.";
            }
        } else {
            echo "O arquivo não é uma imagem válida.";
        }
    }
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        Selecione uma imagem para enviar:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="Submit" value="Enviar Imagem" name="send">
    </form>
    <a href="index.php" class="upload-button">
        Pagina inicial
    </a>
</body>

</html>