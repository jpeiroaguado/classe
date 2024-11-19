
<?php

session_start();
session_destroy();
setcookie('usuari', '', time() - 3600);
//Volia fer que imprimiera que has tancat la sessió y als 4 segons redirigira, pero no se perque no imprimeix!
echo("<p>Has tancat la sessió!</p>");
sleep(4);
header('Location: login.php');
exit;
?>