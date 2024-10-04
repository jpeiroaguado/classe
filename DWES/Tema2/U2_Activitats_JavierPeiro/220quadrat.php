<!--220formulari.html i 220quadrat.php: Basant-te en l'exercici anterior, omple la taula
de manera que només les vores tinguen contingut, quedant-se la resta de cel·les en blanc
-->
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
    <thead><caption>CELDAS CON COORDENADAS EN CUADRADO</caption></thead>
    <tbody>
        
<?php
$files=$_GET['files'];
$columnes=$_GET['columnes'];
    for($x=1;$x<=$files;$x++){
        echo "<tr>";
        for($y=1;$y<=$columnes;$y++){
            echo "<td>";
            if($x==1 || $y==1 || $x==$columnes || $y==$files){
                echo "$x.$y";
            }
            echo "</td>";
        }
        echo "</tr>";
    }
?>
    </tbody>
</table>