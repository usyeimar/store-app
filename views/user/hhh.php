<?php 
$user =  $this->d['user'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Prueba</h1>
    <?php if ($user->getPhoto() != '') { ?>
        <img src="<?php echo constant('URL') ?>/public/img/photos/<?php echo $user->getPhoto(); ?>" width="200" />
    <?php
    }
    ?>

    <h2><?php echo ($user->getName() != '') ? $user->getName() : $user->getUsername(); ?> </h2>
    <form action="<?php echo constant('URL') . '/user/updateName' ?>" method="post">
        <div class="section">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" autocomplete="off" required value="<?php echo $user->getUsername() ?>">
            <div><input type="submit" value="Cambiar Nombre"></div>

        </div>

    </form>
    <form action="<?php echo constant('URL') . '/user/updatePhoto' ?>" method="POST" enctype="multipart/form-data">
        <div class="section">
            <label for="name">Foto de perfil</label>
           
            <input type="file" name="photo" id="name" autocomplete="off" required value="<?php echo $user->getName() ?>">
            <div><input type="submit" value="Cambiar Foto de Perfil"></div>

        </div>

    </form>

    <form action="<?php echo constant('URL') . '/user/updatePassword' ?>" method="POST">
        <div class="section">
            <label for="current_password">Password Actual</label>
            <input type="password" name="current_password" id="new_password" autocomplete="off" required>


            <label for="new_password">Nuevo Password</label>
            <input type="password" name="new_password" id="new_password" autocomplete="off" required>
            <div><input type="submit" value="Cambiar Password"></div>
            

        </div>

    </form>
    <form action="<?php echo constant('URL') . '/user/updateBudget' ?>" method="POST">
        <div class="section">
            <label for="budget">Definir Presupuesto</label>
            <input type="number" name="budget" id="budget" autocomplete="off" required>
            <div><input type="submit" value="Actualizar Presupuesto"></div>
           
            

        </div>

    </form>

</body>

</html>