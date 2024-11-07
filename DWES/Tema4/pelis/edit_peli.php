<?php
include_once __DIR__ . '/models/PeliDao.php';
include_once __DIR__ . '/models/Peli.php';
include_once __DIR__ . '/header.php';
include_once __DIR__ . '/utils.php';

//Iniciem variables per a pintar
$id="";
$imatge_cap="assets/film.jpg";
$titol_pagina="";
$titol="";
$director="";
$imatge_portada="assets/proximamente.png";
$valoracio=1;
$generes="";
$llista_generes_peli=[];
$pais="";
$duracio=100;
$any=date("Y");
$sinopsi="";

$imatge_nova="";
$is_actualitzat=false;//Per a mostrar un missatge quan actualitzem
$is_insertat=false;//Per a mostrar un missatge quan insertem



//Inicialització de selects
$llista_paisos_select=[
  'Espanya',
  'Estats Units',
  'Italia',
  'Japó',
  'Regne Unit'
];

$llista_generes_select=[
  'Acció',
  'Ciència-ficció',
  'Comèdia',
  'Drama',
  'Fantasia',
  'Història',
  'Terror'
];



#Cas 1: És una nova pel·li-Carreguem formulari en blanc
$peli=new peli();
if($_SERVER['REQUEST_METHOD']=="GET"){
  if(!isset($_GET["id"])){
    $titol_pagina="Nova pel·lícula";
    $titol="";
  }
}
#Cas2: Ens passen una id i hem de carregar el formulari ab les dades d'eixa pel·li
if($_SERVER['REQUEST_METHOD']=="GET"){
  if(isset($_GET["id"])&&!empty($_GET["id"])){
    $id=neteja_dades($_GET["id"]);
    $peli=PeliDao::select($id);

    //Carreguem info en les variables a pintar
    //Ho fem amb ñ'operador ternari per controlar els camps que són opcionals
    $imatge_cap=(!empty($peli->getImatge()))?"uploads/".$peli->getImatge():"assets/film.jpg";
    $titol=(!empty($peli->getTitol()))?$peli->getTitol():"Nova pel·licula";
    $titol_pagina=$titol;//Canviem el títol de la pàgina
    $imatge_portada=(!empty($peli->getImatge()))?"uploads/".$peli->getImatge():"assets/proximamente.png";
    $valoracio=(!empty($peli->getValoracio()))?$peli->getValoracio():"1";
    $director=(!empty($peli->getDirector()))?$peli->getDirector():"";
    $generes=(!empty($peli->getGenere()))?$peli->getGenere():"";
    //Convertim la llista de generes separats per comes en un array
    $llista_generes_peli=explode(",", $generes);
    $pais=(!empty($peli->getPais()))?$peli->getPais():"";
    $duracio=(!empty($peli->getDuracio()))?$peli->getDuracio():"100";
    $any=(!empty($peli->getAny()))?$peli->getAny():"";
    $sinopsi=(!empty($peli->getSinopsi()))?$peli->getSinopsi():"";
  }
}
#En cas de que vinga del formulari:

