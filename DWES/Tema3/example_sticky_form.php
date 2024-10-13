<?php

//declaració de variables necessàries
$nom = '';
$cognom = '';
$direccion = '';
$localitat = '';
$email = '';
$preferencies = [];

//missatge d'error personalitzats
$msgErrorNom = '';
$msgErrorCognom = '';
$msgErrorDireccion = '';
$msgErrorLocalitat = '';
$msgErrorEmail = '';

$hihaError = false;
//comprovem si venim del formulari per recuperar valors
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    //nom
    if(!empty($_POST['nom'])){
        $nom = neteja_dades($_POST['nom']);
    }
    else{
        $msgErrorNom = "&#128561 Has d'escriure un nom vàlid";
        $hihaError = true;
    }

    //cognom
    if(!empty($_POST['cognom'])){
        $cognom = neteja_dades($_POST['cognom']);
    }
    else{
        $msgErrorCognom = "&#128561 Has d'escriure un cognom vàlid";
        $hihaError = true;
    }

    //direccion
    if(!empty($_POST['direccion'])){
        $direccion = neteja_dades($_POST['direccion']);
    }
    else{
        $msgErrorDireccion = "&#128561 Has d'escriure una adreça vàlida";
        $hihaError = true;
    }

    //localitat
    if(!empty($_POST['localitat'])){
        $localitat = neteja_dades($_POST['localitat']);
    }
    else{
        $msgErrorLocalitat = "&#128561 Has d'escriure una localitat vàlida";
        $hihaError = true;
    }

    //email
    if(!empty($_POST['email'])){
        $email = neteja_dades($_POST['email']);

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $msgErrorEmail = "&#128561 Has d'escriure un email vàlid";
            $hihaError = true;
        }
    }
    else{
        $msgErrorEmail = "&#128561 Has d'escriure un email vàlid";
        $hihaError = true;
    }

    $preferencies = $_POST['preferencies'];

    //si tot es correcte, redirigim
    if(!$hihaError){
        header('location:novapagina.php');
    }
}

function is_checked($valor, $llistadades){
    if(in_array($valor, $llistadades))
        return "checked";
}

function neteja_dades($dada){
    $dada = trim($dada);
    $dada = stripslashes($dada);
    $dada = htmlspecialchars(($dada));
    return $dada;
}

?>

<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css" />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.colors.min.css">
    <title>Exemple formulari senzill</title>
</head>

<body>
    <main class="container">
        <h2 class="pico-color-blue-600">Formulari de contacte </h2>
        <form method="post" action="formulariSenzill.php">
            <fieldset>
                <div class="grid">
                <label>
                Nom <span class="pico-color-pink-600"><?=$msgErrorNom?></span>
                <input
                    name="nom"
                    placeholder="Nom"
                    value="<?=$nom?>"
                />
                
                </label>
                <label>
                Cognom <span class="pico-color-pink-600"><?=$msgErrorCognom?></span>
                <input
                    name="cognom"
                    placeholder="cognom"
                    value="<?=$cognom?>"
                />
                </label>
                </div>
                <div class="grid">
                <label>
                Adreça <span class="pico-color-pink-600"><?=$msgErrorDireccion?></span>
                <input
                    name="direccion"
                    placeholder="Adreça"
                    value="<?=$direccion?>"
                />
                </label>
                <label>
                Localitat <span class="pico-color-pink-600"><?=$msgErrorLocalitat?></span>
                <input
                    name="localitat"
                    placeholder="Localitat"
                    value="<?=$localitat?>"
                />
                </label>
                </div>
                <div class="grid">
                <label>
                Email <span class="pico-color-pink-600"><?=$msgErrorEmail?></span>
                <input
                    name="email"
                    placeholder="Email"
                    value="<?=$email?>"
                />
                </label>
                <fieldset>
                <legend>Preferències:</legend>
                <input type="checkbox" id="regal" name="preferencies[]" value="regal" <?=is_checked('regal',$preferencies)?>/>
                <label htmlFor="regal">És per a regal?</label>
                <input type="checkbox" id="urgent" name="preferencies[]" value="urgent" <?=is_checked('urgent',$preferencies)?>/>
                <label htmlFor="urgent">És urgent?</label>
                <input type="checkbox" id="factura" name="preferencies[]" value="factura" <?=is_checked('factura',$preferencies)?>/>
                <label htmlFor="navi">Desitja factura?</label>
                </fieldset>
                </div>
            </fieldset>

            <input
                type="submit"
                value="Subscribe"
            />
        </form>
    </main>
</body>

</html>