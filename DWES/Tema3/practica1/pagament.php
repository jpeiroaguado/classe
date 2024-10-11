<?php
require __DIR__.'/header.php' ;
require __DIR__.'/footer.php' ;

function neteja_dades($dada){
    $dada=trim($dada);
    $dada=stripslashes($dada);
    $dada=htmlspecialchars($dada);
    return $dada;
}
/*
//comprobem que venim del formulari
if($_SERVER["REQUEST METHOD"]=="POST"){

//inicialitzem variables que arrepleguem imissatjes d'error
$nom='';
$msgNomError='';

//arrepleguem no

if(isset($POST['nom'])){
    $nom=neteja_dades($_POST['nom']);
}else
    $smgNomError='Has d'escriure un nom';

}*/
if($_SERVER["REQUEST METHOD"]=="POST"){
if(isset($_POST['nom'])){
    $noms=neteja_dades($_POST['nom']);
}
    
    $cognoms=neteja_dades($_POST['cog']);
    $adreca=neteja_dades($_POST['adr']);
    $localitat=neteja_dades($_POST['loc']);
    $provincia=neteja_dades($_POST['prov']);
    $mail=neteja_dades($_POST['mail']);
    echo "El nom introduit es: ".$noms."<br>";
    echo "El nom introduit es: ".$cognoms."<br>";
    echo "El nom introduit es: ".$adreca."<br>";
    echo "El nom introduit es: ".$localitat."<br>";
    echo "El nom introduit es: ".$provincia."<br>";
    echo "El nom introduit es: ".$mail."<br>";
    if(isset($_POST['env'])){
        echo "Es per a regal<br>";
    }
    if(isset($_POST['urg'])){
        echo "Es urgent<br>";
    }
    if(isset($_POST['fac'])){
        echo "Requereis factura<br>";
    }
}else{
    
    $noms=$_POST['nom']??"";
    $cognoms=$_POST['cog']??"";
    $adreca=$_POST['adr']??"";
    $localitat=$_POST['loc']??"";
    $provincia=$_POST['prov']??"";
    $mail=$_POST['mail']??"";
    /*
    if(isset($_POST['nom'])){
        echo "Tens que introduir el nom";
    }else*/
?>
<div class="contenedor">
<h1>Shipping form</h1>
    <div class="contenedorForm">
        <fieldset>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                <label for="nom">Nom: </label><input type="text" name="nom" id="nom"class="textos" value="<?$noms?>"> <span ></span><br>
                <label for="cog">Cognoms: </label><input type="text" name="cog" id="cog" class="textos"><br>
                <label for="adr">Adreça: </label><input type="text" name="adr" id="adr" class="textos"><br>
                <label for="loc">Localitat: </label><input type="text" name="loc" id="loc" class="textos"><br>
                <label for="prov">Provincia: </label><input type="text" name="prov" id="prov" class="textos"><br>
                <label for="mail">Mail: </label><input type="mail" name="mail" id="mail" class="textos"><br>
                <input type="checkbox" name="env">
                <label for="reg">És per a regal?</label><br>
                <input type="checkbox" name="urg">
                <label for="urg">És urgent?</label><br>
                <input type="checkbox" name="fac">
                <label for="fac">Factura en paper?</label><br>
                <input type="submit" value="BUY" class="boton2">
            </form>
        </fieldset>
        <img src="./cartera.png" class="imgCart">
    </div>
</div>
<?php

}//tanquem el else
?>