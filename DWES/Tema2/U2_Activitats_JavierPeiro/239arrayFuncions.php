<!--239arrayFuncions.php: fent ús d'un array que emmagatzeme el nom de les funcions
del fitxer anterior, a partir de dos números rebuts per URL, recorre l'array i invoca les
funcions de manera dinàmica fent ús de funcions variable.-->

<form action="239arrayFuncions.php" method="get">
<p>Introdueix el numero 1: <input type="number" name="num1" id="num1"></p>
<p>Introdueix el numero 2: <input type="number" name="num2" id="num2"></p> 
<p><input type="submit"></p> 
<?php
require_once '238operacionsBasiques.php';
if(isset($_GET["num1"])){
    $funcions=['sumar', 'restar', 'multiplicar', 'dividir'];
    $num1=$_GET['num1'];
    $num2=$_GET['num2'];

    foreach($funcions as $funcio){
        echo "$funcio ($num1, $num2): ";
        $resultat=$funcio($num1, $num2);
        echo $resultat."<br>";
    }
}
?>