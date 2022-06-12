<?php

require_once '../model/Task.php';
require_once '../database/TaskQuery.php';

//Guarda el 
$taskDb = new TaskQuery();

$id = $_POST["id"];
$status = $_POST["status"];

//Comprobaciones de lo que hacen el botón según el estado de la tarea. 
//Si el estado de la tarea "es por hacer" se llama a a la función startCurrentTask
if ($status == "Por hacer"){
    $task = $taskDb->startCurrentTask($id);
//si el estado es "en curso" se llama a la función finishCurrentTask
}else{
    $task = $taskDb->finishCurrentTask($id);
}
echo json_encode($task);