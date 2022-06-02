<?php

require_once '../model/Task.php';
require_once '../database/TaskQuery.php';
require_once '../model/User.php';
require_once '../database/UserQuery.php';

//Recibe los datos del view y se comunica con la base de datos.


/**
 * Nueva consulta en bases de datos del usuario
 * @acess private
 * @var TaskQuery
 */
$taskDb = new TaskQuery();

$employeeDb = new UserQuery();


/**
 * Tareas que se encuentran finalizadas 
 * @acess private
 * @var array
 */
$tasks = $taskDb->findFinishedTasks();

/**
 * Empleados 
 * @acess private
 * @var array
 */
$employees = $employeeDb->findEmployees();

echo json_encode(['tasks' => $tasks, 'employees' => $employees]);
