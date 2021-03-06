<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <div class="container">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <form class="form-inline position-relative d-inline-block my-2">
                <input class="form-control" type="search" placeholder="Buscar" aria-label="Buscar">
                <button class="btn position-absolute btn-search" type="submit"><i class="icon ion-md-search"></i></button>

            </form>
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item dropdown">

                    <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?php echo constant('URL') ?>/public/img/photos/<?php echo $user->getPhoto() ?>" class="avatar" alt="user-img" width="50" />
                        <?php echo strtoupper( ($user->getName() != '') ? $user->getName() : $user->getUsername());  ?>
                        
                    
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="user"><i class="fas fa-user-cog"></i> Mi perfil</a>
                        <a class="dropdown-item" href="#">Suscripciones</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo constant('URL'); ?>/logout"><i style="color: red" class="fas fa-power-off"></i> Salir</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Fin Navbar -->