<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MostraMapes</title>
    <?php 
    include_once 'funcions.php';
    estaAutenticat();
    include_once 'objectemapa.php';
    include_once 'objecteterritoris.php';
    include_once 'introduirterritoris.php';
    ?>
</head>
<body>
    <?php 
            
            // Carreguem el mapa desde la cookie
            $mapasJson = isset($_COOKIE['mapas']) ? $_COOKIE['mapas'] : null;
            $mapas = json_decode($mapasJson, true); // Decodifiquem el mapa
            if (json_last_error() !== JSON_ERROR_NONE) {
                echo "Error decodificant el JSON: " . json_last_error_msg();
                exit();
            }
   
            // Verifiquem si el mapa existeix
            if ($mapas&&is_array($mapas)) {
                foreach ($mapas as $mapa) {
                    echo "<strong>Nom del mapa:</strong> " . htmlspecialchars($mapa['nombre']) . "<br>";
                    echo "<img src='" . htmlspecialchars($mapa['imagen']) . "' alt='Mapa'><br>";

                    // Mostrem territoris (si en te)
                    if (isset($mapa['territorios'])&& is_array($mapa['territorios'])) {
                        echo "<strong>Territoris:</strong><br>";
                        foreach ($mapa['territorios'] as $territorio) {
                            echo "- " . htmlspecialchars($territorio['nombre']) . "<br>";
                        }
                        echo '<form method="POST" action="administrarmapes.php">';
                        echo '<label for="nomTerritori">Nom del Territori:</label>';
                        echo '<input type="text" name="nomTerritori" id="nomTerritori"><span style="background-color:red;">'.$msgErrorTerri.'</span><br>';

                        echo '<label for="descripcioTerritori">Descripció:</label>';
                        echo '<textarea name="descripcioTerritori" id="descripcioTerritori"></textarea><br>';

                        echo '<input type="hidden" name="nomMapa" value="'.htmlspecialchars($mapa['nombre']).'"><br>';
                        echo '<button type="submit">Afegir Territori</button><br>';
                        echo '</form>';
                    }
                } 
            }else {
                echo "No tens cap mapa enmagatzemat.";
            }
            
    ?>
    <a href="menumapes.php">Tornar</a>
</body>
</html>