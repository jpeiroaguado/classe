<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MostraMapes</title>
    <?php include_once 'objectemapa.php';
    require_once 'funcions.php';
    if (!estaAutenticado()){
        header('Location: login.php');
        exit();
    }?>
</head>
<body>
    <?php 
            session_start();
            // Carreguem el mapa desde la cookie
            $mapasJson = isset($_COOKIE['mapas']) ? $_COOKIE['mapas'] : null;
            $mapas = json_decode($mapasJson, true); // Decodifiquem el mapa
            if (json_last_error() !== JSON_ERROR_NONE) {
                echo "Error decoding JSON: " . json_last_error_msg();
            }// Verificar si el mapa existe
   
            
            if ($mapas) {
                foreach ($mapas as $mapa) {
                    echo "<strong>Nom del mapa:</strong> " . $mapa['nombre'] . "<br>";
                    echo "<img src='" . $mapa['imagen'] . "' alt='Mapa'><br>";

                    // Mostrem territoris (si en te)
                    if (isset($mapa['territorios'])) {
                        echo "<strong>Territoris:</strong><br>";
                        foreach ($mapa['territorios'] as $territorio) {
                            echo "- " . $territorio['nombre'] . "<br>";
                        }
                    }
                } 
            }else {
                echo "No tens cap mapa enmagatzemat.";
            }
    ?>

</body>
</html>