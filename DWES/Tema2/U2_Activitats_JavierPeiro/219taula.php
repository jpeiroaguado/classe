<!--219formulari.html i 219taula.php: A partir d'un nombre de files i columnes, crear una
taula amb aquesta mida. Les cel·les han d'estar emplenades amb els valors de les
coordenades de cada cel·la.
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
    <thead><caption>CELDAS CON COORDENADAS</caption></thead>
    <tbody>
        
<?php
    $files=$_GET['files'];
    $columnes=$_GET['columnes'];

    for($x=1;$x<=$files;$x++){
        echo "<tr>";
        for($y=1;$y<=$columnes;$y++){
            echo"<td>$x.$y</td>";
        }
        echo "</tr>";
    }
?>
    </tbody>
</table>