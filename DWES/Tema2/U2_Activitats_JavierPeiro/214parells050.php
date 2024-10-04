<!--
214parells050.php: Escriu un programa que mostre els números parells del 0 al 50
(dintre d'una llista desordenada).
-->
<ul>
<?php
for($x=1;$x<=50;$x++){
    if($x%2==0){
        echo "<li>".$x."</li>";
    }
}
?>
</ul>
