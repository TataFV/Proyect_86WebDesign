<?php

require_once 'user.php';

//$user = new User('123','123','123','123','123');
//print_r($user);

class Ceo extends User{

    function __construct($name, $lastname, $email, $password){
        parent::__construct($name, $lastname, $email, $password, 'CEO');
    }

}

$jefe = new Ceo('Deka','Arenal','123@123','1234');
print_r($jefe);