<!--
226sexes.php: Omple un array de 100 elements de manera aleatòria amb valors M o F.
Un cop completat, torna a recórrer-lo i calcula quants elements hi ha de cadascun dels
valors. Per això, emmagatzema el resultat en un array associatiu ['M' => 44, 'F' => 56].
Finalment, mostra el resultat per pantalla-->
<?php
$sexes=[];
echo "<ul>";
for($x=0;$x<100;$x++){
    $aleatori=rand(0,1);
    if($aleatori==0){
        $sexes[$x]="M";
    }else {
        $sexes[$x]="F";
    }
}
$sexe=array_count_values($sexes);
$diferenciador=array_key_first($sexe);//fem un key first perque pot ser que el primer siga M o F
if($diferenciador=="M"){
    echo "Hi han ".$sexe["M"]." mascles<br>";
    echo "Hi han ".$sexe["F"]." femelles";
}else{
    echo "Hi han ".$sexe["F"]." femelles<br>";
    echo "Hi han ".$sexe["M"]." mascles";
}


?>