<style>
    th[scope='row'] {
        background-color: orange;
        color: white;
        padding: 8px;
        border: 1px solid #ddd;
    }
    th{
        background-color: blue;
        color: white;
        padding: 8px;
        border: 1px solid #ddd;
    }
    table {
        border-collapse: collapse;
    }

    td {
        text-align: center;
        padding: 8px;
        border: 1px solid #ddd;
    }
</style>

<table>

<?php
$filas=1;
$columnas=1;
echo "<table>";
echo "<th>x</th>"; 
for($x=-1;$x<10;$x++){
    if($x==-1){
        for($z=0;$z<10;$z++){
            echo "<th>$filas</th>";
            $filas++;
        }
        
    }else{
        echo"<tr>";
        for($y=-1;$y<10;$y++){
            if($y==-1&&$x!=-1){
                echo "<th scope='row'>$columnas</th>";
                $columnas++;
            }else{
                echo "<td>".($x+1)*($y+1)."</td>";
            }
        }
        echo"</tr>";
    }
}
?>
</table>
