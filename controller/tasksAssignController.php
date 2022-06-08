<?php

require_once '../model/Task.php';
require_once '../database/TaskQuery.php';
require_once '../model/User.php';
require_once '../database/UserQuery.php';

/**
 * Nueva consulta en bases de datos del usuario
 * @acess private
 * @var TaskQuery
 */
$taskDb = new TaskQuery();

//Instancia la clase UserQuery
$employeeDb = new UserQuery();


/**
 * Se asigna a la variable el resultado del método que consulta las tareas sin asignar
 * @acess private
 * @var array
 */
$tasks = $taskDb->findTaskWithoutEmployee();

/**
 * Empleados sin tareas 
 * @acess private
 * @var array
 */

//Se asigna a la variable el resultado del método que consulta los empleados sin tareas asignadas
$employees = $employeeDb->findEmployeesWithoutTasks();


//Comprobación, si no hay tareas que asignar o no hay empleados desocupados no hace nada  
if (empty($tasks) || empty($employees)) {
    die();
}

//Comprobación, asignar según el menor número de tareas o empleados que haya, para evitar tareas sin empleados y empleados sin tareas

$loops = count($employees);
if (count($tasks) < $loops) {
    $loops = count($tasks);
}
// Bucle para asignar tareas a trabajadores
for ($i = 0; $i < $loops; $i++){
    $id_employee = $employees[$i]->get_id();
    $id_task = $tasks[$i]->get_id();
    $task = $taskDb->assignTaskToEmployee($id_task, $id_employee);
}
