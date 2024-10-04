
<!--240funcions.php: Escriu una funció per retornar una etiqueta HTML <img />.
La funció hauria d’acceptar com a argument obligatori l’URL de la imatge i arguments
opcionals per a un text alternatiu, alçada i amplada.-->


<?php
function retornarEtiquetaImagen($url, $alt = '', $height = null, $width = null) {
    $etiqueta = "<img src='$url' alt='$alt' height='$height' width='$width'>";
    return $etiqueta;
}
$etiqueta=retornarEtiquetaImagen("foto.jpg", "foto.jpg", 200, 150);
echo $etiqueta;
?>