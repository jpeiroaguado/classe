<?php
/*Activitat 2_13. 213Cadenes.php: Utilitza la funció parse_url per a extraure de la url
les següents parts:
    ● El protocol utilitzat (en l'exemple "http").
    ● El nom d'usuari (en l'exemple "username").
    ● El path de la url (en l'exemple "/path").
    ● El querystring de la url (en l'exemple "arg=value").
    $url = "http://username:password@hostname:9090/path?arg=value#anchor";*/

    $url = "http://username:password@hostname:9090/path?arg=value#anchor";
    $partes_url=parse_url($url);

    echo "La url es: ".$url;
    echo "Protocol de la url: ".$partes_url['scheme']."<br>";
    echo "Usuari: ".$partes_url['user']."<br>";
    echo "Path de la URL: ".$partes_url['path']."<br>";
    echo "Valor del query: ".$partes_url['query']."<br>";

?>