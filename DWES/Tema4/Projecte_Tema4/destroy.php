<?php

session_start();
session_destroy();
setcookie('usuari_id', '', time() - 3600, "/", "", false, true);
setcookie('usuari_email', '', time() - 3600, "/", "", false, true);
setcookie('usuari_password', '', time() - 3600, "/", "", false, true);
header('Location: login.php');
exit;

?>