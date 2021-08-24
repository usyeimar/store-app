<?php 

class RecoverModel extends Model{
    function __construct()
    {
        parent::__construct();
    }

   
    
    // public function updatePasswordWithCode()
    // {
    //     if (isset($_POST['btnGuardar'])) {
    //         $idUsuario = $_POST['txtIdUsuario'];
    //         $contrasena = $_POST['txtContrasena'];
    //         $repetirContrasena = $_POST['txtRepetirContrasena'];

    //         if ($contrasena != $repetirContrasena) {

    //             $user = new stdClass();
    //             $user->idUsuario = $idUsuario;

    //             $mensaje = 'Las contraseñas no coinciden. Por favor, verifique la información.';
    //             $this->render('login/newPassword', 'Registrar Usuario', array('user' => $user, 'mensaje' => $mensaje), false);
    //             return;

    //         } else {
    //             $userModel = new User();

    //             $contrasena = password_hash($_POST['txtContrasena'], PASSWORD_BCRYPT);

    //             $resultado = $userModel->updatePasswordFromRecover($idUsuario, $contrasena);
    //             if ($resultado != false) {
                    
    //                 $mensaje = 'Su contraseña ha sido cambiada con éxito.';
    //                 $this->render('login/index', 'Iniciar Sesion', array('mensaje' => $mensaje), false);
    //                 return;

    //             } else {
    //                 $user = new stdClass();
    //                 $user->idUsuario = $idUsuario;
    //                 $mensaje = 'Ocurrio un error al intentar cambiar la contraseña. Por favor, verifique la información.';
    //                 $this->render('login/newPassword', 'Registrar Usuario', array('user' => $user, 'mensaje' => $mensaje), false);
    //                 return;
    //             }
    //         }
    //     }else{
    //         header('location:'.URL);
    //     }
        
    // }


    



}

?>