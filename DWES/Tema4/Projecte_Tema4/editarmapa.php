<?php 
session_start();
include_once __DIR__. '/header.php';
include_once __DIR__. '/funcions.php';
include_once __DIR__. '/models/Mapa.php';
include_once __DIR__. '/models/MapaDAO.php';
include_once __DIR__. '/models/Territori.php';
include_once __DIR__. '/models/TerritoriDAO.php';


//Si no está loguejat el redirigim a login
if (!isset($_SESSION['usuari'])) {
    header('Location: index.php');
    exit;
  }

  
  //Iniciem variables dek mapa y del territoris per a pintar
  /*Variables Mapes*/ 
  $id = isset($_GET['id']) ? neteja_dades($_GET['id']) : (isset($_POST['idMapa']) ? neteja_dades($_POST['idMapa']) : "");
  $nomMapa="";
  $tamany="";
  // Asignem el valor del usuari, ja que sols es pot editar els mapes que u es propietari
  $propietari = isset($_SESSION['usuari']) ? $_SESSION['usuari']['email'] : "";
  $imatge="assets/mapa_standar.webp";
  $imatge_nova="";
  $timestamp=new DateTime();


  /*Variables Territoris*/ 
  $territoris = TerritoriDao::getTerritorisMapa($id) ?: [];
  $idT="";
  $idTMapa="";
  $nomTerritori="";
  $coordenades="";
  $gobernant="";
  $timestampT=new DateTime();;

  $is_actualitzat=false;//Per a mostrar un missatge quan actualitzem
  $is_insertat=false;//Per a mostrar un missatge quan insertem
  $is_eliminat=false;
  $is_terr_insertat=false;//Per a mostrar un missatge quan actualitzem
  $is_terr_eliminat=false;//Per a mostrar un missatge quan insertem
  
  //Missatges de error
  $msgErrorNom="";
 
  if (isset($_SESSION['msgErrorNomTerr'])) {
    $msgErrorNomTerr=$_SESSION['msgErrorNomTerr'];
    unset($_SESSION['msgErrorNomTerr']);
  }else{
    $msgErrorNomTerr="";
  }
  
  
  //Inicialització de selects
  $llistaTamanys = [
    '500x500px',
    '1080x1080px',
    '2500x2500px'
  ];
  
  
  #Nou Mapa,Carreguem formulari en blanc
  $mapa=new Mapa();
  if($_SERVER['REQUEST_METHOD']=="GET"){
    if(!isset($_GET["id"])){
      $titol_mapa="Nou Mapa";
    }
  }
  #Ens passen una id i carreguem el formulari amb les dades del mapa
  if($_SERVER['REQUEST_METHOD']=="GET"){
    if(isset($_GET["id"])&&!empty($_GET["id"])){
      $id=neteja_dades($_GET["id"]);
      $mapa=MapaDao::select($id);
      //Agafem els territoris de eixe mapa per pintarlos després
      $territoris = TerritoriDao::getTerritorisMapa($id) ?: [];
      //Si el mapa no existeix el redirigim al index.
      if ($mapa == null) {
        header("Location: index.php");
        exit;
      }
      //Carreguem info en les variables a pintar
      //Ho fem amb l'operador ternari per controlar els camps que són opcionals
      $nomMapa=(!empty($mapa->getNomMapa()))?$mapa->getNomMapa():"Nova pel·licula";
      $tamany=(!empty($mapa->getTamany()))?$mapa->getTamany():"500x500px";
      $propietari=(!empty($mapa->getPropietari()))?$mapa->getPropietari():"";
      $imatge=(!empty($mapa->getImatge()))?"uploads/".$mapa->getImatge():"assets/mapa_standar.webp";
      $timestamp=(!empty($mapa->getTimestamp()))?$mapa->getTimestamp():"";
    }
  }
  #En cas de que vinga del formulari:
  
  if ($_SERVER['REQUEST_METHOD'] === 'POST'){    
    //Arrepleguem tots els valors
    if(isset($_POST['enviar'])) {
      $id=neteja_dades($_POST['id']);
      $nomMapa=neteja_dades($_POST['nomMapa']);
      $tamany=neteja_dades($_POST['tamany']);
      $propietari = isset($_SESSION['usuari']) ? $_SESSION['usuari']['email'] : "";
      $imatge="assets/mapa_standar.webp";
      if(isset($_FILES['imatge'])&&$_FILES['imatge']['error']==0){
        $imatge_nova=pujar_imatge("imatge", $nomMapa);
      }
    
    #Cas 3: NO tenim id -> insertar
      if (empty($_POST['id'])){
      $mapa=new Mapa();
      $mapa->setNomMapa($nomMapa);
      $mapa->setTamany($tamany);
      $mapa->setPropietari($propietari);
      if(!empty($imatge_nova)){
          $mapa->setImatge($imatge_nova);
        }
      $id=MapaDao::insert($mapa);
      $mapa->setId($id);
      $is_insertat=true;
    }else{#Cas4: SI tenim id -->actualitzar
      $mapa=MapaDao::select($id);
      $mapa->setNomMapa($nomMapa);
      $mapa->setTamany($tamany);
      $mapa->setPropietari($propietari);
      if(!empty($imatge_nova)){
          $mapa->setImatge($imatge_nova);
        }
      MapaDao::update($mapa);
      $is_actualitzat=true;
    }
  }//Fi enviar
  if ((isset($_POST['enviarTerritori']))) {//Començem el territori
      
    // Creem de Territori
    if (MapaDao::select($id) === null) {
      $msgErrorNomTerr = "No pots afegir un territori sense abans crear o seleccionar un mapa.";
    }else{
      $territori = new Territori();
      $territori->setIdMapa(isset($_POST['idMapa']) ? neteja_dades($_POST['idMapa']) : '');
      $territori->setNomTerritori(isset($_POST['nomTerritori']) ? neteja_dades($_POST['nomTerritori']) : '');
      $territori->setCoordenades(isset($_POST['coordenades']) ? neteja_dades($_POST['coordenades']) : '');
      $territori->setGobernant(isset($_POST['gobernant']) ? neteja_dades($_POST['gobernant']) : '');
    
    
      if (!empty($territori->getNomTerritori()) && !empty($territori->getCoordenades())) {
        TerritoriDao::insert($territori);
        $is_terr_insertat = true;
      } else {
        $_SESSION['msgErrorNomTerr'] = "Els camps del territori són obligatoris.";
      }
    }
      // Amb la ID del mapa, agafem els territoris del mapa que tinc que traure y redirigim per a que no seu carregue tot
      $territoris = TerritoriDao::getTerritorisMapa($id) ?: [];
      header("Location: " . $_SERVER['PHP_SELF'] . "?id=" . $id);     
      exit;
    }
    // Eliminem el territorio
    if(isset($_POST['eliminarTerritori'])) {
      $idTerritori = isset($_POST['idTerritori']) ? neteja_dades($_POST['idTerritori']) : '';
      $idMapa = isset($_POST['id']) ? neteja_dades($_POST['id']) : ''; // Aquí recogemos la ID del mapa
      $territori = TerritoriDao::select($idTerritori);
      
      if ($territori !== null) {
          $result = TerritoriDao::delete($territori);
          if ($result > 0) {
              $is_terr_eliminat = true;
          }
      }
      //recarregem de nou
      $territoris = TerritoriDao::getTerritorisMapa($idMapa) ?: [];
      header("Location: " . $_SERVER['PHP_SELF'] . "?id=" . $idMapa);     
      exit;
    }
  }//Fi territori
