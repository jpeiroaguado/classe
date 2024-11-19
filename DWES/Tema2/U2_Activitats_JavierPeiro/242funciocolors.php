<!--
242funciocolors.php: Els colors web com #ffffff i #cc3399 es realitzen concatenant
els valors hexadecimals de color per a vermell, verd i blau.
Escriu una funció que accepte 3 arguments: roig, verd i blau, i que retorne un string que
conté el color adequat per utilitzar-lo en una pàgina web.
Per exemple, si els arguments són 255, 0, i 255, llavors la cadena retornada hauria de ser
#FF00FF.
Pot resultar útil utilitzeu la funció dechex() integrada, que es troba documentada a
http://www.php.net/
Assegureu-vos que els paràmetres reben valors enters i que són colors vàlids.
U2_A2. Bucles, arrays i funcions 2n DAW - DWES IES María Enríquez
Implementa 3 exemples d’ús-->
<style>
    div {
    display: inline-block;
    width: 100px;
    height: 50px;
    border: 1px solid black;
    }
</style>
<?php
function pasarColorsaHexa(int $roig, int $verd, int $blau){
    if($roig>255||$roig<0||$blau>255||$blau<0||$verd>255||$verd<0){
        echo "El color introduït no es valid.";
        return;
    }
        //Pasem a hexadecimal i després a string per a treballar amb ells
        $roighex=dechex($roig);
        $roighex=strval($roighex);
        $verdhex=dechex($verd);
        $verdhex=strval($verdhex);
        $blauhex=dechex($blau);
        $blauhex=strval($blauhex);
        //Si el color te 1 sol digit, añadim un 0 davant
        if(strlen($blauhex)==1){
            $blauhex="0".$blauhex;
        }

        if(strlen($verdhex)==1){
            $verdhex="0".$verdhex;
        }

        if(strlen($roighex)==1){
            $roighex="0".$roighex;
        }
        //concatenem per a tornar el valor complet del color
        $valorhex='#'.$roighex.$verdhex.$blauhex;

        return $valorhex;
}
   
function generarColorsAleatoris():array{
    $roig=rand(0,255);
    $verd=rand(0,255);
    $blau=rand(0,255);
    $colors=[$roig, $verd, $blau];
    return $colors;
}

for($x=0;$x<150;$x++){
    $colorsalea=generarColorsAleatoris();
    $valorenhex=pasarColorsaHexa($colorsalea[0], $colorsalea[1],$colorsalea[2]);
    echo "<div style=\"background-color:$valorenhex\">$valorenhex</div>";
}

?>

