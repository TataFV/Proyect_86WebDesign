<?php

require_once '../model/Task.php';
require_once '../model/User.php';
require_once '../database/TaskQuery.php';

$taskDb = new TaskQuery();

session_start();
$user = $_SESSION["user"];

$task = $taskDb->findCurrentTask($user->get_id());

echo json_encode($task);
