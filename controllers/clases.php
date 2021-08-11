<?php
class Clases extends Controller{
    function __construct()
    {
        parent::__construct();
        
    }
    function render()
    {
        $this->view->render('clases/index');
    }

    
    

}
?>