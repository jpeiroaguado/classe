<!--
237matematiques.php: Afegeix les funcions següents:
    ● digits(int $num): int → retorna la quantitat de dígits d'un número.
    ● digitN(int $num, int $pos): int → torna el dígit que ocupa, començant per
    l'esquerra, la posició $pos.
    ● llevarPerDarrere(int $num, int $quantitat): int → li treu per darrere
    (dreta) $quantitat dígits.
    ● llevarPerDavant(int $num, int $quantitat): int → li treu per davant
    (esquerra) $quantitat dígits.
    Per provar les funcions, feu ús tant de pas d'arguments posicionals com arguments amb
    nom.
-->
<?php
function digits(int $num): int{
    $numcad=strval($num);
    $valores=strlen($numcad);
    $valores=intval($valores);
    return $valores;
}
$prueba=12345;
echo "Valor del digit: ";
print $prueba;
echo "<br>";

echo "Cuantitats del valor del digit: ";

$valor=digits($prueba);
print $valor;
echo "<br>";

echo "Comprobem el digit en la posició [2]: ";
function digitN(int $num, int $pos): int{
    $numcad=strval($num);
    return intval($numcad[$pos-1]);
}
$numenpos=digitN($prueba, 3);
print $numenpos;
echo "<br>";

echo "Li llevem dos numeros per darrere: ";
function llevarPerDarrere(int $num, int $quantitat): int {
    $numcad=strval($num);
    $numcad= substr($numcad, 0, -$quantitat);
    $numcad=intval($numcad);
    return $numcad;
}
$quantitat=2;
$llevardarr=llevarPerDarrere($prueba, $quantitat);
print $llevardarr;
echo "<br>";

echo "Li llevem dos numeros per davant: ";
function llevarPerDavant(int $num, int $quantitat): int{
    $numcad=strval($num);
    $numcad= substr($numcad, $quantitat);
    $numcad=intval($numcad);
    return $numcad;
}
$llevardav=llevarPerDavant($prueba, $quantitat);
print $llevardav;
?>
