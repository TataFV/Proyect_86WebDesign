<?php
    require_once '../model/User.php';
    session_start();
    $user = $_SESSION['user'];
?>
<DOCTYPE html>
<html lang="es">
    <head>
    </head>
    <body>
        <h1>Bienvenido <?php echo $user->get_name(); ?><h1>
    </body>
<html>