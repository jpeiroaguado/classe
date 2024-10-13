<?php
require __DIR__.'/header.php' ;
require __DIR__.'/footer.php' ;

//variables
$nom='';
$cognoms='';
$adreca='';
$localitat='';
$provincia='';
$mail='';
$preferencies=[];

//errors
$msgErrorNom='';
$msgErrorCognoms='';
$msgErrorAdreca='';
$msgErrorLocalitat='';
$msgErrorProvincia='';
$msgErrorMail='';

$error=false;

function neteja_dades($dada){
    $dada=trim($dada);
    $dada=stripslashes($dada);
    $dada=htmlspecialchars($dada);
    return $dada;
}
function is_checked($valor, $llistadades){
    if(in_array($valor, $llistadades)){
        return "checked";
    }
}

if($_SERVER['REQUEST_METHOD']==='POST'){
    //en els ifs ficaba isset pero no funcionaba, perqué??
    if(!empty($_POST['nom'])){
        $nom=neteja_dades($_POST['nom']);
    }else{
        $msgErrorNom = "&#x1F624 Has d'escriure un nom vàlid";
        $error = true;
    }

    if(!empty($_POST['cognoms'])){
        $cognoms=neteja_dades($_POST['cognoms']);
    }else{
        $msgErrorCognoms = "&#x1F624 Has d'escriure cognms vàlids";
        $error = true;
    }
        
    if(!empty($_POST['adreca'])){
        $adreca=neteja_dades($_POST['adreca']);
    }else{
        $msgErrorAdreca = "&#x1F624 Has d'escriure una adreça vàlida";
        $error = true;
    }

    if(!empty($_POST['localitat'])){
        $localitat=neteja_dades($_POST['localitat']);
    }else{
        $msgErrorLocalitat = "&#x1F624 Has d'escriure una localitat vàlida";
        $error = true;
    }

    if(!empty($_POST['provincia'])){
        $provincia=neteja_dades($_POST['provincia']);
    }else{
        $msgErrorProvincia = "&#x1F624 Has d'escriure una provincia vàlid";
        $error = true;
    }

    if(!empty($_POST['mail'])){
        $mail=neteja_dades($_POST['mail']);

        if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
            $msgErrorMail = "&#x1F624 Has d'escriure un mail vàlid";
            $error = true;
        }
    }else{
        $msgErrorMail = "&#x1F624 Has d'escriure un mail vàlid";
        $error = true;
    }
    if(!empty($_POST['preferencies'])){
        $preferencies=$_POST['preferencies'];
    }
    if(!$error){
        header('location:enviament.php');
    }
}

?>
<div class="contenedor">
<h1>Shipping form</h1>
    <div class="contenedorForm">
        <fieldset>
            <form action="pagament.php" method="POST">
                <label for="nom">Nom: <span style="background-color:pink;"><?=$msgErrorNom?></span><input type="text" name="nom" class="textos" placeholder="Nom" value="<?=$nom?>"></label><br>
                <label for="cog">Cognoms: <span style="background-color:pink;"><?=$msgErrorCognoms?></span></label><input type="text" name="cognoms" placeholder="Cognoms" class="textos" value="<?=$cognoms?>"><br>
                <label for="adr">Adreça: <span style="background-color:pink;"><?=$msgErrorAdreca?></span></label><input type="text" name="adreca" placeholder="Adreça" class="textos" value="<?=$adreca?>"><br>
                <label for="loc">Localitat: <span style="background-color:pink;"><?=$msgErrorLocalitat?></span></label><input type="text" name="localitat" placeholder="Localitat" class="textos" value="<?=$localitat?>"><br>
                <label for="prov">Provincia: <span style="background-color:pink;"><?=$msgErrorProvincia?></span></label><input type="text" name="provincia" placeholder="Provincia" class="textos" value="<?=$provincia?>"><br>
                <label for="mail">Mail: <span style="background-color:pink;"><?=$msgErrorMail?></span></label><input type="mail" name="mail" placeholder="E-Mail" class="textos" value="<?=$mail?>"><br>
                <h2>PREFERENCIES</h2><br>
                <input type="checkbox" id="regal" name="preferencies[]" value="regal" <?=is_checked('regal', $preferencies)?>>
                <label htmlFor="regal">És per a regal?</label><br>
                <input type="checkbox" id="urgent" name="preferencies[]" value="urgent" <?=is_checked('urgent', $preferencies)?>>
                <label htmlFor="urgent">És urgent?</label><br>
                <input type="checkbox" id="factura" name="preferencies[]" value="factura" <?=is_checked('factura', $preferencies)?>>
                
                <label htmlFor="factura">Factura en paper?</label><br>
                <input type="submit" value="COMPRAR" class="boton2">
            </form>
        </fieldset>

        <img src="./cartera.png" class="imgCart">
    </div>
</div>
