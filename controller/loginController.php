<?php

require_once '../model/user.php';
require_once '../database/UserQuery.php';

//Recibe los datos del view y se comunica con la base de datos.

/**
* El email del usuario con el que inició sesion
* @acess private
* @var string
*/
$username = $_POST["username"];

/**
 * La contraseña que el usuario introdujo para iniciar sesion
* @acess private
* @var string
*/
$password = $_POST["password"];

/**
 * Nueva consulta en bases de datos del usuario
 * @acess private
 * @var UserQuery
 */
$userDb = new UserQuery();


//Busca al usuario que se solicitó en la base de datos para comprobar si los datos coinciden

/**
 * Usuario de la base de datos
 * @acess private
 * @var User
 */
$user = $userDb->findUser($username);

if(is_null($user)){
    echo "El usuario no existe";

}else if ($password == $user->get_password()){
        //Crear inicio de sesion
        session_start();
        //si el usuario tiene el rol de CEO 
        if( "CEO" == $user->get_role()){
            //variable_global, almacena datos de inicio de sesion
            $_SESSION['user'] = $user; 
            //Respuesta que se mostrará con Ajax
            $response = ['error' => false, 'response' => '../view/ceoPanel.php'];
            //Pasa los datos que contiene el array de PHP a JavaScript
            echo json_encode($response);  
        }
}else{
        echo "La contraseña es incorrecta";
    }

