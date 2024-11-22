<?php 
include_once __DIR__. '/header.php';
include_once __DIR__. '/funcions.php';
include_once __DIR__. '/models/Mapa.php';
include_once __DIR__. '/models/MapaDAO.php';
include_once __DIR__. '/models/Territori.php';
include_once __DIR__. '/models/TerritoriDAO.php';

//Si no está loguejat el redirigim a login
/*if (!isset($_SESSION['usuari'])) {
    header('Location: index.php');
    exit;
  }*/
  
  
  //Iniciem variables dek mapa y del territoris per a pintar
  /*Variables Mapes*/ 
  $id="";
  $nomMapa="";
  $tamany="";
  $propietari="";
  $imatge="assets/mapa_standar.webp";
  $timestamp=new DateTime();


  /*Variables Territoris*/ 
  $idT="";
  $idTMapa="";
  $nomTerritori="";
  $coordenades="";
  $gobernant="";
  $timestampT=new DateTime();;

  $is_actualitzat=false;//Per a mostrar un missatge quan actualitzem
  $is_insertat=false;//Per a mostrar un missatge quan insertem
  
  //Missatges de error
  $msgErrorNom="";
  
  
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
      $titol_pagina="Nou Mapa";
    }
  }
  #Ens passen una id i carreguem el formulari amb les dades del mapa
  if($_SERVER['REQUEST_METHOD']=="GET"){
    if(isset($_GET["id"])&&!empty($_GET["id"])){
      $id=neteja_dades($_GET["id"]);
      $mapa=MapaDao::select($id);
  
      //Si el mapa no existeix el redirigim al index.
      if ($mapa == null) {
        header("Location: index.php");
        exit;
      }
      //Carreguem info en les variables a pintar
      //Ho fem amb ñ'operador ternari per controlar els camps que són opcionals
      $nomMapa=(!empty($mapa->getNomMapa()))?$mapa->getNomMapa():"Nova pel·licula";
      $titol_pagina=$nomMapa;//Canviem el títol de la pàgina
      $tamany=(!empty($mapa->getTamany()))?$mapa->getTamany():"500x500px";
      $propietari=(!empty($mapa->getPropietari()))?$mapa->getPropietari():"";
      $imatge=(!empty($mapa->getImatge()))?"uploads/".$mapa->getImatge():"assets/mapa_standar.webp";
      $timestamp=(!empty($timestamp->getTimestamp()))?$mapa->getTimestamp():"";
    }
  }
  #En cas de que vinga del formulari:
  
  if(isset($_POST['formulari'])){
    //Arrepleguem tots els valors
    $id=neteja_dades($_POST['id']);
    $nomMapa=neteja_dades($_POST['nomMapa']);
    $tamany=neteja_dades($_POST['tamany']);
    $propietari=neteja_dades($_POST['propietari']);
    $imatge="assets/mapa_standar.webp";
    if(isset($_FILES['imatge_mapa'])&&$_FILES['imatge_mapa']['error']==0){
      $imatge_nova=pujar_imatge("imatge_portada", $nomMapa);
    }
  
  #Cas 3: NO tenim id --> insertar
    if (empty($_POST['id'])){
    $mapa=new Mapa();
    $mapa->setNomMapa($titol);
    $mapa->setTamany($tamany);
    $mapa->setpropietari($propietari);
    if(!empty($imatge_nova)){
        $mapa->setImatge($imatge_nova);
      }
    $id=MapaDao::insert($mapa);
    $mapa->setId($id);
    $is_insertat=true;
  }else{#Cas4: SI tenim id -->actualitzar
    $mapa=MapaDao::select($id);
    $mapa->setNomMapa($titol);
    $mapa->setTamany($tamany);
    $mapa->setpropietari($propietari);
    if(!empty($imatge_nova)){
        $mapa->setImatge($imatge_nova);
      }
    MapaDao::update($mapa);
    $is_actualitzat=true;
  }
  
  //Com es queda en la pàgina, tornem a carregar les imatges
  
  //Actualitzem les imatges per si han pujat una nova
  if(!empty($mapa->getImatge())){
    $imatge_mapa='./uploads/'.$mapa->getImatge();
  }
  //Actualiztem variables pròpies de la pàgina
  $tamanys=$mapa->getTamany();
  }
?>

<main>

    <h1><?=$nomMapa?></h1>
    <?php
    //Mostrem missatges si ve d'actualizar o d'insertar
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
    }
    ?>
    <!--Imatge-->
    <div style="background-image: 
    url('<?=$imatge_mapa?>'); 
    background-size: cover; 
    height:300px;
    width:300px; "></div>


  <fieldset>
    <legend>Mapa</legend>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">    
        <!--Nom del mapa-->
        <label for="nomMapa">Nom del mapa</label>
        <input type="text" id="nomMapa"  name="nomMapa" placeholder="Introdueix el nom del mapa" value="<?=$nomMapa?>" required>
        <span style="background-color:red"><?=$msgErrorNom?></span><br>
        <!-- Tamany -->
        <label for="tamany">Tamany</label>
        
        <select name="tamanys[]" id="tamanys" multiple>
        <?php
        foreach ($llistaTamanys as $tamany) {
            echo "<option value=\"$tamany\">$tamany</option>\n";
        }
        ?>
    </select>
      <label for="imatge">Imatge mapa</label>
      <input type="file" name="imatge_mapa" accept="image/*" placeholder="imatge">



        <!-- Registrar-se -->
        <button type="submit" class="btn btn-primary w-100" name="registre" id="registre">Registrat</button>
    </form>
</fieldset><br>
        <!-- Inici sessió -->
        <div>
          <p>Ja tens un compte? <a href="login.php">Inicia sessió ací</a></p>
        </div>

</main>
  <?php
include_once __DIR__ . '/footer.php';
//Comprovem si ens han enviat una id i intentem recuperar el mapa
    if(($_SERVER['REQUEST_METHOD']=="GET")){
        if(isset($_GET["id"])&& !empty($_GET["id"])){
            $id=neteja_dades($_GET["id"]);
            $mapa=MapaDao::select($id);
        }
    }  
            // Carreguem el mapa desde la bbdd
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
    