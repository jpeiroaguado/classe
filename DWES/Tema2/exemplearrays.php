<?php
$ejercito1=['alianza'=>'caos',
            'nombre'=>'Esclavos de la oscuridad'];
$ejercito2=['alianza'=>'caos',
           'nombre'=>'Filos de khorne'];

$ejercito3=['alianza'=>'caos',
            'nombre'=>'Agusanados de nurgle'];
$ejercitos=[$ejercito1, $ejercito2, $ejercito3];

foreach($ejercitos as $ejercito){
    foreach($ejercito as $alianza=>$valor){
        echo "$alianza : $valor <br>";
    }
echo "<br>";  
}
?>