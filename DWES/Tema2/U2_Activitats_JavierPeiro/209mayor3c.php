<?php
/* Mostra el més gran de tres números (a, b i c).
Utilitza ara els operadors lògics.
*/
?>
<form action="209mayor3c.php" method="get">
<p>Introdueix el primer número: <input type="number" name="num1" id="num1"></p>
<p>Introdueix el segon número: <input type="number" name="num2" id="num2"></p> 
<p>Introdueix el terçer número: <input type="number" name="num3" id="num3"></p> 
<p><input type="submit"></p>
</form>
<?php
if(isset($_GET["num1"],$_GET["num2"],$_GET["num3"])){
    $num1=$_GET["num1"];
    $num2=$_GET["num2"];
    $num3=$_GET["num3"];
    if($num1>$num2&&$num1>$num3){
        echo "El mayor de los 3 es: ".$num1;
    }else if($num2>$num1&&$num1>$num3){
        echo "El mayor de los 3 es: ".$num2;
    }else{
        echo "El mayor de los 3 es: ".$num3;
    }
}
?>