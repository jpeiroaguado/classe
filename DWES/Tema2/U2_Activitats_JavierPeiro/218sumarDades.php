<!--$_COOKIE218formulari.html:Crea un formulari que permeta llegir una quantitat.
218llegirDades.php: A partir de quantitat, prepara un formulari amb tantes caixes
(textbox) com el valor de quantitat rebut. Finalment, en 218sumarDades.php: a partir de
les dades de totes les caixes de text de la pàgina anterior, suma i mostra el total.-->
<?php

        $total=0;
        foreach ($_GET as $num => $valor) { 
            if (is_numeric($valor)){
                $total += $valor; 
            }          
        }
    echo "El total es: ".$total;
?>
