<?php

class DBconnection{

    /**
     * Conexion a la base de datos 
     * @var mysqli
     */
    private $connection;

    function __construct(){

        $name_server = "localhost";
        $user = "empresa86";
        $password = "#7gD72Ya22d&SCK";
        $db = "empresa_86WebDesign";
        $this->connection = new mysqli($name_server, $user, $password, $db);

        //Si hay error de conexion

        if ($this->connection->connect_error) {
            die("Connection failed:" . $this->connection->connect_error);
        }
    }

    /**
     * Funcion que realiza las consultas a la base de datos
     * return mysqli_result
     */
    function query($sql){
        return $this->connection->query($sql);
    }
}
