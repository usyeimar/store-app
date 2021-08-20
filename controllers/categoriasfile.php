<?php
class CategoriasFile extends SessionController{
    private $user;
    function __construct()
    {
        parent::__construct();
        $this->user = $this->getUserSessionData();
        
       
    }
    function render()
    {
        $this->view->render('categoriasfile/index', ['user' => $this->user]);
    }

    
    

}
?>