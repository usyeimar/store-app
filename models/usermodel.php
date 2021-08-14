<?php
class UserModel extends Model implements IModel{
    private $id;
    private $username;
    private $password;
    private $role;
    private $budget;
    private $photo;
    private $name;
    private $email;
    private $ciudad;
    private $direccion;
    private $telefono;
    private $fechanacimiento;


    function __construct(){
        parent::__construct();
        $this->username = '';
        $this->password = '';
        $this->role = '';
        $this->budget = 0.0;
        $this->photo = '';
        $this->name = '';
        $this->email = '';
        $this->ciudad = '';
        $this->direccion = '';
        $this->telefono = '';
        $this->fechanacimiento = '';
    }

    public function save(){
        try {
            $query = $this->prepare('INSERT INTO tbusers(username,password,role,budget,photo,name,email,ciudad,direccion,telefono,fechanacimiento) VALUES(:username,:password,:role,:budget,:photo,:name,:email,:ciudad,:direccion,:telefono,:fechanacimiento)');
            $query->execute([
                'username' =>           $this->username,
                'password' =>           $this->password,
                'role' =>                $this->role,
                'budget' =>             $this->budget,
                'photo' =>               $this->photo,
                'name' =>                $this->name,
                'email' =>               $this->email,
                'ciudad' =>              $this->ciudad,
                'direccion' =>           $this->direccion,
                'telefono' =>            $this->telefono,
                'fechanacimiento' =>     $this->fechanacimiento,
            ]);
            return true;
        } catch (PDOException $e) {
            error_log('USERMODEL::save->PDOException' . $e);
            return false;
        }
    }



    public function getAll(){
        $items = [];
        try {
            $query = $this->query('SELECT * FROM tbusers');
            while ($p = $query->fetch(PDO::FETCH_ASSOC)) {
                $item = new UserModel();
                $item->setId($p['id']);

                $item->setUsername($p['username']);
                $item->setPassword($p['password']);
                $item->setRole($p['role']);
                $item->setBudget($p['Budget']);
                $item->setPhoto($p['photo']);
                $item->setName($p['name']);
                $item->setEmail($p['email']);
                $item->setCiudad($p['ciudad']);
                $item->setDireccion($p['direccion']);
                $item->setTelefono($p['telefono']);
                $item->setFechaNacimiento($p['fechanacimiento']);

                array_push($items,$item);
            }
            return $items;
        } catch (PDOException $e) {
            error_log('USERMODEL::getAll->PDOException' . $e);
        }
    }
    
    public function get($id){
        try {
            $query = $this->prepare('SELECT * FROM tbusers WHERE id = :id');
            $query->execute([
                'id' => $id
            ]);
                $user = $query->fetch(PDO::FETCH_ASSOC); 
                $this->setId($user['id']);
                $this->setUsername($user['username']);
                $this->setPassword($user['password']);
                $this->setRole($user['role']);
                $this->setBudget($user['budget']);
                $this->setPhoto($user['photo']);
                $this->setName($user['name']);
                $this->setEmail($user['email']);
                $this->setCiudad($user['ciudad']);
                $this->setDireccion($user['direccion']);
                $this->setTelefono($user['telefono']);
                $this->setFechaNacimiento($user['fechanacimiento']);
            
            return $this;
        } catch (PDOException $e) {
            error_log('USERMODEL::getId->PDOException' . $e);
        }
    }


    public function delete($id){
        try {
            $query = $this->prepare('DELETE FROM tbusers WHERE id = :id');
            $query->execute([
                'id' => $id
            ]);
           return true;
        } catch (PDOException $e) {
            error_log('USERMODEL::delete->PDOException' . $e);
            return false;
        }
    }


    public function update() {
        try {
            $query = $this->prepare('UPDATE tbusers SET username = :username, password = :password, budget = :budget, photo = :photo, name = :name, ciudad = :ciudad, direccion = :direccion, telefono = :telefono, fechanacimiento = :fechanacimiento  WHERE id = :id');
            $query->execute([
                'id' =>                 $this->id,
                'username' =>           $this->username,
                'password' =>           $this->password,
                'role' =>                $this->role,
                'budget' =>             $this->budget,
                'photo' =>               $this->photo,
                'name' =>                $this->name,
                'email' =>               $this->email,
                'ciudad' =>              $this->ciudad,
                'direccion' =>           $this->direccion,
                'telefono' =>            $this->telefono,
                'fechanacimiento' =>     $this->fechanacimiento,
            ]);
            return true;
        } catch (PDOException $e) {
            error_log('USERMODEL::Update[tbusers]->PDOException' . $e);
            return false;
        }
    }

    public function from($array){
        $this->id               = $array['id'];
        $this->username         = $array['username'];
        $this->password         = $array['password'];
        $this->role             = $array['role'];
        $this->budget           = $array['budget'];
        $this->photo            = $array['photo'];
        $this->name             = $array['name'];
        $this->email            = $array['email'];
        $this->ciudad           = $array['ciudad'];
        $this->direccion        = $array['direccion'];
        $this->telefono         = $array['telefono'];
        $this->fechanacimiento  = $array['fechanacimiento']; 
    }

    public function exists($username) {
        try {
            $query = $this->prepare('SELECT username FROM tbusers WHERE username ?= :username');
            $query->execute(['username' => $username]);
            if ($query->rowcount()>0) {
                return true;
            }else{
                return false;
            }
        } catch (PDOException $e) {
            error_log('USERMODEL::exists->PDOException' . $e);
            return false;
        }
    }
    function comparePasswords($password, $id){
        try{
           $user = $this->get($id);
            return password_verify($password,$user->getPassword());
        }catch(PDOException $e){
            error_log('');
            return false;
        }
    }


    private function getHashedPassword($password)
    {
       return password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]); 
    }

    public function setId($id){                                 $this->id = $id;}
    public function setRole($role){                             $this->role = $role;}
    public function setUsername($username){                     $this->username = $username;}
    public function setBudget($budget){                         $this->budget = $budget;}
    public function setPhoto($photo){                           $this->photo = $photo;}
    public function setName($name){                             $this->name = $name;}
    public function setEmail($email) {                          $this->email= $email;}
    public function setPassword($password)
    {
        $this->password = $this->getHashedPassword($password);
    }

    public function setCiudad($ciudad){                         $this->ciudad = $ciudad;}
    public function setDireccion($direccion){                   $this->direccion = $direccion;}
    public function setTelefono($telefono){                     $this->telefono = $telefono;}
    public function setFechaNacimiento($fechanacimiento){       $this->fechanacimiento = $fechanacimiento;}

    public function getId()                 {return $this->id;}
    public function getUsername()           {return $this->username;}
    public function getPassword()           {return $this->password; }
    public function getRole()               {return $this->role;}
    public function getBudget()             {return $this->budget;}
    public function getemail()              {return $this->email;}
    public function getPhoto()              {return $this->photo;}
    public function getName()               {return $this->name;}
    public function getCiudad()             {return $this->ciudad;}
    public function getDireccion()          {return $this->direccion;}
    public function getTelefono()           {return $this->telefono;}
    public function getFechaNacimiento()    {return $this->fechanacimiento;}
}
