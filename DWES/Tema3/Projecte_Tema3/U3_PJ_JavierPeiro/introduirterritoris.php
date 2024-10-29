<?php
require_once 'objectemapa.php';
include_once 'objecteterritoris.php';

$msgErrorTerri='';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if(!empty($_POST['nomTerritori'])){
                $nomMapa = $_POST['nomMapa'];
                $nomTerritori = $_POST['nomTerritori'];
                $descripcioTerritori = $_POST['descripcioTerritori'];
                

                
                // Carregem el array de mapes de les cookies
                if (isset($_COOKIE['mapas'])) {
                    $mapasJson = $_COOKIE['mapas'];
                    $arrayMapas = json_decode($mapasJson, true);
            
                    // Verifiquem errors
                    if (json_last_error() !== JSON_ERROR_NONE) {
                        echo "Error decodificant el JSON: " . json_last_error_msg();
                        exit();
                    }
                    
                    // Contem el array
                    foreach ($arrayMapas as &$mapaData) {
                        if ($mapaData['nombre'] === $nomMapa) {
                            $nuevoTerritorio = [
                                'nombre' => $nomTerritori,
                                'descripcion' => $descripcioTerritori
                            ];
            
                            // Comprobem que el array esta be
                            if (!isset($mapaData['territorios'])) {
                                $mapaData['territorios'] = [];
                            }
                            $mapaData['territorios'][] = $nuevoTerritorio;
                            break;
                        }
                    }
            
                    // Guardem el array de nou
                    $mapasJson = json_encode($arrayMapas);
                    setcookie('mapas', $mapasJson, time() + 3600);
            
                    header('Location: administrarmapes.php');
                    exit();
                } else {
                    echo "No se encontraron mapas en las cookies.";
                }
            }else{
                $msgErrorTerri = "&#128561 El nom del territori no pot estar buit.";
            }
        }

?>