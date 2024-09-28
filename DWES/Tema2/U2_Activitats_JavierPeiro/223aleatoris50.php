<?php
$aleatoris=[];
echo "<ul>";
for($x=0;$x<50;$x++){
    $aleatoris[$x]=rand(0,99);
    echo "<li>".$aleatoris[$x]."</li>";
}
echo "</ul>";
?>