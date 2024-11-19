<form action="U2_P1_conversors.php" method="get">
    <label name="graus">º Celsius: <input type="num" name="celsius" id="celsius"></label>
    <input type="submit" name="enviar1">
</form>
<?php
if(isset($_GET["celsius"])){

    $celsius=$_GET["celsius"];
    $fahrenheit=($celsius*1.8)+32;
    echo($celsius." grau celsius equivalen a ".$fahrenheit." graus fahrenheit");

}
?>
<form action="U2_P1_conversors.php" method="get">
    <label name="pes">Introdueix el teu pes: <input type="num" name="pes" id="pes"></label></br>
    <label name="alçada">Introdueix la teua alçada: <input type="num" name="alçada" id="alçada"></label><br>
    <input type="submit" name="enviar2">
</form>
<?php

if(isset($_GET["enviar2"])){
    $valorsIMC=[
        "baix_pes" => 18.5, 
        "pes_normal" => 20.9,
        "sobrepes"=> 29.9,
        "obesitat" => 30
    ];


$pes=$_GET["pes"];
$alçada=$_GET["alçada"];

$IMC=$pes/($alçada*2);

$keys=array_keys($valorsIMC);

echo "El teu IMC es: ".$IMC."<br>";

if($IMC<=($valorsIMC["baix_pes"])){
    echo "Tens un ".array_keys($valorsIMC)[0];
}else if($IMC<=$valorsIMC["pes_normal"]&&$IMC>$valorsIMC["baix_pes"]){
    echo "Tens un ".array_keys($valorsIMC)[1];
}else if($IMC<=$valorsIMC["sobrepes"]&&$IMC>$valorsIMC["pes_normal"]){
    echo "Tens ".array_keys($valorsIMC)[2];
}else{
    echo "Tens ".array_keys($valorsIMC)[3];
}
/* PErque no va este switch??!! me trau tot a la vegada, he perdut mes de 20 minuts intentant que funcionara...
switch($IMC){
    case$IMC<=($valorsIMC["baix_pes"]):
        echo "Tens un ".array_keys($valorsIMC)[0];
    case($IMC<=$valorsIMC["pes_normal"]&&$IMC>$valorsIMC["baix_pes"]): 
        echo "Tens un ".array_keys($valorsIMC)[1];
    case($IMC<=$valorsIMC["sobrepes"]&&$IMC>$valorsIMC["pes_normal"]): 
        echo "Tens ".array_keys($valorsIMC)[2];
    case($IMC>=$valorsIMC["obesitat"]): 
        echo "Tens ".array_keys($valorsIMC)[3];
}
*/
};


?>
