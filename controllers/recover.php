<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/PHPMailer/src/Exception.php';
require 'phpmailer/PHPMailer/src/PHPMailer.php';
require 'phpmailer/PHPMailer/src/SMTP.php';
require_once 'class/helper.php';
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
        error_log('Signup::Carga el reocover de Usuarios');
    }

    function sendRecoveryCode()
    {
        if ($this->existPOST(['email'])) {
            $email = $this->getPost('email');
            $codigo = $this->generateRandomCode();
            $recoverydate = date("Y-m-d H:i:s", strtotime('+24 hours'));
            $userModel = new UserModel();
            $user = $userModel->getUserWithEmail($email);
            

            if ($user === false) {
                $this->redirect('recover', ['error' => ErrorMessages::ERROR_RECOVER_EMAIL_NOTEXIST]);
                error_log('RECOVER::El usuario no existe');
            } else {
                $respuesta = $userModel->recoverPassword($email, $codigo, $recoverydate);
                if ($respuesta) {
                    $this->sendMail($email, $userModel->getName(), $codigo);
                    $this->redirect('recover', ['success' => SuccessMessages::SUCCESS_USER_VERIFY_EMAIL]);
                } else {

                    $this->redirect('recover', ['error' => ErrorMessages::ERROR_RECOVER_IWILLNOT_RECOVER_THE_ACCOUNT]);
                }
            }
        }
    }


    function generateRandomCode()
    {
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz0123456789";
        srand((float)microtime() * 1000000);
        $i = 0;
        $pass = '';

        while ($i <= 7) {
            $num = rand() % 33;
            $tmp = substr($chars, $num, 1);
            $pass = $pass . $tmp;
            $i++;
        }

        return time() . $pass;
    }

    function sendMail($email, $name, $codigo)
    {
        $template = file_get_contents('views/login/template.php');
        $template = str_replace("{{name}}", $name, $template);
        $template = str_replace("{{action_url_2}}", '<b>http:' . URL . '/recover/newPassword/' . $codigo . '</b>', $template);
        $template = str_replace("{{action_url_1}}", 'http:' . URL . '/recover/newPassword/' . $codigo, $template);
        $template = str_replace("{{year}}", date('Y'), $template);
        $template = str_replace("{{operating_system}}", Helper::getOS(), $template);
        $template = str_replace("{{browser_name}}", Helper::getBrowser(), $template);

        $mail = new PHPMailer(true);
        $mail->CharSet = "UTF-8";

        try {
            //Enable verbose debug output
            $mail->isSMTP();
            $mail->Host = 'smtp.googlemail.com';  //gmail SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'mastertutorialesfaciles@gmail.com';   //username
            $mail->Password = 'Faciles-1234';   //password
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;                    //smtp port

            $mail->setFrom('mastertutorialesfaciles@gmail.com', 'Cariniana');
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

    function newPassword($code = null)
    {
        if (isset($code)) {
            $userModel = new UserModel();
        
            $user = $userModel->getUserWithCode($code);

            if ($user === false) {
                $this->redirect('recover',['error' => ErrorMessages::ERROR_RECOVER_CODE_ISNOTVALID]);
                error_log('Login::NewPassword->el Codigo no es valido');
            } else {
                $current = date("Y-m-d H:i:s");

                if (strtotime($current) > strtotime($userModel->recoverydate)) {
                    $this->redirect('recover',['error' => ErrorMessages::ERROR_RECOVER_CODE_EXPIRED]);
                    error_log('Login::NewPassword->el Codigo ha expirado');
                } else {
                    $this->redirect('newPassword',['user' => $this->user]);
                }
            }
        } else {
            header('location: ' . URL);
        }
    }
}
