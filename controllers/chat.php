<?php
class Chat extends Controller{
    function __construct()
    {
        parent::__construct();
        
    }
    function render()
    {
        $this->view->render('chat/index');
    }

    
    

}
?>