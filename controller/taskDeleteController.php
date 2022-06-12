<?php

require_once '../model/Task.php';
require_once '../database/TaskQuery.php';

//Recibe los datos del view y se comunica con la base de datos.


/**
 * Instancia la clase Task Query
 * @acess private
 * @var TaskQuery
 */
$taskDb = new TaskQuery();


$taskId = $_POST["taskId"];


/**
 * Llama al método taskDelete y guarda el resultado
 * @acess private
 * @var array
 */
$tasks = $taskDb->taskDelete($taskId);

echo json_encode($tasks);
