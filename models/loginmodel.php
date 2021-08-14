<?php
require_once'models/usermodel.php'; 
class LoginModel extends Model {
    function __construct()
    {
        parent::__construct();
    }
    function login($username,$password){
        try {
            $query = $this->prepare('SELECT * FROM tbusers WHERE username = :username');
            $query->execute(['username' => $username]);

            if ($query->rowCount() == 1) {
                $item = $query->fetch(PDO::FETCH_ASSOC);
                $user = new UserModel();
                $user->from($item);
                error_log('loginModel: user id '.$user->getId()); 
                if(password_verify($password,$user->getPassword())){
                    error_log('LoginModel::login->success');
                    return $user;
                }else{
                    error_log('LoginModel::login->PASSWORD NO ES IGUAL');
                    return NULL;
                }

               
            }
        } catch (PDOException $e) {
            error_log('LoginModel::login->exception' .$e);
        }
    }
}


?>