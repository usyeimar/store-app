<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>registro
        
    </title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href=" <?php echo constant('URL') ?>/public/login_libs/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href=" <?php echo constant('URL') ?>/public/login_libs/login.css" rel="stylesheet">
</head>

<body>
    <?php $this->showMessages(); ?>
    <div class="wrapper">
        <div id="formContent">
            <!-- Tabs Titles -->

            <div>
                <h4>
                    <b>Registro</b>
                </h4>
            </div>

            <!-- Login Form -->
            <form method="POST" action="<?php echo constant('URL') ?>/signup/newUser">
                <input type="text" id="txtUsuario" name="username" placeholder="Usuario">
                <input type="password" id="txtContrasena" name="password" placeholder="Contraseña">
               
                <div class="loginButton">
                    <input id="btnGuardar" name="btnGuardar" type="submit" value="Guardar Usuario">
                </div>
                
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="<?php echo URL; ?>login">Ir a iniciar sesión</a>
            </div>

        </div>
    </div>

    <script>
        var url = "<?php echo URL; ?>";
    </script>

    <script src="<?php echo constant('URL'); ?>/public/login_libs/jquery.min.js"></script>
    <script src="<?php echo constant('URL'); ?>/public/login_libs/bootstrap.min.js"></script>

    <?php if(isset($mensaje)){ ?>

        <script>
            
            window.onload = function(){
                alert('<?php echo $mensaje; ?>');
            }

        </script>

    <?php } ?>

</body>
</html>