<!--223aleatoris50.php: Omple un array amb 50 números aleatoris compresos entre el 0 i
el 99, i després mostra'l en una llista desordenada. Per crear un nombre aleatori, utilitzeu
la funció rand(inici, fi). Per exemple: $num = rand(0, 99)-->
<?php
$aleatoris=[];
echo "<ul>";
for($x=0;$x<50;$x++){
    $aleatoris[$x]=rand(0,99);
    echo "<li>".$aleatoris[$x]."</li>";
}
echo "</ul>";
?>