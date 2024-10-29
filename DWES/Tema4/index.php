<?php
include_once __DIR__ . '/header.php';
include_once __DIR__ . '/models/Peli.php';
include_once __DIR__ . '/models/PeliDAO.php';

//Llistem les pel.lis
$llista_pelis=PeliDao::getAll();

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
          <form method="post" action="#">
            <div class="input-group">
              <input class="form-control" type="text" name="peli_query" placeholder="Quina pel·licula estàs buscant?" aria-label="Buscar">
              <button class="btn btn-primary" type="submit">
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
      //No hi ha pel.lis
      if(!$llista_pelis){
      ?>
      <h1 class="text-center text-danger">No s'han trobat pelis></h1>
      <div style="width:100%;height:0;padding-bottom:57%;position:relative;"><img src="assets/giphy.gif" width="100%" height="80%"></div> 
     <?php
      }else{//si hi ha pelis
       ?> 
     
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

        <!-- INICI PELI -->
        <div class="col">
          <div class="card shadow-sm">
            <img class="card-img-top object-fit-cover" height="450" width="100%" src="uploads/joker.jpg" alt="Card image cap">

            <div class="card-body">
              <h5 class="card-title">Card title2</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">2023</small>
                <div class="btn-group">
                  <a href="view_peli.php" class="btn btn-dark"><i class="fa fa-eye"></i></a>
                  <a href="edit_peli.php" class="btn btn-danger"><i class="fa fa-pencil-square"></i></a>
                </div>


              </div>
            </div>
          </div>
        </div>

        <!-- FI PELI -->
        <?php
         }
         ?>
        <div class="col">
          <div class="card shadow-sm">
          <img class="card-img-top object-fit-cover" height="450" width="100%" src="uploads/joker.jpg" alt="Card image cap">

            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">2023</small>
                <div class="btn-group">
                  <a href="edit_peli.php" class="btn btn-dark"><i class="fa fa-eye"></i></a>
                  <a href="edit_peli.php" class="btn btn-danger"><i class="fa fa-pencil-square"></i></a>
                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
          <img class="card-img-top object-fit-cover" height="450" width="100%" src="uploads/joker.jpg" alt="Card image cap">

            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">2023</small>
                <div class="btn-group">
                  <a href="edit_peli.php" class="btn btn-dark"><i class="fa fa-eye"></i></a>
                  <a href="edit_peli.php" class="btn btn-danger"><i class="fa fa-pencil-square"></i></a>
                </div>

              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card shadow-sm">
          <img class="card-img-top object-fit-cover" height="450" width="100%" src="uploads/joker.jpg" alt="Card image cap">

            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">2023</small>
                <div class="btn-group">
                  <a href="edit_peli.php" class="btn btn-dark"><i class="fa fa-eye"></i></a>
                  <a href="edit_peli.php" class="btn btn-danger"><i class="fa fa-pencil-square"></i></a>
                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
          <img class="card-img-top object-fit-cover" height="450" width="100%" src="uploads/joker.jpg" alt="Card image cap">

            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">2023</small>
                <div class="btn-group">
                  <a href="edit_peli.php" class="btn btn-dark"><i class="fa fa-eye"></i></a>
                  <a href="edit_peli.php" class="btn btn-danger"><i class="fa fa-pencil-square"></i></a>
                </div>

              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card shadow-sm">
          <img class="card-img-top object-fit-cover" height="450" width="100%" src="uploads/joker.jpg" alt="Card image cap">

            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">2023</small>
                <div class="btn-group">
                  <a href="edit_peli.php" class="btn btn-dark"><i class="fa fa-eye"></i></a>
                  <a href="edit_peli.php" class="btn btn-danger"><i class="fa fa-pencil-square"></i></a>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</main>

<?php
include_once __DIR__ . '/footer.php';
