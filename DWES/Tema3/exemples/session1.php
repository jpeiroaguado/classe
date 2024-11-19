<?php
session_start(); // inici
$_SESSION['ies'] = 'IES María Enríquez'; //assignació
$institut = $_SESSION['ies'];
echo "Estem a l'insitut $institut";
?>

<a href="session2.php">Sessió 2</a>