<?php
    $files=$_GET['files'];
    $columnes=$_GET['columnes'];

?>
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
    for($x=1;$x<=$columnes;$x++){
        echo "<tr>";
        for($y=1;$y<=$files;$y++){
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