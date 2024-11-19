<?php
// Mostra l'adreça IP del servidor
echo "Adreça IP del servidor: " . $_SERVER['SERVER_ADDR'];

// Mostra l'adreça IP del client
echo "Adreça IP del client: " . $_SERVER['REMOTE_ADDR'];

// Mostra el nom del fitxer de l'script en execució
echo "Nom de l'script: " . $_SERVER['PHP_SELF'];
?>

