<?php

require_once '../model/Task.php';
require_once '../database/TaskQuery.php';

$taskDb = new TaskQuery();

$id = $_POST["id"];
$status = $_POST["status"];

if ($status == "Por hacer"){
    $task = $taskDb->startCurrentTask($id);
}else{
    $task = $taskDb->finishCurrentTask($id);
}
echo json_encode($task);