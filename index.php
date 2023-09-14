<?php
$imageDirectory = "images/";
$images = glob($imageDirectory . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>PhotoVault</title>
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
                                Inicio
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
            <main id="main-content" class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <h2 class="my-4">Galeria de Imagens</h2>
                <div class="row gallery">
                    <?php foreach ($images as $image) : ?>
                        <div class="col-md-2 col-sm-4 mb-1">
                            <div class="card">
                                <img src="<?php echo htmlspecialchars($image); ?>" class="card-img-top" alt="Imagem">
                                <div class="card-body">
                                    <p class="card-text">Descrição da imagem, autor, etc.</p>
                                    <a href="<?php echo htmlspecialchars($image); ?>" target="_blank" class="btn btn-primary btn-sm">Ver em Tamanho Completo</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </main>
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>
