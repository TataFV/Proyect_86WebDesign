<?php

require_once ('DBconnection.php');
require_once ('../model/User.php');

/**
* Class UserQuery
* Realiza las consultas del usuario
*/
Class UserQuery{

    /**
    * La conexion a la base de datos
    * @acess private
    * @var integer
    */
    private $db;

    function __construct() {
        $this->db=new DBconnection(); 
    }    

    /**
     * Comprueba si el email del usuario existe en la base de datos y si existe devuelve un usuario
     * @param {string} $email el email del usuario que queremos comprobar 
     * Return {$user} - Null - no existe ningún usuario con ese e-mail 
     */
    public function findUser($email){
        $sql = "SELECT * FROM user WHERE email='" . $email . "';";
        $result = $this->db->query($sql);

        if($result->num_rows == 0){
            return null;
        }
        
        $row = $result->fetch_assoc();
        $user = new User($row["name"], $row["lastname"], $row["email"], $row["password"], $row["role"]);
        return $user;
    }
}
    /*public function get_passwordlUser($password){
        $sql = "SELECT * FROM user WHERE password='" . $password . "';";
        $result = $this->db->query($sql);  
    */

