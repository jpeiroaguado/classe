<?php
session_start();
include_once __DIR__. '/models/PeliDAO.php';
include_once __DIR__. '/models/Peli.php';
include_once __DIR__. '/header.php';
include_once __DIR__. '/utils.php';

//Para buscar botones en bootstrapp icons, hay ejemplo de uso en el icono de guardar peli
$peli=null;


//Comprovem si ens han enviat una id i intentem recuperar la pel.li
if(($_SERVER['REQUEST_METHOD']=="GET")){
  if(isset($_GET["id"])&& !empty($_GET["id"])){
    $id=neteja_dades($_GET["id"]);
    $peli=PeliDao::select($id);
  }
}
?>
<main>
  <?php
    if(!empty($peli)){
  ?>
  <!-- imatge de capçalera-->
  <div class="bg"
      style="background-image: 
      url('uploads/<?=($peli->getImatge() != "" )? $peli->getImatge() : 'proximamente.png';?>'); 
      background-size: cover; 
      background-position: center; 
      height: 30vh;">
    
  </div>
  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row mb-2">
        <div class="col-md-12">
          <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col-md-4 d-none d-lg-block">
              <img src="uploads/<?=($peli->getImatge() != "" )? $peli->getImatge() : 'proximamente.png';?>" class="object-fit-cover" alt="portada_peli" height="450" width="100%">

            </div>
            <!-- Dades de la pel·li-->
            <div class="col p-4 d-flex flex-column position-static">
              <strong class="d-inline-block mb-2 text-primary"><?=$peli->getDirector() ?> - <?=$peli->getAny() ?> - <?=$peli->getDuracio() ?> - <?=$peli->getPais() ?></strong>
              <h1 class="d-inline-flex justify-content-between align-items-center">
              <?=$peli->getTitol() ?>
                <!-- Puntuació-->
                <span class="ms-3">
                  <?php
                  $i=1;
                  while($i<=$peli->getValoracio()){
                    echo "<i class=\"bi bi-star-fill fs-5\"></i>\n";
                    $i++;
                  }
                  while($i<=5){
                    echo "<i class=\"bi bi-star fs-5\"></i>\n";
                    $i++;
                  }
                  ?>
                </span>
              </h1>
              <!-- Argument-->
              <p class="card-text mb-auto"><?=$peli->getSinopsi()?></p>

              <!-- Gèneres-->
              <p class="mb-2 text-end">
                <?php 
                $llista_generes=explode(",", $peli->getGenere());
                foreach($llista_generes as $genere){
                  echo "<a href=\"#\" class=\"btn btn-primary\">$genere</a>\n";
                }
                ?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
    }//fi dels detalls peli, si no hem trobat pel·li
    else{
    ?>
      <div class="bg" style="background-image:
                            url('assets/film.jpg');
                            background-size: cover;
                            background-position: center;
                            height: 30vh;">
          <section class="row py-lg-5">
            <!--Missatge-->
            <div class="row py-lg-5">
              <div class="col-lg-6 col-md-8 mx-auto text-white">
                <h1 class="fw-light">No hem trobat la pel.licula seleccionada</h1>
                <a href="index.php" class="btn btn-warning">Torna a l'index i prova una altra</a>
              </div>
            </div>
          </section>
        </div>
    <?php
    }//Fi de no s'ha trobat peli
    ?>
</main>
<?php
include_once __DIR__ . '/footer.php';
