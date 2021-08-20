<?php
class Notas extends SessionController{
    private $user;
    function __construct()
    {
        parent::__construct();
        $this->user = $this->getUserSessionData();
        
    }
    function render()
    {
        $this->view->render('notas/index', ['user' => $this->user]);
    }

    
    

}
?>