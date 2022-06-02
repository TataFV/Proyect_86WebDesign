<?php

require_once('DBconnection.php');
require_once('../model/Task.php');

/**
 * Class TaskQuery
 * Realiza las consultas de las tareas en base de datos
 */
class TaskQuery{

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
     * Busca tareas cuyo "status" sea "Finalizada"
     * Return {$tasks} -
     */
    public function findFinishedTasks()
    {
        $sql = "SELECT * FROM task WHERE status='Finalizada';";
        $result = $this->db->query($sql);

        $tasks = [];
        if ($result->num_rows > 0) {
            //Guarda en un Array todas las tareas. 
            //Si no encuentra tareas finalizadas devuelve el Array vacío 

            while ($row = $result->fetch_assoc()) {
                $aux_task = $this->createTask($row);
                array_push($tasks, $aux_task);
            }
        }
        return $tasks;
    }

    

