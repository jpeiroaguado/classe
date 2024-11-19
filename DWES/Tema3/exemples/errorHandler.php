<?php

    function myErrorHandler($errNumber, $str, $file, $line){
        echo "The program has exploded because of this error: $errNumber - $str ($file | line: $line)";
    }

    set_error_handler('myErrorHandler');
    $a = $b;

    