<!--Activitat 2_41
241funcions.php: Copieu la funció de l’exercici anterior i modifiqueu-la de manera que
només es passe el nom de fitxer a la funció en lloc de l’URL completa. Dins de la funció,
farem ús d’una variable global per fer l’URL completa.
Per exemple, si passem photo.png a la funció, i la variable global conté /images, llavors
l’atribut src de l'etiqueta retornada serà /images/photo.png.
Una funció com aquesta és una forma senzilla de mantenir correctes les vostres etiquetes
d’imatges, fins i tot si les imatges es mouen a un nou camí o servidor. Només cal canviar la
variable global, per exemple, de /images a http://images.example.com/.-->
<?php
$rutaImatges="imatges";
function retornarEtiquetaImagen($nomArchiu, $alt = '', $height = null, $width = null) {
    global $rutaImatges;
    $url=$rutaImatges.'/'.$nomArchiu;
    $etiqueta = "<img src='$url' alt='$alt' height='$height' width='$width'>";
    return $etiqueta;
}
$etiqueta=retornarEtiquetaImagen("foto2.jpg", "foto2.jpg", 200, 150);
echo $etiqueta;
?>