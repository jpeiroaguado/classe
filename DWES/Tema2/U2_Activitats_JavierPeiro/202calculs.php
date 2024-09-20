<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    /* Activitat 2_02. 202calculs.php: Escriu un programa que utilitze les variables $x i $y.
    Assigna'ls els valors 166 i 999 respectivament. Tot seguit, mostra per pantalla el valor de cada
    variable, la suma, la resta, la divisió i la multiplicació. */
    $x=166;
    $y=999;
    echo "La variable X val $x, mentre que a variable Y val $y <br>";
    echo "La suma de $x i $y es:".$x+$y."<br>";
    echo "La resta de $y menys $x es:".$y-$x."<br>";
    echo "La divisió de $y entre $x es:".round($y/$x, 2)."<br>";
    echo "La multiplicació de $y i $x es:".$y*$x."<br>";

    ?>
</body>
</html>