<!--238operacionsBasiques.php: crea un fitxer amb funcions per sumar, restar, multiplicar
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

?>