<?php

require_once '../model/Task.php';
require_once '../model/User.php';
require_once '../database/TaskQuery.php';

$taskDb = new TaskQuery();

//Inicio de sesion del Empleado
session_start();

//El usuario es empleado que inicio sesion
$user = $_SESSION["user"];

//La tarea es la tarea actual  
$task = $taskDb->findCurrentTask($user->get_id());

echo json_encode($task);
