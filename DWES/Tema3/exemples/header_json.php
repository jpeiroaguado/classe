<?php
// Defineix el tipus de contingut com a JSON
header('Content-Type: application/json');

// Enviar una resposta JSON
$data = ['nom' => 'Joan', 'edat' => 30];
echo json_encode($data);
?>


