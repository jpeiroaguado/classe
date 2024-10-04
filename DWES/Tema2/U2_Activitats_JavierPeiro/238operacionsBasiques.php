<!--
238operacionsBasiques.php: crea un fitxer amb funcions per sumar, restar, multiplicar
i dividir dos números.-->
<?php
function sumar(int $num1,int $num2){
    $resul=$num1+$num2;
    return $resul;
}
function restar(int $num1,int $num2){
        $resul=$num1-$num2;

    return $resul;
}
function multiplicar(int $num1,int $num2){
    $resul=$num1*$num2;

    return $resul;
}
function dividir(int $num1,int $num2){
        $resul=$num1/$num2;
    
    return $resul;
}
//Per si es volen probar...
/*$suma=sumar(25,26);
echo $suma."<br>";
$resta=restar(50,40);
echo $resta."<br>";
$multiplicacio=multiplicar(5,6);
echo $multiplicacio."<br>";
$divisio=dividir(9,3);
echo $divisio."<br>";*/
?>