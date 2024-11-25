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

<?php //Obtenim en quina página estem per a que ens pinte el menu
        $current_page = basename($_SERVER['PHP_SELF']); 
        ?>
    <ul>
        <?php if(isset($_SESSION['usuari'])) {?>
            <?php if ($current_page != 'index.php') { ?>
                <li><a href="index.php">Tornar al Index</a></li>
            <?php } ?>

            <?php if ($current_page != 'editarmapa.php') { ?>
                <li><a href="editarmapa.php">Afegir nou mapa</a></li>
            <?php } ?>

            <li><a href="logout.php">Tancar sessió</a></li>
        <?php } else { ?>
            <?php if ($current_page != 'login.php') { ?>
                <li><a href="login.php">Accedir</a></li>
            <?php } ?>
            <?php if ($current_page != 'registre.php') { ?>
                <li><a href="registre.php">Registrarse</a></li>
            <?php } ?>
            <?php if ($current_page != 'index.php') { ?>
                <li><a href="index.php">Accedir sense loguejarse</a></li>
            <?php } ?>
        <?php } ?>
    </ul>
</header>

<!-- Contenido principal de la página -->

   

