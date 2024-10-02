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
$diferenciador=array_key_first($sexe);
if($diferenciador=="M"){
    echo "Hi han ".$sexe["M"]." mascles<br>";
    echo "Hi han ".$sexe["F"]." femelles";
}else{
    echo "Hi han ".$sexe["F"]." femelles<br>";
    echo "Hi han ".$sexe["M"]." mascles";
}


?>