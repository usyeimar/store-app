<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class RecoverModel extends Model{
    function __construct()
    {
        parent::__construct();
    }

    function generateRandomCode()
    {
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz0123456789";
        srand((double)microtime()*1000000);
        $i = 0;
        $pass = '' ;
    
        while ($i <= 7) {
            $num = rand() % 33;
            $tmp = substr($chars, $num, 1);
            $pass = $pass . $tmp;
            $i++;
        }
    
        return time().$pass;
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


    public function sendMail($email, $name, $codigo)
    {
        $template = file_get_contents(URL.'view/login/template.php');
        $template = str_replace("{{name}}", $name, $template);
        $template = str_replace("{{action_url_2}}", '<b>http:'.URL.'/login/newPassword/'.$codigo.'</b>', $template);
        $template = str_replace("{{action_url_1}}", 'http:'.URL.'/login/newPassword/'.$codigo, $template);
        $template = str_replace("{{year}}", date('Y'), $template);
        $template = str_replace("{{operating_system}}", Helper::getOS(), $template);
        $template = str_replace("{{browser_name}}", Helper::getBrowser(), $template);

        $mail = new PHPMailer(true);
        $mail->CharSet = "UTF-8";

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.googlemail.com';  //gmail SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'phpminitest@gmail.com';   //username
            $mail->Password = 'sena2018.';   //password
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;                    //smtp port

            $mail->setFrom('phpminitest@gmail.com', 'Cariniana');
            $mail->addAddress($email, $name);

            $mail->isHTML(true);

            $mail->Subject = 'Recuperación de contraseña - Cariniana';
            $mail->Body    = $template;

            if (!$mail->send()) {
                return false;
            } else {
                return true;
            }
        } catch (Exception $e) {
            return false;
            // echo 'Message could not be sent.';
            // echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }



}

?>