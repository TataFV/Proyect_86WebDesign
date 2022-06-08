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
     * Busca el Id de las tareas que no tienen asignado ningun empleado y están por hacer en orden descendiente 
     * Return {$tasks} - Todas las tareas encontradas
     */
    public function findTaskWithoutEmployee(){

        $sql = "SELECT id FROM task WHERE id_employee IS NULL AND status='Por hacer' ORDER BY priority desc;"; 
        $result = $this->db->query($sql);

        $tasks = [];
        if ($result->num_rows > 0) {
            //Guarda en un Array el id de las tareas que no estan asignadas a ningun empleado y cuyo estatus es por hacer.
            //Si no encuentra tareas devuelve el Array vacío

            while ($row = $result->fetch_assoc()) {
                $aux_task = new Task(null, null, null, null, null);
                $aux_task->set_id($row["id"]);
                array_push($tasks, $aux_task);
            }
        }
        return $tasks;
    }

    /**
     * Actualiza la base de datos con las tareas asignadas a trabajadores
     * Return {$tasks} - Todas las tareas encontradas
     */
    public function assignTaskToEmployee($id_task, $id_employee){

        $sql = "UPDATE task SET id_employee= " . $id_employee . " WHERE id= " . $id_task . ";"; 
        $result = $this->db->query($sql);
        return $result;
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

    /**
     * Introduce en la base de datos la tarea creada a través del formulario
     * @param {string} $name - Nombre de la tarea
     * @param {string} $description - Descripcion de la tarea
     * @param {string} $type - Tipo de la tarea
     * @param {integer} $priority - Prioridad de la tarea 
     * Return {bolean} $aux_task - True La tarea fué borrada correctamente
     */

    public function taskCreate($name, $description, $type, $priority){
        
        $sql = "INSERT INTO task (name, description, priority, type, status) VALUES ('$name', '$description', $priority, '$type', 'Por hacer');";
        $result = $this->db->query($sql);
        return $result;
    }


    /**
     * Borra de la base de datos la tarea que se recibe por parametros 
     * @param {string} $id_task - Id de las tarea a eliminar
     * Return {bolean} $result - True La tarea fué borrada correctamente
     */

    public function taskDelete($id_task){

        $sql = "DELETE FROM task where id= " . $id_task . ";";
        $result = $this->db->query($sql);
        return $result;
    }
}