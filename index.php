<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="color-scheme" content="light dark" />
    <title>DWES | Unitat 1</title>
    <meta name="description" content="DWES." />

    <!-- Pico.css -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@picocss/pico@2.0.6/css/pico.min.css"
    />
  </head>

  <body>
    <!-- Header -->
    <header class="container">
      <hgroup>
        <h1>DWES</h1>
        <p>Desenvolupament web en entorn servidor</p>
      </hgroup>
      
    </header>
    <!-- ./ Header -->

    <!-- Main -->
    <main class="container">
     

      <!-- Typography-->
      <section id="typography">
      	

		<?php
		 
		if (isset($_GET['enviar'])) {
		  $name = htmlspecialchars($_REQUEST['nom']);
		  if (!empty($name)) {
		    echo "<h1>Hello". $name ."!</h1>";
			}
		}
		?>


        <h2>Exemples codi Javascript i PHP</h2>
       
             

      <!-- Form elements-->
      <section id="form">
        <form>
          <h2>Form elements</h2>

          
          <!-- Text -->
          <label for="text">Text</label>
          <input type="text" id="text" name="nom" placeholder="Nom" />
          <small>Escriu el teu nom.</small>

          <!-- Buttons -->
          <input type="submit" name="enviar" value="Enviar" onclick="saluda()" />
        </form>
      </section>
      <!-- ./ Form elements-->
    <script>
		function saluda() {
			var nom = document.getElementById("text").value;

			if (nom == null || nom == ""){
				alert('Hello Desconegut!');
			}
			else{
				alert('Hello ' + nom);		
			}
		  
		}
	</script>

      

    <!-- Minimal theme switcher -->
    <script src="js/minimal-theme-switcher.js"></script>

    <!-- Modal -->
    <script src="js/modal.js"></script>
  </body>
</html>
