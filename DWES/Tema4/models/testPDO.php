<?php
try{
    $pdo=new PDO('mysql:host=localhost;dbname=pelis', 'pelis', '0hk87seXpeLe4siu');
    echo 'Database connection established.';
}catch (PDOExepction $e){
    echo 'Unable to connecto to the database server.';
}
try{
$pdo=new PDO ('mysql:host=localhost;dbname=pelis;charset=utf8','pelis', '0hk87seXpeLe4siu');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e){
    echo 'Unable to connect to the database server:'.e->getMessage();
    exit();
}echo 'Database connection established';