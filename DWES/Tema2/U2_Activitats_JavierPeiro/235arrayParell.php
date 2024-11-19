<!--250arrayParell.php: Crea les funcions següents:
    ● Una funció que esbrina si un nombre és parell: esParell(int $num): bool.
    ● Una funció que retorne un array de mida $tam amb números aleatoris compresos
    entre $min i $max : arrayAleatori(int $tam, int $min, int $max):
    array.
    ● Una funció que reba un array amb números aleatoris per referència i torne la
    quantitat de nombres parells que hi ha emmagatzemats: arrayParells(array
    &$array): int.-->
<?php
function esParell(int $num):bool{
    if ($num % 2 == 0){
        return true;
    }else return false;
}
function arrayAleatori(int $tam, int $min, int $max):array{
    $numsalea=[];
    for($x=0;$x<$tam;$x++){
        $numsalea[$x]=rand($min, $max);
    }
    return $numsalea;
}
function arrayParells(array $numalea): int{
    $parells=0;
    foreach($numalea as $nal){
        $nal=intval($nal);
        if (esParell($nal)){
            $parells++;
        }
    }
    return $parells;
    
}
$arrayalea=arrayAleatori(15, 1, 10);
print_r($arrayalea);
$nparells=arrayParells($arrayalea);
echo "<br> Hi han ".$nparells." parells.";
?>