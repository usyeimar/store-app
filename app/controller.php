<?php
class Controller{
    function  __construct(){
        $this->view = new View();
    }


    function LoadModel($model){
        $url = 'models/' . $model. 'model.php';
        if (file_exists($url)) {
            require_once $url;
            $modelName = $model. 'Model';
            $this->model = new $modelName();
        }
    }

    function existPOST($params){
        foreach ($params as $param) {
            if(!isset($_POST[$param])){
                error_log("ExistPOST: No existe el parametro $param" );
                return false;
            }
        }
        error_log( "ExistPOST: Existen parámetros" );
        return true;
    }


    function existGET($params){
        foreach ($params as $param){
            if (!isset($_GET[$param])) {
                error_log('CONTROLLER::existGet => No existe el parametro' . $param);
                return false;
            }   
        }
        return true;
    }

    function getGet($name){
        return $_GET[$name];      
    }
    function getPost($name){
        return $_POST[$name];
    }
    function redirect($route,$mensajes){
        $data =  [];
        $params = '';

        foreach($mensajes as $key => $mensaje ){
            array_push($data, $key .'=' . $mensaje);
        }

        $params = join('&', $data);
        if($params != ''){
            $params = '?' . $params;
        }
        header('location: ' . constant('URL') .'/'. $route . $params);
    }
    }
?>