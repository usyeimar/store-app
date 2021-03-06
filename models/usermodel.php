<?php
class UserModel extends Model implements IModel{
    private $id;
    private $secretid;
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
    private $status;


    function __construct(){
        parent::__construct();
        $this->secretid = rand(time(), 100000000);
        $this->username = '';
        $this->password = '';
        $this->role = '';
        $this->budget = 0.0;
        $this->photo = '7ff6d806e3014936d89059f2451992a6.png';
        $this->name = '';
        $this->email = '';
        $this->ciudad = '';
        $this->direccion = '';
        $this->telefono = '';
        $this->fechanacimiento = '';
        $this->status = '';
    }
    function updateBudget($budget, $iduser){
        try{
            $query = $this->db->Conexion()->prepare('UPDATE tbusers SET budget = :val WHERE id = :id');
            $query->execute(['val' => $budget, 'id' => $iduser]);

            if($query->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        
        }catch(PDOException $e){
            return NULL;
        }
    }

    function updateName($name, $iduser){
        try{
            $query = $this->db->Conexion()->prepare('UPDATE tbusers SET name = :val WHERE id = :id');
            $query->execute(['val' => $name, 'id' => $iduser]);

            if($query->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        
        }catch(PDOException $e){
            return NULL;
        }
    }

    function updatePhoto($name, $iduser){
        try{
            $query = $this->db->Conexion()->prepare('UPDATE tbusers SET photo = :val WHERE id = :id');
            $query->execute(['val' => $name, 'id' => $iduser]);

            if($query->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        
        }catch(PDOException $e){
            return NULL;
        }
    }

    function updatePassword($new, $iduser){
        try{
            $hash = password_hash($new, PASSWORD_DEFAULT, ['cost' => 10]);
            $query = $this->db->Conexion()->prepare('UPDATE users SET password = :val WHERE id = :id');
            $query->execute(['val' => $hash, 'id' => $iduser]);

            if($query->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        
        }catch(PDOException $e){
            return NULL;
        }
    }



    public function save(){
        try {
            $query = $this->prepare('INSERT INTO tbusers(secretid,username,password,role,budget,photo,name,email,ciudad,direccion,telefono,fechanacimiento,status) VALUES(:secretid,:username,:password,:role,:budget,:photo,:name,:email,:ciudad,:direccion,:telefono,:fechanacimiento,:status)');
            $query->execute([
                'secretid' =>           $this->secretid,
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
                'status' =>              $this->status,
            ]);
            return true;
        } catch (PDOException $e) {
            error_log('USERMODEL::save->' . $e);
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
                $item->setSecretId($p['secretid']);

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
                $item->setStatus($p['status']);
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
                $this->id               = $user['id'];
                $this->secretid         = $user['secretid'];
                $this->username         = $user['username'];
                $this->password         = $user['password'];
                $this->role             = $user['role'];
                $this->budget           = $user['budget'];
                $this->photo            = $user['photo'];
                $this->name             = $user['name'];
                $this->email            = $user['email'];
                $this->ciudad           = $user['ciudad'];
                $this->direccion        = $user['direccion'];
                $this->telefono         = $user['telefono'];
                $this->fechanacimiento  = $user['fechanacimiento'];
                $this->status           = $user['status'];
            
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
            $query = $this->prepare('UPDATE tbusers SET secretid = :secretid, username = :username, password = :password, budget = :budget, photo = :photo WHERE id = :id');
            $query->execute([
                'id' =>                  $this->id,
                'secretid' =>            $this->secretid,
                'username' =>            $this->username,
                'password' =>            $this->password, 
                'budget' =>              $this->budget,
                'photo' =>               $this->photo,
               
            ]);
            return true;
        } catch (PDOException $e) {
            error_log('USERMODEL::Update[tbusers]->' . $e);
            return false;
        }
    }

    public function from($array){
        $this->id               = $array['id'];
        $this->secretid        = $array['secretid'];
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
        $this->status           = $array['status']; 
    }

    public function exists($username) {
        try {
            $query = $this->prepare('SELECT username FROM tbusers WHERE username = :username');
            $query->execute(['username' => $username]);
            if ($query->rowcount()>0) {
                return true;
            }else{
                return false;
            }
        } catch (PDOException $e) {
            error_log('USERMODEL::exists->' . $e);
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

     /**
     * Obtener una persona con correo Electronico
     * @param string $p_correoElectronico
     */
    function getUserWithEmail($email)
    {
        try {
            $query = $this->prepare('SELECT * FROM tbusers WHERE email = :email LIMIT 1');
            $query->execute(['email' => $email]);
            if ($query->rowcount()>0) {
                return true;
            }else{
                return false;
            }

        } catch (PDOException $e){
            error_log('USERMODEL::getUserWithEmail->' . $e);
            return false;

        }   
    }
      /**
     * Obtener una persona por el c??digo generado para el cambio de contrase??a
     * @param string $p_codigo
     */
    function getUserWithCode($codigo)
    {
        try {

            $query = $this->prepare('SELECT * FROM tbusers WHERE codigo = :codigo LIMIT 1');
            $query->execute(['codigo' => $codigo]);

            if ($query->rowcount()>0) {
                return true;
            }else{
                return false;
            }
        } catch (PDOException $e) {

            error_log('USERMODEL::getUserWithCode->' . $e);
            return false;

        } 
    }

    function recoverPassword($email, $codigo, $recoverydate)
    {
        try {

            $query = $this->prepare('UPDATE tbusers SET codigo = :codigo,recoverydate = :recoverydate WHERE email = :email');
            $query->execute([
                'codigo' => $codigo,
                'recoverydate' => $recoverydate,
                'email' => $email
            ]);
            return true;
        } catch (PDOException $e) {
            error_log('USERMODEL::recoverPassword->' . $e);
            return false;
        }   
    }


    public function setId($id){                                 $this->id = $id;}
    public function setSecretId($secretid){                     $this->secretid = $secretid;}
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
    public function setStatus($status){                         $this->status = $status;}
    

    public function getId()                 {return $this->id;}
    public function getUsername()           {return $this->username;}
    public function getPassword()           {return $this->password; }
    public function getRole()               {return $this->role;}
    public function getBudget()             {return $this->budget;}
    public function getEmail()              {return $this->email;}
    public function getPhoto()              {return $this->photo;}
    public function getName()               {return $this->name;}
    public function getCiudad()             {return $this->ciudad;}
    public function getDireccion()          {return $this->direccion;}
    public function getTelefono()           {return $this->telefono;}
    public function getFechaNacimiento()    {return $this->fechanacimiento;}
    public function getStatus()             {return $this->status;}
    public function getSecretId()           {return $this->secretid;}
    
}
