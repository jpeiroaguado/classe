<?php

session_start();
session_destroy();
setcookie('usuari', '', time() - 3600);
header('Location: login.php');
exit;
?>