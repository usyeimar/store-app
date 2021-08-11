<?php
require_once("Views/templates/HeaderAdmin.php");
?>

<body>
  <div class="d-flex" id="content-wrapper">

    <?php
    require_once("Views/templates/SidebarAdmin.php");
    ?>
    <div class="w-100">

      <?php
      require_once("Views/templates/NavBarAdmin.php");
      ?>

      <!-- Page Content -->
      <div id="content" class="bg-grey w-100">

        <section class="bg-light py-3">
          <div class="container">
            <div class="row">
              <div class="col-lg-9 col-md-8">

                <h1 class="font-weight-bold mb-0" id="tablaGestorArchivos">Clases</h1>
                <p class="lead text-muted">Revisa la última información</p>

              </div>
            </div>
          </div>
        </section>

        <section>
          <div class="container">
            <div class="row">
              <div class="col-lg-11 my-1">
                <div class="card rounded-0">
                  <div class="card-body">
                    <div class="shadow p-3 mb-4 bg-body rounded">
                      <section>


                        <div>
                          <h1><i class="fas fa-sticky-note"></i> Clases</h1>
                          <button class="btn btn-primary shadow-lg " type="button" data-toggle="modal" data-target="#ModalNotas"><i class="fas fa-plus-circle"></i> Nueva</button>
                          <p>Pulsa el boton de + parar agregar registros.</p>
                        </div>

                        


                      </section>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

      </div>

    </div>
  </div>


  <?php

  require_once("Views/templates/FooterAdmin.php");
  
  ?>