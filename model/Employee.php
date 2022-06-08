<?php

require_once ('User.php');

/**
* Class Employee
* Representa a los empleados en la aplicacion
* Hereda de User
*/
class Employee extends User{

    function __construct($name, $lastname, $email, $password){
        parent::__construct($name, $lastname, $email, $password, 'Employee');
    }

}