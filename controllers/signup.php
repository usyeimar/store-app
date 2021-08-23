<?php
require_once'models/usermodel.php';
class Signup extends SessionController
{
    function __construct()
    {
        parent::__construct();
        error_log('Construct::Inicio de Signup');
    }
    function render()
    {
        $this->view->render('login/signup', []);
        error_log('Signup::Carga el signup de Usuarios');
    }

    function newUser(){
        if($this->existPOST(['username', 'password','email','direccion','telefono','fechanacimiento'])){
            
            $username = $this->getPost('username');
            $password = $this->getPost('password');
            $email    = $this->getPost('email');
            $direccion = $this->getPost('direccion');
            $telefono = $this->getPost('telefono');
            $fechanacimiento = $this->getPost('fechanacimiento');
            
            //validate data
            if($username == '' || empty($username) || $password == '' || empty($password) || $email =='' || empty($email) || $direccion =='' || empty($direccion) || $telefono =='' || empty($telefono) || $fechanacimiento =='' || empty($fechanacimiento)){
                // error al validar datos
                //$this->errorAtSignup('Campos vacios');
                $this->redirect('signup', ['error' => ErrorMessages::ERROR_SIGNUP_NEWUSER_EMPTY]);
            }

            $user = new UserModel();
            $user->setUsername($username);
            $user->setPassword($password);
            $user->setRole("user");
            $user->setEmail($email);
            $user->setDireccion($direccion);
            $user->setTelefono($telefono);
            $user->setFechaNacimiento($fechanacimiento);
            $user->setStatus('Activo ahora');
            
            if($user->exists($username)){
                //$this->errorAtSignup('Error al registrar el usuario. Elige un nombre de usuario diferente');
                $this->redirect('signup', ['error' => ErrorMessages::ERROR_SIGNUP_NEWUSER_EXISTS]);
                //return;
            }else if($user->save()){
                //$this->view->render('login/index');
                $this->redirect('', ['success' => SuccessMessages::SUCCESS_SIGNUP_NEWUSER]);
            }else{
                /* $this->errorAtSignup('Error al registrar el usuario. Inténtalo más tarde');
                return; */
                $this->redirect('signup', ['error' => ErrorMessages::ERROR_SIGNUP_NEWUSER]);
            }
        }else{
            // error, cargar vista con errores
            //$this->errorAtSignup('Ingresa nombre de usuario y password');
            $this->redirect('signup', ['error' => ErrorMessages::ERROR_SIGNUP_NEWUSER]);
        }
    }



}

?>