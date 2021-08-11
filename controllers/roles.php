<?php
class Roles extends Controller{
    function __construct()
    {
        parent::__construct();
        
    }
    function render()
    {
        $this->view->render('roles/index');
       
    }

    
    

}
?>