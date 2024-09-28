<?php

        $total=0;
        foreach ($_GET as $num => $valor) { 
            if (is_numeric($valor)){
                $total += $valor; 
            }          
        }
    echo "El total es: ".$total;
?>
