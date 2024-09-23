<?php
/* Sense fer ús de condicions que utilitzen dins de la
condició els operadors lògics, mostra el més gran de tres números (a, b i c).*/
?>
<form action="208mayor3.php" method="get">
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
    $num_max=max($num1, $num2, $num3);
    echo "El mayor de los 3 es: ".$num_max;
}
?>