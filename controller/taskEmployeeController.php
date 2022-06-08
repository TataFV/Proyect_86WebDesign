<?php

require_once '../model/Task.php';
require_once '../database/TaskQuery.php';

$taskDb = new TaskQuery();

$tasks = $taskDb->findCurrentTask();

echo json_encode($tasks);
