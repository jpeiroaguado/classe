<?php
// Inicialitzar variables
$target_dir = "./uploads/";
$uploadOk = 1;
$message = "";

// Verificar si el formulari s'ha enviat
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Comprovar si el fitxer és realment una imatge
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        $message = "L'arxiu és una imatge - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $message = "L'arxiu no és una imatge.";
        $uploadOk = 0;
    }

    // Comprovar si l'arxiu ja existeix
    if (file_exists($target_file)) {
        $message = "Ho sentim, el fitxer ja existeix.";
        $uploadOk = 0;
    }

    // Comprovar la mida del fitxer (límit a 2MB)
    if ($_FILES["fileToUpload"]["size"] > 2000000) {
        $message = "Ho sentim, el fitxer és massa gran.";
        $uploadOk = 0;
    }

    // Permetre només certs formats d'imatge
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $message = "Ho sentim, només s'accepten formats JPG, JPEG, PNG i GIF.";
        $uploadOk = 0;
    }

    // Comprovar si tot està bé abans de pujar
    if ($uploadOk == 0) {
        $message .= " El fitxer no s'ha pujat.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $message = "El fitxer " . basename($_FILES["fileToUpload"]["name"]) . " s'ha pujat correctament.";
        } else {
            $message = "Ho sentim, hi ha hagut un error en pujar el fitxer.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Pujar una imatge</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css" />
</head>
<body>
<main class="container">

<h2>Formulari per pujar una foto</h2>

<!-- Formulari d'upload -->
<form action="pujarImatge.php" method="post" enctype="multipart/form-data">
    Selecciona la imatge que vols pujar:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <br><br>
    <input type="submit" value="Pujar Imatge" name="submit">
</form>

<!-- Missatge de resultats -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<p>$message</p>";
    echo "<img src=\"$target_file\" />";
}
?>
</main>
</body>
</html>
