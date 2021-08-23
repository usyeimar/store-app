<?php
require_once 'models/usermodel.php';
class Recover extends SessionController
{
    function __construct()
    {
        parent::__construct();
        error_log('Construct::Inicio de Password recover');
    }
    function render()
    {
        $this->view->render('login/recover', []);
        error_log('Signup::Carga el signup de Usuarios');
    }

    public function sendRecoveryCode()
    {
        if ($this->existPOST(['email'])) {
            $email = $this->getPost('email');
            $codigo = $this->model->generateRamdonCode();
            $recoverydate = date("Y-m-d H:i:s", strtotime('+24 hours'));
            $user = new UserModel();
            $user = $user->getUserWithEmail($email);

        }if ($user === false) {
            
            $this->render('login/recover',[]);
        } else {
            $respuesta = $user->recoverPassword($email, $codigo, $rec);
            if ($respuesta) {
                $this->model->sendMail($email,$user->getName(), $codigo);
                
                $mensaje = 'Se ha enviado un correo electrónico con las instrucciones para el cambio de tu contraseña. Por favor verifica la información enviada.';
                $this->render('login/recover', 'Recuperar Contraseña', array('mensaje' => $mensaje), false);
            } else {
                $mensaje = 'No se recuperar la cuenta. Si los errores persisten comuniquese con el administrador del sitio.';
                $this->render('login/recover', 'Recuperar Contraseña', array('mensaje' => $mensaje), false);
            }
        }
    }


    
    
}
