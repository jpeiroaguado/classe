
<?php

$productes=[
    ["Poma", 1.60, 20],
    ["pebre", 2.0, 26],
    ["llima", 2.60, 28]
]
?>
<table>
    <th>PRODUCTE</th>
    <th>PREU</th>
    <th>QUANTITAT</th>
    <th>TOTAL<th>
<?php
    $preus=[];
    for($x=0;$x<=2;$x++){
        echo "<tr>";
            echo "<td>".$productes[$x][0]."</td>";
            echo "<td>".$productes[$x][1]."</td>";
            echo "<td>".$productes[$x][2]."</td>";
            $preus[$x]=$productes[$x][1]*$productes[$x][2];
            echo "<td>".$preus[$x]."</td>";
        echo "</tr>";
    }
?>
<?php
$global=0;
for($x=0;$x<=2;$x++){
$global +=$preus[$x];   
    }
echo "<tr><td colspan='4'>Preu Global: ".$global."</td></tr>";  

?>
</table>


