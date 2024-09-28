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

