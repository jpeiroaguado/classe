<?php

// Mostra totes les variables d'entorn disponibles
print_r($_ENV);
echo '<br>';
print_r(getenv());
echo '<br>';
// Exemple d'accedir a una variable d'entorn específica
echo $_ENV['PATH'] . '<br/>';  // Mostra la variable PATH del sistema
echo getenv('path') . '<br/>';

// Per a sistemes Unix, pots accedir a la variable HOME
if (isset( $_ENV['HOME']))
    echo "Directori d'inici: " . $_ENV['HOME'];


?>


    