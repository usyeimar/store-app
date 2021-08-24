<?php
class View{

    function  __construct(){

    }
    
    function render($name, $data = []){
        $this->d = $data;
        $this->handleMessages();
        require 'views/' . $name . '.php';
    }

    private function handleMessages(){
        if(isset($_GET['success']) && isset($_GET['error'])){
            // no se muestra nada porque no puede haber un error y success al mismo tiempo
        }else if(isset($_GET['success'])){
            
            $this->handleSuccess();
        }else if(isset($_GET['error'])){
            $this->handleError();
        }
    }

    private function handleError(){
        if(isset($_GET['error'])){
            $hash = $_GET['error'];
            $errors = new ErrorMessages();

            if($errors->existsKey($hash)){
                error_log('View::handleError() existsKey =>' . $errors->get($hash));
                $this->d['error'] = $errors->get($hash);
            }else{
                $this->d['error'] = NULL;
            }
        }
    }


    private function handleSuccess(){
        if(isset($_GET['success'])){
            $hash = $_GET['success'];
            $success = new SuccessMessages();

            if($success->existsKey($hash)){
                error_log('View::handleError() existsKey =>' . $success->existsKey($hash));
                $this->d['success'] = $success->get($hash);
            }else{
                $this->d['success'] = NULL;
            }
        }
    }

    public function showMessages(){
        $this->showErrors();
        $this->showSuccess();
    }

    public function showErrors(){
        if(array_key_exists('error', $this->d)){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" align="center">'.$this->d['error'].' <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>';
        }
        
    }

    public function showSuccess(){
        if(array_key_exists('success', $this->d)){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert" align="center">'.$this->d['success'].' <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>';
        }
    }
    
}


?>