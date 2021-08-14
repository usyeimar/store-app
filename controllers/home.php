<?php
class Home extends SessionController{
    function __construct()
    {
        parent::__construct();
        error_log('Home::construct -> Inicio de Home');
        
    }
    function render()
    {
        error_log('Home::render -> Carga el Home');
        $this->view->render('home/index');
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