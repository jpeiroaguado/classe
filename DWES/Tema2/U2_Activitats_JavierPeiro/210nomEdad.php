<?php
/* A partir d'una edat mostra per pantalla:...*/
?>
<form action="210nomEdad.php" method="get">
<p>Introdueix una edat: <input type="number" name="edat" id="edat"></p>
<p><input type="submit"></p>
</form>
<?php
if(isset($_GET["edat"])){
    $edat=$_GET["edat"];
    switch($edat){
        case $edat<3:
            echo "Nadó";
            break;
        case $edat>=3&&$edat<=12:
            echo "Nen";
            break;
        case $edat>=13&&$edat<=17:
            echo "Adolescent";
            break;
        case $edat>=18&&$edat<=66:
            echo "Adult";
            break;
        case $edat>=67:
            echo "Huelo rabut";
            break;
        
    }
}
?>