<?php

//Conexion a la base de datos empresa_86WebDesign

$name_server = "localhost";
$user = "empresa86";
$password = "#7gD72Ya22d&SCK";
$db = "empresa_86WebDesign"; 
$connection = new mysqli($name_server, $user, $password, $db);

//Si hay error de conexion

if($connection->connect_error){
    die("Connection failed:" . $connection->connect_error);
}