if(isset($_POST['formulari'])){
  //Arrepleguem tots els valors
  $id=neteja_dades($_POST['id']);
  $imatge_cap="assets/film.jpg";
  $titol=neteja_dades($_POST['titol']);
  $director=neteja_dades($_POST['director']);
  $imatge_portada="assets/proximamente.png";
  $valoracio=neteja_dades($_POST['valoracio']);
  $generes=neteja_dades(implode(",", $_POST['genere']));
  $pais=neteja_dades($_POST['pais']);
  $duracio=neteja_dades($_POST['duracio']);
  $any=neteja_dades($_POST['any']);
  $sinopsi=neteja_dades($_POST['sinopsi']);
  if(isset($_FILES['imatge_portada'])&&$_FILES['imatge_portada']['error']==0){
    $imatge_nova=pujar_imatge("imatge_portada", $titol);
  }

#Cas 3: NO tenim id --> insertar
  if (empty($_POST['id'])){
  $peli=new Peli();
  $peli->setTitol($titol);
  $peli->setDirector($director);
  $peli->setValoracio($valoracio);
  $peli->setGenere($generes);
  $peli->setPais($pais);
  $peli->setDuracio($duracio);
  $peli->setAny($any);
  $peli->setSinopsi($sinopsi);
  if(!empty($imatge_nova)){
    $peli->setImatge($imatge_nova);
  }
  $id=PeliDao::insert($peli);
  $peli->setId($id);
  $is_insertat=true;
}else{#Cas4: SI tenim id -->actualitzar
  $peli=PeliDao::select($id);
  $peli->setTitol($titol);
  $peli->setDirector($director);
  $peli->setValoracio($valoracio);
  $peli->setGenere($generes);
  $peli->setPais($pais);
  $peli->setDuracio($duracio);
  $peli->setAny($any);
  $peli->setSinopsi($sinopsi);
  if(!empty($imatge_nova)){
    $peli->setImatge($imatge_nova);
  }
  PeliDao::update($peli);
  $is_actualitzat=true;
}

//Com es queda en la pàgina, tornem a carregar les imatges

//Actualitzem les imatges per si han pujat una nova
if(!empty($peli->getImatge())){
  $imatge_cap='./uploads/'.$peli->getImatge();
  $imatge_portada='./uploads/'.$peli->getImatge();
}
//Actualiztem variables pròpies de la pàgina
$llista_generes_peli=explode(",", $peli->getGenere());
$titol_pagina=$titol;
}
?>

