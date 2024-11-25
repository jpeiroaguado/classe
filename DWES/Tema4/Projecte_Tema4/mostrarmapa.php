
<?php
session_start();
include_once __DIR__. '/header.php';
include_once __DIR__. '/funcions.php';
include_once __DIR__. '/models/Mapa.php';
include_once __DIR__. '/models/MapaDAO.php';
include_once __DIR__. '/models/Territori.php';
include_once __DIR__. '/models/TerritoriDAO.php';

$mapa=null;

//Comprobe si tenim una id

if(($_SERVER['REQUEST_METHOD']=="GET")){
    if(isset($_GET["id"])&& !empty($_GET["id"])){
        $id=neteja_dades($_GET["id"]);
        $mapa=MapaDao::select($id);
    }
}
  ?>
<main>
  <?php
    if(!empty($mapa)){
  
// Amb la ID del mapa, agafem els territoris del mapa que tinc que traure
$territoris = TerritoriDao::getTerritorisMapa($id);
?>
<!-- Dades del mapa-->
<div class="mapes">
    <div class="container">
        <div name="mapa">
            <div class="divDades">
            <h2><?=mb_strtoupper($mapa->getNomMapa(), 'UTF-8')?></h2>
            </div>
            <div class="display">
                <div class="divDades2">
                        <h2>DADES</h2>
                        <p class="tamany"><?=substr($mapa->getTamany(), 0, 50)?></p>
                        <p class="tamany"><?=substr($mapa->getPropietari(), 0, 50)?></p>
                        <p class="tamany"><?=substr($mapa->getTimestamp(), 0, 50)?></p>
                </div>
                    <img class="img_index" height="800" width="800" src="uploads/<?= ($mapa->getImatge() != "" )? $mapa->getImatge() : 'mapa_standar.webp'; ?>" alt="'mapa_standar.webp'">  
                    <div class="extraInfo">
                        <h2>TERRITORIS</h2>
                        <!--Territoris del Mapa -->
                        <?php
                        

                        if ($territoris) {
                            foreach ($territoris as $territori) {
                                echo '"<p class="tamany">Territori: " '. $territori->getNomTerritori() . '</p>';
                            }
                        } else {
                            echo '<p class="tamany">El Mapa no te cap territori assignat.</p>';
                        }
                        ?>
                    </div>
            </div>
            <!--Fi mapes-->
        <?php
        
        }//fi dels detalls del mapa
        else{//No hem trobat cap mapa, o ens han intentat entrar en una id que no existeix
        ?>
        <h2>No s'ha trobat cap mapa am aquesta ID</h2>
        <?php
        }//Fi de no s'ha trobat mapa
        ?>
        
        
        </div><!--Div mapa-->
    </div><!--Div Contenedor-->
</div><!--Div Mapes-->  
</main>
<?php
include_once __DIR__ . '/footer.php';
?>