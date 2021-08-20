<?php
class Chat extends SessionController
{
    private $user;
    function __construct()
    {
        parent::__construct();
        $this->user = $this->getUserSessionData();
    }

    function render()
    {
        $this->view->render('chat/index', ['user' => $this->user]);
    }

    function Search()
    {
        if (!$this->existPost('searchTerm')) {
            $this->redirect('chat', []); //TODO:
            return;
        }
        
        $searchTerm = $this->getPost('searchTerm');
        $searchTerm = $this->model->searhUser($searchTerm);
    }
    
}
