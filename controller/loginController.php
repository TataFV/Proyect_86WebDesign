<?php

require_once '../model/user.php';
require_once '../database/UserQuery.php';

//Recibe los datos del view y se comunica con la base de datos.

/**
* El email del usuario con el que inició sesion
* @acess private
* @var integer
*/
$username = $_POST["username"];

/**
 * La contraseña que el usuario introdujo para iniciar sesion
* @acess private
* @var integer
*/
$password = $_POST["password"];

/**
 * Nueva consulta en bases de datos del usuario
 * @acess private
 * @var integer
 */
$userDb = new UserQuery();

/**
 * Usuario de la base de datos
 * @acess private
 * @var integer
 */

//Busca al usuario que se solicitó en la base de datos para comprobar si los datos coinciden

$user = $userDb->findUser($username);
if(is_null($user)){
    echo "El usuario no existe";
}else{
    if ($password == $user->get_password()){
        echo "Ok";
    }else{
        echo "La contraseña es incorrecta";
    }
}