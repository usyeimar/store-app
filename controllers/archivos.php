<?php
class Archivos extends Controller{
    function __construct()
    {
        parent::__construct();
        
    }
    function render()
    {
        $this->view->render('archivos/index');
    }

    
    

}
?>