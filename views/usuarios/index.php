 <?php
require_once("Views/templates/HeaderAdmin.php");
//require_once("../../Class/ConexionDB.php");
//$Objeto = new ConexionDB();
//$sql = "SELECT * FROM tbusuarios";
//$query = $Objeto->EstablecerConexion()->query($sql);
//$ArrayData = $query->fetch_array();

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
                <h1 class="font-weight-bold mb-0">Usuarios</h1>
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
                              <h1><i class="fas fa-users"></i> Usuarios </h1>
                              <button class="btn btn-primary shadow-lg " type="button" data-toggle="modal" data-target="#exampleModalLong"><i class="fas fa-plus-circle"></i> Nuevo</button>
                              <p>Pulsa el boton de + parar agregar registros.</p>
                            </div>
                          
                          <div class="row">
                            <div class="col-md-12">
                              <div class="tile">
                                <div class="tile-body">
                                  <div class="table-responsive">
                                    <table class="table table-hover table-bordered " id="sampleTabl">

                                      <thead>
                                        <tr>
                                          <th>ID</th>
                                          <th>Nombre</th>
                                          <th>Apellido</th>
                                          <th>Email</th>
                                          <th>Password</th>
                                          <th>Ciudad</th>
                                          <th>Direccion</th>
                                          <th>Telefono</th>
                                          <th>Fecha Nacimiento</th>
                                          <th>Acciones</th>
                                        </tr>
                                      </thead>
                                      <?php
                                      //while ($ArrayData = $query->fetch_assoc()) {
                                      ?>
                                        <tbody>
                                          <?php 
                                          include_once 'Models/usuario.php';
                                          foreach($this->usuarios as $row) { 
                                            $usuario = new UserParam();
                                            $usuario = $row;
                                          
                                          ?>
                                          <tr>
                                            <td><?php echo $alumno->idUsuario; ?></td>
                                            <td><?php echo $alumno->NomUsuario; ?></td>
                                            <td><?php echo $alumno->ApellidoUsuario ?></td>
                                            <td><?php echo $alumno->EmailUsuario; ?></td>
                                            <td><?php echo $alumno->PassUsuario ?></td>
                                            <td><?php echo $alumno->CiudadUsuario ?></td>
                                            <td><?php echo $alumno->DireccionUsuario ?></td>
                                            <td><?php echo $alumno->TelefonoUsuario ?></td>
                                            <td><?php echo $alumno->FechaNacimiento ?></td>
                                            <td style="width:150px;">
                                              <div>
                                                <span class="btn btn-success btn-sm">
                                                  <span <i class="fas fa-edit"></i></span>
                                              </div>
                                              <div>
                                                <span class="btn btn-danger btn-sm">
                                                  <span class="fas fa-trash-alt"></span>
                                              </div>


                                            </td>
                                          </tr>
                                          <?php }?>
                                        
                                        </tbody>
                                        
                                        
                                    </table>
                                  </div>
                                </div>
                              </div>
                            </div>
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
  </div>


  <?php
  require_once("Views/Modals/CrearUsuario.php");
  require_once("Views/templates/FooterAdmin.php");
  ?>