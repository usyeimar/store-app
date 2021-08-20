<?php
class Home extends SessionController{
    private $user;
    function __construct()
    {
        parent::__construct();
        $this->user = $this->getUserSessionData();
        error_log('Home::construct -> Inicio de Home');
        
    }
    function render()
    {
        error_log('Home::render -> Carga el Home');
        $this->view->render('home/index',['user' => $this->user]);
    }

    public function getExpenses()
    {
        
    }
    public function getCategories()
    {
        # code...
    }

    
    

}
?>