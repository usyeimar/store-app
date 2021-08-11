<?php
include_once 'Models/usuario.php';
class ConsultaModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function get()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT * FROM tbusuarios");
            while($row = $query->fetch()){

                $item = new UserParam();
                $item->idUsuario        = $row['idUsuario'];
                $item->NomUsuario       = $row['NomUsuario'];
                $item->ApellidoUsuario  = $row['ApellidoUsuario'];
                $item->EmailUsuario     = $row['EmailUsuario'];
                $item->PassUsuario      = $row['PassUsuario'];
                $item->CiudadUsuario    = $row['CiudadUsuario'];
                $item->DireccionUsuario = $row['DireccionUsuario'];
                $item->TelefonoUsuario  = $row['TelefonoUsuario'];
                $item->FechaNacimiento  = $row['FechaNacimiento'];
                array_push($items,$item);

            }
            return $items;

        } catch (PDOException $e) {
            return [];
        }

    }

}
