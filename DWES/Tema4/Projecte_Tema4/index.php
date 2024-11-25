<?php
session_start();
include_once __DIR__.'/models/MapaDAO.php';
include_once __DIR__.'/models/Mapa.php';
include_once __DIR__.'/funcions.php';
include_once __DIR__.'/header.php';

$busqueda = isset($_GET['busqueda_mapa']) ? neteja_dades($_GET['busqueda_mapa']) : '';

// Si venim de buscar
if ($busqueda !== '') {
    $llista_mapes = MapaDao::selectNomTamPro($busqueda);
} else {
    // Si NO venim de buscar
    $llista_mapes = MapaDao::getAll();
}

//Comprovem si ve d'eliminar una pel·li
$missatge_borrat="";
if(isset($_SESSION['missatge_borrat'])){
  $missatge_borrat=$_SESSION['missatge_borrat'];
  unset($_SESSION["missatge_borrat"]);
}
?>
<main>
    <section class="py-5 text-center container">
      <div>
        <h1 class="fw-light">MAPES</h1>
        <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <div class="input-group">
            <input type="text" name="busqueda_mapa" placeholder="Buscar en mapes" value="<?= $busqueda?>" aria-label="Buscar">
            <button type="submit" name="busqueda" id="busqueda">Buscar</button>
          </div>
        </form>
      </div>
    </section>

  </div>
  <div class="mapes">
    <div class="container">
    <?php
      //Missatge mapa eliminat
      if(!empty($missatge_borrat)){?>
        <div class="Missatge_borrat">
          Mapa eliminat correctament!
          <button type="button"></button>
        </div>
      <?php
      }//fi missatge mapa eliminat
      //No hi ha mapes
      if(!$llista_mapes){
      ?>
      <h2>No s'han trobat mapes</h2>
      <h1><a href="index.php" class="link">Tornar</a></h1>
     <?php
      }else{//si hi ha mapes?>
        <div name="mapa">
        <?php 
          //recorregem el llistat de pelis
          foreach($llista_mapes as $mapa){
            ?>
            <div class="col">
              <div class="divDades">
                <h2><?=$mapa->getNomMapa()?></h2>
                <p class="tamany"><?=substr($mapa->getTamany(), 0, 50)?></p>
              </div>
              <img class="img_index" height="500" width="500" src="uploads/<?= ($mapa->getImatge() != "" )? $mapa->getImatge() : 'mapa_standar.webp'; ?>" alt="'mapa_standar.webp'">
              <div class="botones">
                <a href="mostrarmapa.php?id=<?=$mapa->getId()?>" class="tooltip">
                  <img class="icono-pequeño" src="./assets/boton_ver.png" alt="Ver mapa"></img>
                  <span   class="tooltip-text">Vore mapa</span>
                </a>
                <?php if (isset($_SESSION['usuari'])&& $_SESSION['usuari']['email'] === $mapa->getPropietari()){ ?>
                  <a href="editarmapa.php?id=<?=$mapa->getId()?>" class="tooltip">
                    <img class="icono-pequeño" src="./assets/boton_editar.png" alt="Editar mapa"></img>
                    <span class="tooltip-text">Editar mapa</span>
                  </a>
                <?php } ?>
              </div>


            </div>
          <!--Fi mapes-->
        <?php
         }//Tanca el foreach
      }//Tanca el else
      ?>
        
      </div><!--Div mapa-->
    </div><!--Div Contenedor-->
  </div><!--Div Mapes-->
</main>

<?php
include_once __DIR__ . '/footer.php';
?>
