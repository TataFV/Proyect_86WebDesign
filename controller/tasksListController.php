<?php

require_once '../model/Task.php';
require_once '../database/TaskQuery.php';

//Recibe los datos del view y se comunica con la base de datos.


/**
 * Nueva consulta en bases de datos del usuario
 * @acess private
 * @var TaskQuery
 */
$taskDb = new TaskQuery();


//Busca al usuario que se solicitó en la base de datos para comprobar si los datos coinciden

/**
 * Usuario de la base de datos
 * @acess private
 * @var array
 */
$tasks = $taskDb->findFinishedTasks();

echo json_encode($tasks);
