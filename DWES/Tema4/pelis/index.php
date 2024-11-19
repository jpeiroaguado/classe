<?php
session_start();
include_once __DIR__ . '/models/PeliDAO.php';
include_once __DIR__ . '/models/Peli.php';
include_once __DIR__ . '/header.php';

$busqueda = isset($_GET['peli_query']) ? neteja_dades($_GET['peli_query']) : '';

// Si venim de buscar
if ($busqueda !== '') {
    $llista_pelis = PeliDao::selectTitDir($busqueda);
} else {
    // Si NO venim de buscar
    $llista_pelis = PeliDao::getAll();
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

      <div class="row py-lg-5">

        <div class="col-lg-6 col-md-8 mx-auto text-white">
          <h1 class="fw-light">Pelis DWES</h1>
          <p class="lead">Projecte de prova de l'alumnat de DWES.</p>
          <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="input-group">
              <input class="form-control" type="text" name="peli_query" placeholder="Quina pel·licula estàs buscant?" value="<?= $busqueda?>" aria-label="Buscar">
              <button class="btn btn-primary" type="submit" name="busqueda" id="busqueda">
                <i class="bi bi-search"></i>
              </button>
            </div>
          </form>
        </div>
      </div>

    </section>
  </div>
  <div class="album py-5 bg-light">
    <div class="container">
    <?php
      //Missatge pel·licula eliminada
      if(!empty($missatge_borrat)){?>
        <div class="alert alert-success alert-dimissible fade show" role="alert">
          Pel·licula eliminada correctament!
          <button type="button" class="btn-close" data-bs-dimiss="alert" aria-label="Close"></button>
        </div>
      <?php
      }//fi missatge pel·li eliminada
      //No hi ha pel.lis
      if(!$llista_pelis){
      ?>
      <h1 class="text-center text-danger">No s'han trobat pelis></h1>
      <div style="width:100%;height:0;padding-bottom:57%;position:relative;"><img src="assets/giphy.gif" width="100%" height="80%"></div> 
     <?php
      }else{//si hi ha pelis?>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php 
          //recorregem el llistat de pelis
          foreach($llista_pelis as $peli){
            ?>
            <div class="col">
              <div class="card shadow-sm">
                <!--Controlamos si tiene o no pelicula-->
                <img class="card-img-top object-fit-cover" height="450" width="100%" src="uploads/<?= ($peli->getImatge() != "" )? $peli->getImatge() : 'proximamente.png'; ?>" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title"><?=$peli->getTitol()?></h5>
                  <p class="card-text"><?=substr($peli->getSinopsi(), 0, 150)?></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted"><?=$peli->getAny()?></small>
                    <div class="btn-group">
                      <a href="view_peli.php?id=<?=$peli->getId()?>" class="btn btn-dark"><i class="fa fa-eye"></i></a>
                      <?php if (isset($_SESSION['usuari'])){ ?>
                        <!-- Botóde edició sols per usuaris registrats -->
                        <a href="edit_peli.php?id=<?=$peli->getId()?>" class="btn btn-danger"><i class="fa fa-pencil-square"></i></a>
                      <?php } ?>
                      
                    </div>

                  </div>
                </div>
              </div>
            </div>
          <!--Fi peli-->
        <?php
         }//Tanca el foreach
        }//Tanca el else
         ?>
        
      </div>
    </div>
  </div>

</main>

<?php
include_once __DIR__ . '/footer.php';
