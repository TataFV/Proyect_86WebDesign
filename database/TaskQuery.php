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

    /**
     * Busca todas las tareas 
     * Return {$tasks} - Todas las tareas encontradas
     */

    public function findAllTasks()
    {
        $sql = "SELECT * FROM task;";
        $result = $this->db->query($sql);

        $tasks = [];
        if ($result->num_rows > 0) {
            //Guarda en un Array todas las tareas
            //Si no encuentra tareas devuelve el Array vacío

            while ($row = $result->fetch_assoc()) {
                $aux_task = $this->createTask($row);
                array_push($tasks, $aux_task);
            }
        }
        return $tasks;
    }

    /**
     * Guarda las tareas encontradas en cada fila en una variable 
     * @param {string} $row 
     * Return {string} $aux_task - Tareas encontradas
     */

    private function createTask($row)
    {
        $aux_task = new Task($row["name"], $row["description"], $row["id_ceo"], $row["status"], $row["startDate"]);
        $aux_task->set_id_employee($row["id_employee"]);
        $aux_task->set_priority($row["priority"]);
        $aux_task->set_finishDate($row["finishDate"]);
        $aux_task->set_type($row["type"]);
        $aux_task->set_id($row["id"]);
        $aux_task->set_id_employee($row['id_employee']);

        return $aux_task;
    }
}

