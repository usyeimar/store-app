<?php
class User extends SessionController
{
    private $user;

    function __construct()
    {
        parent::__construct();
        $this->user = $this->getUserSessionData();
    }

    function render()
    {
        $this->view->render('user/index', ['user' => $this->user]);
    }

    function updateBudget()
    {
        if (!$this->existPost('budget')) {
            $this->redirect('user', []); //TODO:
            return;
        }
        $budget = $this->getPost('budget');
        if (empty($budget) || $budget == 0 || $budget < 0) {
            $this->redirect('user', []);
            return;
        }
        $this->user->setBudget($budget);
        if ($this->user->update()) {
            $this->redirect('user', []);
            return;
        }
    }
    function updateName()
    {
        if (!$this->existPost('name')) {
            $this->redirect('user', []); //TODO:
            return;
        }
        $name = $this->getPost('name');
        if (empty($name) || $name == NULL) {
            $this->redirect('user', []);
            return;
        }
        $this->user->setName($name);
        if ($this->user->update()) {
            $this->redirect('user', []);
            return;
        }
    }
    function updatePassword()
    {
        if (!$this->existPOST(['current_password', 'new_password'])) {
            $this->redirect('user', []);
            return;
        }
        $current = $this->getPost('current_password');
        $new = $this->getPost('new_password');

        if (empty($current) || empty($new)) {
            $this->redirect('user', []);
            return;
        }

        if ($current === $new) {
            $this->redirect('user', []);
            return;
        }
        $newHash = $this->model->comparePasswords($current, $this->user->getId());

        if ($newHash) {
            $this->user->setPassword($new);

            if ($this->user->update()) {
                $this->redirect('user', []);
                return;
            } else {
                $this->redirect('user', []);
                return;
            }
        }else{
            $this->redirect('user',[]);
            return;
        }
    }
    function updatePhoto()
    {
        if (!isset($_FILES['photo'])) {
            $this->redirect('user',[]);
            return;
        }
        $photo = $_FILES['photo'];
        $targetDir = 'public/img/photos';
        $extension = explode('.', $photo['name']);
        $filename = $extension[sizeof($extension) -2];
        $ext = $extension[sizeof($extension) -1];
        $hash = md5_file(Date('Ymdgi') . $filename) . '.' . $ext;
        $targetFile = $targetDir . $hash;
        $uploadOK = false;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $check = getimagesize($photo['tmp_name']);
        if($check !== false){
            $uploadOk = true;
        }else{
            $uploadOK = false;
        }

        if(!$uploadOK){
            $this->redirect('user',[]);
            return;
        }else{
            if(move_uploaded_file($photo['tmp_name'],$targetFile)){
                $this->model->updatePhoto($hash,$this->user->getId());
                $this->redirect('user',[]);
                return;
            }else{
                $this->redirect('user',[]);
                return;
            }

        }

    }
}