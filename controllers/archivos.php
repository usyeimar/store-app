<?php
class Archivos extends SessionController{
    private $user;
    function __construct()
    {
        parent::__construct();
        $this->user = $this->getUserSessionData();
        
    }
    function render()
    {
        $this->view->render('archivos/index',['user' => $this->user]);
       
    }

    
    

}
?>