//Controlem el missatge de error de haber intentat insertar un territori sense tindre mapa, ja que la redirecció sel carrega

//Actualitzem les imatges per si han pujat una nova
if(!empty($mapa->getImatge())){
  $imatge='./uploads/'.$mapa->getImatge();
}
//Actualiztem variables pròpies de la pàgina
$tamanys=$mapa->getTamany();

?>

  

<main>

    <h1><?=mb_strtoupper($mapa->getNomMapa(), 'UTF-8')?></h1>
    <?php
    //Mostrem missatges si ve actualització de dades
    if($is_insertat){?>
    <div>
        Mapa insertat correctament!
    </div>
    <?php
    }else if($is_actualitzat){?>
    <div>
        Mapa actualitzat correctament!
    </div>
    <?php
    }else if($is_eliminat){?>
      <div>
        Mapa eliminat correctament!
      </div>
    <?php }
    else if($is_terr_insertat){?>
      <div>
        Territori inserit correctament!
      </div>
    <?php 
    }else if($is_terr_eliminat){?>
      <div>
        Territori eliminat correctament!
      </div>
    <?php }
    ?>
    <!--Imatge y Territoris-->
    <div class="display">
      <div  class="cont_img_mapa">
        <div style="background-image: 
        url('<?=$imatge?>'); 
        background-size: 100% 100%; 
        height:300px;
        width:300px;
        background-position: center; "></div>
      </div>
      <div class="divTerritoris">
        <h2>TERRITORIS</h2>
          <!--Territoris del Mapa -->
          <?php
          if ($territoris && count($territoris) > 0) {
            foreach ($territoris as $territori) {
              ?>
              <div class="territori-item">
                <p class="tamany">Territori: <?php echo $territori->getNomTerritori(); ?></p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="display:inline;">
                  <div>
                    <input type="hidden" name="idTerritori" value="<?php echo $territori->getId(); ?>" />
                    <input type="hidden" name="id" value="<?= $id ?>" /> 
                    <button type="submit" name="eliminarTerritori">Eliminar</button>
                  </div>
                </form>
              </div>
              <?php
            }
          } else {
              ?>
              <p class="tamany">El Mapa no té cap territori assignat.</p>
              <?php
          }
          ?>
      </div>
    </div>
