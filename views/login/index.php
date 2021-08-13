<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login
       
    </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href=" <?php echo constant('URL') ?>/public/login_libs/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href=" <?php echo constant('URL') ?>/public/login_libs/login.css" rel="stylesheet">

</head>

<body>
<?php 
$this->showMessages();
?>
    <div class="wrapper">
        <div id="formContent">
             <!-- Icon -->
             <div>
                <img src="<?php echo constant('URL') ?>/public/login_libs/icon.svg" id="icon" alt="User Icon" />
            </div>

            <!-- Tabs Titles -->

            <div>
                <h4>
                    <b>Login</b>
                </h4>
            </div>

           
            <!-- Login Form -->
            <form method="POST" action="login/auth">
                <input type="text" id="txtUsuario" name="txtUsuario" placeholder="Usuario">
                <input type="password" id="txtContrasena" name="txtContrasena" placeholder="Contraseña">
                
                <div class="loginButton">
                    <input type="submit" value="Iniciar Sesión">
                </div>
                
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="login/register">No tienes cuenta, registrate.</a>
                <br>
                <a class="underlineHover" href="login/recover">¿Olvidaste la contraseña?</a>
            </div>

        </div>
    </div>

   

</body>

</html>