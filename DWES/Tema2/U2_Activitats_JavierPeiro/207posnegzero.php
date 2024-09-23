<?php
/*A partir d'un número, mostra per pantalla si el
número és positiu, negatiu o zero*/
?>
<form action="207posnegzero.php" method="get">
<p>Introdueix un número: <input type="number" name="num" id="num"></p> 
<p><input type="submit"></p>
</form>
<?php
if(isset($_GET["num"])){
    $num=$_GET["num"];
    if($num>0){
        echo "El número es positivo";  
    }else if($num<0){
        echo "El número es negativo";
    }else if($num==0){
        echo "El número es zero";
    }
}
?>