<main>
  <div class="bg"
    style="background-image: 
      url('<?=$imatge_cap?>'); 
      background-size: cover; 
      background-position: center; 
      height: 30vh;">
    <section class="py-5 text-center container">

      <div class="row py-lg-5">
        <!--títol i director-->
        <div class="col-lg-6 col-md-8 mx-auto text-white">
          <h1 class="fw-light"><?=$titol_pagina?></h1>
          <p class="lead"><?=$director?></p>
          <!--<p>
          <a href="#" class="btn btn-primary my-2">Main call to action</a>
          <a href="#" class="btn btn-secondary my-2">Secondary action</a>
        </p>-->
        </div>
      </div>

    </section>
  </div>
  <div class="album py-5 bg-light">
    <div class="container">
      <?php
      //Mostrem missatges si ve d'actualizar o d'insertar
      if($is_insertat){?>
        <div class="alert alert-sucess alert-dimissible fade show" role="alert">
          Pel·licula insertada correctament!
          <button type="button" class="btn-close" data-bs-dimiss="alert" aria-label="Close"></button>
        </div>
      <?php
      }else if($is_actualitzat){?>
        <div class="alert alert-sucess alert-dimissible fade show" role="alert">
          Pel·licula actualitzada correctament!
          <button type="button" class="btn-close" data-bs-dimiss="alert" aria-label="Close"></button>
        </div>
      <?php
      }
      ?>
      <div class="row g-5">
        <div class="col-md-5 col-lg-4 order-md-last">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-dark">Portada</span>
          </h4>
          <!-- imatge portada -->
          <div class="text-center">
            <img src="<?=$imatge_portada?>" class="object-fit-cover" alt="portada_peli" height="395" width="100%">
          </div>
          <?php if(isset($id)&&!empty($id)){?>
          <!-- Eliminar pel·lícula-->
          <hr class="my-4">
          <a href="#" class="w-100 btn btn-danger btn-lg" data-bs-toggle="modal" data-bs-target="#deleteModal">
            <i class="bi bi-trash"></i> Eliminar pel·lícula</a>


          <!-- Delete Modal -->
          <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="deleteModalLabel">Eliminar pel·lícula</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Segur que vols eliminar la pel·lícula <strong><?=$titol?></strong>?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel·lar</button>
                  <button type="button" class="btn btn-danger" onclick="window.location.href='delete_peli.php?id=<?= $id?>';">Sí, eliminar pel·lícula</button>
                </div>
              </div>
            </div>
          </div>
          <?php }?>

        </div>
          <!--DADES DE LA PEL·LICULA-->
        <div class="col-md-7 col-lg-8">
          <h4 class="mb-3">Dades de la pel·lícula</h4>
          <form class="needs-validation" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
            <div class="row g-3">
              <input type="hidden" name="id" value="<?= $id?>"/>

              <!--Títol-->
              <div class="col-sm-6">
                <label for="firstName" class="form-label">Títol</label>
                <input type="text" class="form-control" name="titol" id="titol" placeholder="" value="<?=$titol?>" required>
                <div class="invalid-feedback">
                  El títol és obligatori
                </div>
              </div>
              <!--Valoració-->
              <div class="col-md-6">
                <label for="valoracio" class="form-label">Valoració (sobre 5)</label>
                <select class="form-select" name="valoracio" id="valoracio" required>
                <?php
                for($i=5;$i>0;$i--){
                  $selected="";
                  if($valoracio==$i){
                    $selected="selected";
                  }
                  echo "<option value=\"$i\" $selected>$i</option>\n";
                }
                ?>
                </select>
                <div class="invalid-feedback">
                  Selecciona una valoració.
                </div>
              </div>
              <!--País-->
              <div class="col-6">
                <label for="exampleDataList" class="form-label">País</label>
                <input class="form-control" list="datalistOptions" name="pais" id="pais" value="<?=$pais?>" placeholder="Escriu per buscar el nom del país..." required>
                <datalist id="datalistOptions">
                <?php
                foreach ($llista_paisos_select as $pais_select){
                  echo "<option value=\"$pais_select\">\n";
                }
                ?>
                </datalist>
                <div class="invalid-feedback">
                  El país és invàlid
                </div>
              </div>
              <!--Director-->
              <div class="col-6">
                <label for="director" class="form-label">Director</label>
                <input type="text" class="form-control" name="director" id="director" placeholder="Director" value="<?=$director?>" required>
                <div class="invalid-feedback">
                  El director és invàlid
                </div>
              </div>
              <!--Gènere-->
              <div class="col-6">
                <label for="genere" class="form-label">Gènere</label>
                <select class="form-select" name="genere[]" id="genere" multiple aria-label="multiple select">
                  <option selected>Selecciona un o més géneres</option>
                  <?php
                  foreach ($llista_generes_select as $genere_select){
                    $selected="";
                    if(in_array($genere_select, $llista_generes_peli)){
                      $selected="selected";
                    }
                    echo "<option value=\"$genere_select\" $selected>$genere_select</option>\n";
                  }
                  ?>
                </select>
                <div class="invalid-feedback">
                  Selecciona un génere
                </div>
              </div>
                <!--Duració-->
              <div class="col-3">
                <label for="duracio" class="form-label">Duració (minuts)</label>
                <input type="number" class="form-control" name="duracio" id="duracio" placeholder="100" value="<?=$duracio?>" required>
                <div class="invalid-feedback">
                  Duració invàlida
                </div>
              </div>
              <!--Any-->
              <div class="col-3">
                <label for="any" class="form-label">Any</label>
                <input type="number" class="form-control" name="any" id="any" placeholder="2024" value="<?=$any?>" required>
                <div class="invalid-feedback">
                  Any invàlid
                </div>
              </div>
                <!--Sinopsi-->
              <div class="col-12">
                <label for="FormControlTextarea1" class="form-label">Sinopsi</label>
                <textarea class="form-control" id="FormControlTextarea1" name="sinopsi" rows="3" required><?= $sinopsi?></textarea>
              </div>
              <!--Imatge portada-->
              <div class="col-12">
                <label for="imatge_portada" class="form-label">Imatge portada</label>
                <input type="file" class="form-control" name="imatge_portada" accept="image/*" placeholder="imatge_portada">
              </div>


            </div>
            
            <hr class="my-4">

            <button class="w-100 btn btn-primary btn-lg" type="submit" name="formulari" value="formulari"><i class="bi bi-floppy"></i> Guardar pel·lícula</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>

<?php
include_once __DIR__ . '/footer.php';