<div class="display">
  <fieldset>
    <legend><?= isset($nomMapa) && !empty($nomMapa) ? $nomMapa : "Nou Mapa" ?></legend>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">    
      <!--Nom del mapa-->
      <div>
        <label for="nomMapa">Nom del mapa</label>
        <input type="text" id="nomMapa"  name="nomMapa" placeholder="Introdueix el nom del mapa" value="<?=$nomMapa?>" required>
        <span style="background-color:red"><?=$msgErrorNom?></span>
      </div>
      <!-- Tamany -->
      <div>
        <label for="tamany">Tamany</label>
        
        <select name="tamany" id="tamany">
          <?php
          //Comprobem si te el tamany guardat y el seleccionem
          foreach ($llistaTamanys as $opcioTamany) {
              echo "<option value=\"$opcioTamany\"";
              if ($opcioTamany === $tamany) echo " selected";
              echo ">$opcioTamany</option>\n";
          }
          ?>
        </select>
      </div> 
      <div>
        <label for="imatge">Imatge mapa</label>
        <input type="file" name="imatge" id="imatge" accept="image/*" placeholder="imatge">
      </div>
      <input type="hidden" name="id" value="<?= $id ?>">

      <div>
        <button type="submit" name="enviar" id="enviar">Enviar</button>
        <button name="eliminar" onclick="window.location.href='borrarmapa.php?id=<?= $id?>';">Eliminar</button>
      </div>
    </form>
  </fieldset>
  <fieldset>
    <legend>Territoris</legend>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">    
      <!--Nom del territori-->
      <div>
        <label for="nomTerritori">Nom del Territori</label>
        <input type="text" id="nomTerritori" name="nomTerritori" placeholder="Introdueix el nom del territori" value="<?= isset($_POST['nomTerritori']) ? $_POST['nomTerritori'] : '' ?>" required>
        <span style="background-color:red"><?=$msgErrorNomTerr?></span>
      </div>
      <!-- Coordenades (en el futur será un areamap) -->
      <div>
        <label for="coordenades">Coordenades</label>
        <input type="text" id="coordenades" name="coordenades" placeholder="Introdueix les coordenades" value="<?= isset($_POST['coordenades']) ? $_POST['coordenades'] : '' ?>" required>
      </div> 
        <input type="hidden" name="idMapa" value="<?= $id ?>">
        <input type="hidden" name="id" value="<?= $id ?>">

      <div>
        <button type="submit" name="enviarTerritori">Enviar</button>
        
      </div>
    </form>
  </fieldset>
</div><!--Fi display-->     

</main>
  <?php
include_once __DIR__ . '/footer.php';
?>

    