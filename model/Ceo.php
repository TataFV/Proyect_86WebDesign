<?php

require_once 'User.php';

/**
 * Class Ceo
 * Representa al CEO/Admin en la aplicacion
 * Hereda de User
 */
class Ceo extends User
{

    function __construct($name, $lastname, $email, $password)
    {
        parent::__construct($name, $lastname, $email, $password, 'CEO');
    }
}
