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

//

$name = $_POST["name"];
$description = $_POST["description"];
$type = $_POST["type"];
$priority = $_POST["priority"];


/**
 * Llama al método taskCreate y devuelve el resultado
 * @acess private
 * @var array
 */
$tasks = $taskDb->taskCreate($name, $description, $type, $priority);

echo json_encode($tasks);
