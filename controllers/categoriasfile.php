<?php
class CategoriasFile extends Controller{
    function __construct()
    {
        parent::__construct();
       
    }
    function render()
    {
        $this->view->render('categoriasfile/index');
    }

    
    

}
?>