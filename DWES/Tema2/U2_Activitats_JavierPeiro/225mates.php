<!--
225mates.php: A partir de l'exercici 2_24, genera un array aleatori de 33 elements amb
números compresos entre el 0 i 100 i calcula:
    ● El major
    ● El menor
    ● La mitjana-->
<?php
$aleatoris=[];
echo "<ul>";
    for($x=0;$x<33;$x++){
        $aleatoris[$x]=rand(1,99);
    }
    print_r($aleatoris);
    $major=max($aleatoris);
    echo "<li>El major es: ".$major."</li>";
    $menor=min($aleatoris);
    echo "<li>El menor es: ".$menor."</li>";
    $longitud=count($aleatoris);
    $mitja=array_sum($aleatoris)/$longitud;
    echo "<li>La mitja es: ".$mitja."</li>";
echo "</ul>";
?>