<?php

/**
* Class User
* Representa un Usuario en la aplicacion.
*/
class User {

    /**
    * La clave que que identifica al usuario
    * @acess private
    * @var integer
    */
    private $id;

    /**
    * El nombre del usuario
    * @var string
    */
    private $name;

    /**
    * Los apellidos del usuario
    *  @var string
    */
    private $lastname;

    /**
    * El email del usuario
    * @var string 
    */
    private $email;

    /**
    * El la contraseña del email del usuario
    * @var string 
    */
    private $password;

    /**
    * El rol del usuario, puede ser CEO o empleado
    * @var string 
    */
    private $role;

    //constructor recibe por parametros los atributos de la clase
    function __construct($name, $lastname, $email, $password, $role){
        // atributos de la clase usuario
        // se corresponden con los atributos de la tabla usuario de la base de datos
        $this->name=$name;
        $this->lastname=$lastname;
        $this->email=$email;
        $this->password=$password;
        $this->role=$role;
    }

    function set_id($id){
        $this->id=id;
    }

    function get_id(){
        return $this->id;
    }

    function set_name($name){
        $this->name=name;
    }
    
    function get_name(){
        return $this->name;
    }

    function set_lastname($lastname){
        $this->lastname=lastname;
    }

    function get_lastname(){
        return $this->lastname;
    }

    function set_email($email){
        $this->email=email;
    }

    function get_email(){
        return $this->email;
    }

    function set_password($password){
        $this->password=password;
    }

    function get_password(){
        return $this->password;
    }

    function set_role($role){
        $this->role=role;
    }

    function get_role(){
        return $this->role;
        
    }
}

?>