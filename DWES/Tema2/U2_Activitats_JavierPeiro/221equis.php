<!--
221formulari.html i 221equis.php: Basant-te en l'exercici anterior, ara només ha
d'aparèixer el contingut de les dos diagonals.-->
<style>
    table {
            border-collapse: collapse;
            width: 100%;
        }

        td {
            text-align: center;
            padding: 8px;
            border: 1px solid #ddd;
        }

</style>
<table>
    <thead><caption>CELDAS CON COORDENADAS EN DIAGONAL</caption></thead>
    <tbody>
        
<?php
    $files=$_GET['files'];
    $columnes=$_GET['columnes'];
    $decreciente=$files;

    for($x=1;$x<=$columnes;$x++){
        echo "<tr>";
        for($y=1;$y<=$files;$y++){
            echo "<td>";
            if($x==$y){
                echo "$x.$y";
            }
            if($decreciente==$y){
                echo "$x.$y";
                $decreciente--;
            }
            echo "</td>";
        }
        echo "</tr>";
    }
?>
    </tbody>
</table>