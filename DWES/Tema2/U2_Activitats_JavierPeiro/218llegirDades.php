<!--
218formulari.html:Crea un formulari que permeta llegir una quantitat.
218llegirDades.php: A partir de quantitat, prepara un formulari amb tantes caixes
(textbox) com el valor de quantitat rebut. Finalment, en 218sumarDades.php: a partir de
les dades de totes les caixes de text de la pàgina anterior, suma i mostra el total.-->
<?php
    $cantidad=$_GET["cantidad"];
    echo    "<form action='218sumarDades.php' method='get'>";
                for($x=1;$x<=$cantidad;$x++){
                    echo "<label for='numero$x'>Introduce un número $x:</label>
                    <input type='textbox' id='num$x' name='num$x'><br>";
                }
    echo        "<input type='submit' value='Enviar'>
            </form>";
?>

