<?php
      
$user = $this->d['user'];
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
                <section>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-11 my-1">
                                <div class="card rounded-0">
                                    <div class="card-body">
                                        <section>
                                            <div class="row user">
                                                <div class="col-md-12">
                                                    <div id="user-container" class=" info container">
                                                        <div id="user-header">
                                                            <div id="user-info-container">
                                                                <div id="user-photo">
                                                                    <?php if ($user->getPhoto() != '') { ?>
                                                                        <img src="public/img/photos/<?php echo $user->getPhoto(); ?>" width="200" />
                                                                    <?php }
                                                                    ?>
                                                                </div>
                                                                <div id="user-info">
                                                                    <h2><?php echo ($user->getName() != '') ? $user->getName() : $user->getUsername();  ?></h2>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--Menu-->
                                                <div class="col-md-3">
                                                    <div class="tile p-0">
                                                        <ul class="nav flex-column nav-tabs user-tabs">
                                                            <li class="nav-item"><a class="nav-link active" href="#info-user-container" data-toggle="tab">Personalizar Usuario</a></li>
                                                            <li class="nav-item"><a class="nav-link" href="#password-user-container" data-toggle="tab">Password</a></li>
                                                            <li class="nav-item"><a class="nav-link" href="#budget-user-container" data-toggle="tab">Presupuesto</a></li>
                                                            <li class="nav-item"><a class="nav-link" href="#user-info-settings" data-toggle="tab">Mis Datos</a></li>

                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="tab-content">

                                                        <div class="tab-pane active" id="info-user-container">

                                                            <form action=<?php echo constant('URL') . '/user/updateName' ?> method="POST">
                                                                <div class="section">
                                                                    <label class="control-label" for="name">Nombre</label>
                                                                    <input class="form-control" type="text" name="name" id="name" class="" autocomplete="off" required value="<?php echo $user->getName() ?>">
                                                                    <br>
                                                                    <div><input class="btn btn-primary" type="submit" value="Cambiar nombre" /></div>
                                                                </div>
                                                            </form>

                                                            <form class="form-group" action="<?php echo constant('URL') . '/user/updatePhoto' ?>" method="POST" enctype="multipart/form-data">
                                                                <div class="section">
                                                                    <div><label class="control-label" for="photo">Foto de perfil</label></div>

                                                                    <?php
                                                                    if (!empty($user->getPhoto())) {
                                                                    ?>
                                                                        <img src="<?php echo constant('URL') ?>/public/img/photos/<?php echo $user->getPhoto() ?>" width="50" height="50" />
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                    <input type="file" name="photo" id="photo" class="form-control" autocomplete="off" required>
                                                                    <br>
                                                                    <div><input class="btn btn-primary" type="submit" value="Cambiar foto de perfil" /></div>
                                                                </div>
                                                            </form>
                                                        </div>

                                                        <div class="tab-pane fade" id="password-user-container">
                                                            <div class="tile-body">
                                                                <form class="form-group" action="<?php echo constant('URL') . '/user/updatePassword' ?>" method="POST">
                                                                    <div class="section">
                                                                        <label class="label-control" for="current_password">Password actual</label>
                                                                        <input class="form-control" type="password" name="current_password" id="current_password" autocomplete="off" required>

                                                                        <label class="label-control" for="new_password">Nuevo password</label>
                                                                        <input class="form-control" type="password" name="new_password" id="new_password" autocomplete="off" required>
                                                                        <br>
                                                                        <div><input class="btn btn-primary" type="submit" value="Cambiar password" /></div>
                                                                    </div>
                                                                </form>
                                                            </div>

                                                        </div>
                                                        <div class="tab-pane fade" id="budget-user-container">
                                                            <form action="<?php echo constant('URL') .'/user/updateBudget' ?>" method="POST">
                                                                <div class="section">
                                                                    <label class="label-control" for="budget">Definir presupuesto</label>
                                                                    <div><input class="form-control" type="number" name="budget" id="budget" autocomplete="off" required value="<?php echo $user->getBudget() ?>"></div>
                                                                    <br>
                                                                    <div><input class="btn btn-primary" type="submit" value="Actualizar presupuesto" /></div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        
                                                        <div class="tab-pane fade" id="user-info-settings">
                                                            <h4>Mi informacion <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#user-update" type="button"><i class="fas fa-pencil-alt" aria-hidden="true"></i></button></h4>
                                                            <table class="table table-bordered">
                                                                <tbody>
                                                                   
                                                                    <tr>
                                                                        <td>Nombre:</td>
                                                                        <td><?php echo $user->getName(); ?></td>
                                                                    </tr>
                                                                    
                                                                    <tr>
                                                                        <td>Email(Usuario) :</td>
                                                                        <td><?php echo $user->getEmail(); ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Presupuesto :</td>
                                                                        <td><?php echo $user->getBudget(); ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Ciudad :</td>
                                                                        <td><?php echo $user->getCiudad(); ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Direccion :</td>
                                                                        <td><?php echo $user->getDireccion(); ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Telefono :</td>
                                                                        <td><?php echo $user->getTelefono(); ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Fecha Nacimiento :</td>
                                                                        <td><?php echo $user->getFechaNacimiento(); ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Role :</td>
                                                                        <td><?php echo $user->getRole(); ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Status :</td>
                                                                        <td><?php echo $user->getStatus(); ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>ID Secreta :</td>
                                                                        <td><?php echo $user->getSecretId(); ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
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
                </section>
            </div>
        </div>
        <?php 
        require_once("Views/templates/FooterAdmin.php");
        require_once("views/Modals/update/userUpdate.php")

        ?>
    </div>