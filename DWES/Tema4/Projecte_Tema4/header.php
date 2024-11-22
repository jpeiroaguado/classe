<?php include_once __DIR__.'/funcions.php'; ?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Web de Mapes">
    <meta name="author" content="Javier Peiro">
    <title>Mapes</title>
    <link rel="stylesheet" href="./css/estilos.css">
    
</head>
<body>

<!-- Checkbox oculto que controla el estado de expansión del header -->
<input type="checkbox" id="expand-toggle">

<!-- Botón de menú hamburguesa que despliega el header -->
<label for="expand-toggle" class="label-toggle">
    <div></div>
    <div></div>
    <div></div>
</label>

<!-- Contenido del header que se expande y contrae hacia arriba -->
<header class="header">
    <ul>
        <?php if(isset($_SESSION['usuari'])) { ?>
            <li><a href="editarmapa.php">Afegir nou mapa</a></li>
            <li><a href="logout.php">Tancar sessió</a></li>
        <?php } else { ?>
            <li><a href="login.php">Accedir</a></li>
            <li><a href="registre.php">Registrar-se</a></li>
        <?php } ?>
    </ul>
</header>

<!-- Contenido principal de la página -->

   


</body>
</html>