<?php

require_once('DBconnection.php');
require_once('../model/User.php');

/**
 * Class UserQuery
 * Realiza las consultas del usuario en base de datos
 */
class UserQuery
{

    /**
     * La conexion a la base de datos
     * @acess private
     * @var DBconnection
     */
    private $db;

    function __construct()
    {
        $this->db = new DBconnection();
    }


    /**
     * Comprueba si el email del usuario existe en la base de datos y si existe devuelve un usuario
     * @param {string} $email el email del usuario que queremos comprobar 
     * Return {$user} - Null - no existe ningún usuario con ese e-mail 
     */
    public function findUser($email)
    {
        $sql = "SELECT * FROM user WHERE email='" . $email . "';";
        $result = $this->db->query($sql);

        if ($result->num_rows == 0) {
            return null;
        }

        $row = $result->fetch_assoc();

        //Instancia en un objeto user la clase User
        $user = new User($row["name"], $row["lastname"], $row["email"], $row["password"], $row["role"]);
        $user->set_id($row["id"]);
        return $user;
    }

    public function findEmployees()
    {
        $sql = "SELECT * FROM user WHERE user.role='Employee';";
        $result = $this->db->query($sql);

        $employees = [];
        if ($result->num_rows > 0) {
            //Guarda en un Array todos los empleados. 
            //Si no encuentra empleados devuelve el Array vacío. 

            while ($row = $result->fetch_assoc()) {
                $user = new User($row["name"], $row["lastname"], $row["email"], null, $row["role"]);
                $user->set_id($row['id']);

                array_push($employees, $user);
            }
        }
        return $employees;
    }

    public function findEmployeesWithoutTasks(){
        $sql= "SELECT id FROM user WHERE role='Employee' AND id NOT IN (SELECT DISTINCT id_employee FROM task WHERE status='En curso' OR status='Por hacer' AND id_employee is not null);";
        $result = $this->db->query($sql);

        $employees = [];
        if ($result->num_rows > 0) {
            //Guarda en un Array todos los empleados sin tareas asignadas. 
            //Si no encuentra empleados devuelve el Array vacío. 

            while ($row = $result->fetch_assoc()) {
                $user = new User(null, null, null, null, null);
                $user->set_id($row['id']);

                array_push($employees, $user);
            }
        }
        return $employees;

    }
}


    

