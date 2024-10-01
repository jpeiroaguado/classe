<!--Una funció que retorne el nombre més gran de tots els números rebuts com a
paràmetres: function major(): int. Utilitza les funcions func_get_args(), etc...
No pots fer servir la funció max().
● Una funció que concatene tots els paràmetres rebuts separant-los amb un espai:
function concatenar(...$paraules) : string. Utilitza l'operador ..-->
<?php
function major():int{
    $args = func_get_args();
    if (empty($args)){
        return null;
    }
    $major=$args[0];
    foreach ($args as $arg){
        if($arg>$major){
            $major=$arg;
        }
    }
    return $major;
}
$numeros=major(5,2,3,1,4,9,8);
echo "El major número es: ".$numeros;
function concatenar(...$paraules):string{
    $args = func_get_args();
    $parametres=[];
    foreach($args as $arg){
        $parametres[]=$arg;
    }
    $implosioarray= implode( " ", $parametres);
    return $implosioarray;
}
$paraula="centinela";
$proba=concatenar("paco", 3, $paraula);
echo "<br>".$proba;
?>