<?php
$user =  $this->d['user'];
require_once("Views/templates/HeaderAdmin.php");
?>

<body>
    <div class="d-flex" id="content-wrapper">

       
        <div class="w-100">

            

            <!-- Page Content -->
            <div id="content" class="bg-grey w-100">
                <section>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-11 my-1">
                                <div class="card rounded-0">
                                    <div class="card-body">

                                        <section>
                                            <div id="user-container" class="container">
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

                                                <div id="side-menu">
                                                    <ul>
                                                        <li><a href="#info-user-container">Personalizar usuario</a></li>
                                                        <li><a href="#password-user-container">Password</a></li>
                                                        <li><a href="#budget-user-container">Presupuesto</a></li>
                                                    </ul>
                                                </div>
                                                <div id="user-section-container">

                                                    <section id="info-user-container">
                                                        <form action=<?php echo constant('URL') . 'user/updateName' ?> method="POST">
                                                            <div class="section">
                                                                <label for="name">Nombre</label>
                                                                <input type="text" name="name" id="name" autocomplete="off" required value="<?php echo $user->getName() ?>">
                                                                <div><input type="submit" value="Cambiar nombre" /></div>
                                                            </div>
                                                        </form>

                                                        <form action="<?php echo constant('URL') . 'user/updatePhoto' ?>" method="POST" enctype="multipart/form-data">
                                                            <div class="section">
                                                                <label for="photo">Foto de perfil</label>

                                                                <?php
                                                                if (!empty($user->getPhoto())) {
                                                                ?>
                                                                    <img src="<?php echo constant('URL') ?>public/img/photos/<?php echo $user->getPhoto() ?>" width="50" height="50" />
                                                                <?php
                                                                }
                                                                ?>
                                                                <input type="file" name="photo" id="photo" autocomplete="off" required>
                                                                <div><input type="submit" value="Cambiar foto de perfil" /></div>
                                                            </div>
                                                        </form>
                                                    </section>

                                                    <section id="password-user-container">
                                                        <form action="<?php echo constant('URL') . 'user/updatePassword' ?>" method="POST">
                                                            <div class="section">
                                                                <label for="current_password">Password actual</label>
                                                                <input type="password" name="current_password" id="current_password" autocomplete="off" required>

                                                                <label for="new_password">Nuevo password</label>
                                                                <input type="password" name="new_password" id="new_password" autocomplete="off" required>
                                                                <div><input type="submit" value="Cambiar password" /></div>
                                                            </div>
                                                        </form>
                                                    </section>

                                                    <section id="budget-user-container">
                                                        <form action="user/updateBudget" method="POST">
                                                            <div class="section">
                                                                <label for="budget">Definir presupuesto</label>
                                                                <div><input type="number" name="budget" id="budget" autocomplete="off" required value="<?php echo $user->getBudget() ?>"></div>
                                                                <div><input type="submit" value="Actualizar presupuesto" /></div>
                                                            </div>
                                                        </form>
                                                    </section>

                                                </div><!-- user section container -->
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
        
    </div>