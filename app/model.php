<?php 
include_once 'app/imodel.php';
class Model{
    function __construct()
    {
        $this->db = new DataBases();
    }
    function query($query)
    {
        return $this->db->Conexion()->query($query);
    }
    function prepare($query)
    {
        return $this->db->Conexion()->prepare($query);
    }




}


?>