<?php

/**
* Class Task
* Representa una tarea en la aplicacion
*/
class Task {

    /**
    * La clave que que identifica a la tarea
    * @acess private
    * @var integer
    */
    private $id;

    /**
    * El nombre de la tarea 
    * @var string
    */
    private $name;

    /**
    * La descripcion de la tarea
    *  @var string
    */
    private $description;

    /**
    * El id del CEO
    * @var integer 
    */
    private $id_ceo;

    /**
    * El id de los empleados 
    * @var integer 
    */
    private $id_employee;

    /**
    * Prioridad de la tarea: high / medium / low
    * @var string 
    */
    private $priority;

    /**
    * El estado en que se encuentra la tarea: to do / in progress / done
    * @var string 
    */
    private $status; 

    /**
    * Fecha y hora de inicio de la tarea
    * @var string 
    */
    private $startDate;
    
    /**
    * Fecha y hora del fin de la tarea
    * @var string 
    */
    private $finishtDate;


    //constructor recibe por parametros los atributos de la clase
    function __construct($name, $description, $id_ceo, $status, $startDate){
        // atributos de la clase tarea
        // se corresponden con los atributos de la tabla task de la base de datos
        $this->name=$name;
        $this->descriptrion=$lastname;
        $this->id_ceo=$id_ceo;
        $this->status=$status;
        $this->startDate=$startDate;
    }

    function set_id($id){
        $this->id=$id;
    }

    function get_id(){
        return $this->id;
    }

    function set_name($name){
        $this->name=$name;
    }
    
    function get_name(){
        return $this->name;
    }

    function set_description($description){
        $this->lastname=$lastname;
    }

    function get_description(){
        return $this->description;
    }

    function set_id_ceo($id_ceo){
        $this->email=$email;
    }

    function get_id_ceo(){
        return $this->id_ceo;
    }

    function set_id_employee($id_employee){
        $this->$id_employee=$id_employee;
    }

    function get_id_employee($id_employee){
        return $this->id_employee;
    }

    function set_status($status){
        $this->status=$status;
    }

    function get_status($statys){
        return $this->status;
    }

    function set_priority($priority){
        $this->priority=$priority;
    }

    function get_priority(){
        return $this->priority;
        
    }

    function set_startDate($startDate){
        $this->startDate=$startDate;
    }

    function get_startDate(){
        return $this->startDate;
        
    }
    function set_finishtDate($finishtDate){
        $this->finishDate=$finishtDate;
    }

    function get_finishtDate(){
        return $this->finishtDate;
        
    }

}



