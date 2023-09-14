<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Upload</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Barra Lateral -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <p class="display-6 text-primary">
                            PhotoVault
                        </p>
                        <li class="nav-item">
                            <a class="nav-link active text-light" href="index.php">
                                Início
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="upload.php">
                                Upload
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#">
                                Configurações
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Conteúdo Principal -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-center align-items-center flex-column" style="height: 100vh;">
                    <h1 class="mb-4">Upload de Imagem</h1>
                    
                    <!-- Prévia da imagem -->
                    <div id="imagePreview">
                        <img id="preview" src="#" alt="Prévia da imagem" class="img-thumbnail mb-4">
                    </div>

                    <form action="" method="post" enctype="multipart/form-data">
                        Selecione uma imagem para enviar:
                        <br><br>
                        <input type="file" name="fileToUpload" id="fileToUpload" onchange="previewImage()">
                        <input type="submit" value="Enviar Imagem" name="send" class="btn btn-primary">
                    </form>

                    <?php
                    if (isset($_POST['send'])) {
                        $imageDirectory = "images/";
                        $targetFile = $imageDirectory . basename($_FILES["fileToUpload"]["name"]);
                        $tmpFile = $_FILES["fileToUpload"]["tmp_name"];
                        $checkFile = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

                        if ($checkFile !== false) {
                            // Move o arquivo para o diretório de destino
                            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
                                echo '<div class="alert alert-success mt-4" role="alert">A imagem ' . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . ' foi enviada com sucesso.</div>';
                            } else {
                                echo '<div class="alert alert-danger mt-4" role="alert">Desculpe, houve um erro no envio do arquivo.</div>';
                            }
                        } else {
                            echo '<div class="alert alert-warning mt-4" role="alert">O arquivo não é uma imagem válida.</div>';
                        }
                    }
                    ?>
                </div>
            </main>
        </div>
    </div>

    <!-- Inclua os arquivos JavaScript do Bootstrap no final do corpo do documento -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
    function previewImage() {
        var preview = document.getElementById('preview');
        var fileInput = document.getElementById('fileToUpload');
        var file = fileInput.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block'; // Mostrar a prévia da imagem
        };

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = '#';
            preview.style.display = 'none'; // Ocultar a prévia da imagem
        }
    }
</script>

</body>

</html>
