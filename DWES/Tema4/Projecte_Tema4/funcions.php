<?php
function neteja_dades($dada){
    $dada=trim($dada);
    $dada=stripslashes($dada);
    $dada=htmlspecialchars($dada);
    return $dada;
}
function estaAutenticat() {
    session_start();
    if (!isset($_SESSION['usuari'])) {
        // Si no está autenticat, el redirigim a la página de login
        header('Location: login.php');
    }
}
function pujar_imatge($nom_form, $nom_foto){
    $target_dir="./uploads";
    $nom_foto=str_replace(" ", "_",$nom_foto);
  
    $tmp_name= $_FILES[$nom_form]['tmp_name'];
    if(is_dir($target_dir)&& is_uploaded_file($tmp_name)){
      $img_type=$_FILES[$nom_form]['type'];
  
      //Si es tracta de una imatge
      if(((strpos($img_type, "gif")||strpos($img_type, "jpg")||strpos($img_type, "jpeg"))||strpos($img_type, "png"))){
        if(strpos($img_type, "jpeg")){
          $extensio='jpeg';
        }else{
          $extensio=substr($img_type, -3, 3);
        }
  
        if(move_uploaded_file($tmp_name, $target_dir.'/'.$nom_foto.'.'.$extensio)){
          return $nom_foto.'.'.$extensio;
        }
      }
    }  
    return null;
  }
?>