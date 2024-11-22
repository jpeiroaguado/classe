<?php
session_start();
include_once __DIR__.'/models/MapaDAO.php';
include_once __DIR__.'/models/Mapa.php';
include_once __DIR__.'/funcions.php';
include_once __DIR__.'/header.php';

$busqueda = isset($_GET['busqueda_mapa']) ? neteja_dades($_GET['busqueda_mapa']) : '';

// Si venim de buscar
if ($busqueda !== '') {
    $llista_mapes = MapaDao::selectNomTam($busqueda);
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
  <div class="bg"
    style="background-image: 
      url('assets/film.jpg'); 
      background-size: cover; 
      background-position: center; 
      height: 30vh;">
    <section class="py-5 text-center container">
      <div>
        <h1 class="fw-light">Projecte Mapes.</h1>
        <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <div class="input-group">
            <input type="text" name="busqueda_mapa" placeholder="Selecciona el nom del mapa o un tamany" value="<?= $busqueda?>" aria-label="Buscar">
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
      <div style="width:100%;height:0;padding-bottom:57%;"><img src="./assets/mapa_standar_no.webp" width="100%" height="80%"></div> 
     <?php
      }else{//si hi ha mapes?>
        <div name="mapa">
        <?php 
          //recorregem el llistat de pelis
          foreach($llista_mapes as $mapa){
            ?>
            <div class="col">
              <!--Controlamos si tiene o no pelicula-->
              <img class="card-img-top object-fit-cover" height="450" width="100%" src="uploads/<?= ($mapa->getImatge() != "" )? $mapa->getImatge() : 'mapa_standar.webp'; ?>" alt="'mapa_standar.webp'">
                <h5><?=$mapa->getNomMapa()?></h5>
                <p class="card-text"><?=substr($mapa->getTamany(), 0, 50)?></p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="botones">
                    <a href="mostrarmapa.php?id=<?=$mapa->getId()?>"><img src="./assets/boton_ver.png"></img></a>
                    <?php if (isset($_SESSION['usuari'])){ ?>
                      <!-- Botóde edició sols per usuaris registrats -->
                      <a href="editarmapa.php?id=<?=$mapa->getId()?>"><img src="./assets/boton_editar.png"></img></a>
                    <?php } ?>
                  </div>

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
