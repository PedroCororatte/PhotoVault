<?php
$imageDirectory = "images/";
$images = glob($imageDirectory . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>PhotoVault</title>
</head>

<body>
    <div class="gallery">
        <?php
            foreach($images as $image):?>
        <a href="<?php echo htmlspecialchars($image); ?>" target="_blank">
                <img src="<?php echo htmlspecialchars($image); ?>" alt="image">
        <?php endforeach;?>
    </div>

</body>

</html>