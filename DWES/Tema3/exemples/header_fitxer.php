<?php
// Nom del fitxer a descarregar
$nom_fitxer = 'document.pdf';

// Defineix les capçaleres per forçar la descàrrega
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="' . $nom_fitxer . '"');
header('Content-Length: ' . filesize($nom_fitxer));

// Envia el contingut del fitxer al navegador
readfile($nom_fitxer);
exit();
?>
