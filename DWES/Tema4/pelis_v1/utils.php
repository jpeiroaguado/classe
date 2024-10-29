<?php
function neteja_dades($dada){
    $dada=trim($dada);
    $dada=stripslashes($dada);
    $dada=htmlspecialchars(($dada));
}
?>