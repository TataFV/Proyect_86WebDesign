<?php

/**
 * Class Task
 * Representa una tarea en la aplicacion
 */
class Task
{

    /**
     * La clave que que identifica a la tarea
     * @acess private
     * @var integer
     */
    public $id;

    /**
     * El nombre de la tarea 
     * @var string
     */
    public $name;

    /**
     * La descripcion de la tarea
     *  @var string
     */
    public $description;

    /**
     * El id del CEO
     * @var integer 
     */
    public $id_ceo;

    /**
     * El id de los empleados 
     * @var integer 
     */
    public $id_employee;

    /**
     * Prioridad de la tarea: high / medium / low
     * @var string 
     */
    public $priority;

    /**
     * El estado en que se encuentra la tarea: to do / in progress / done
     * @var string 
     */
    public $status;

    /**
     * Fecha y hora de inicio de la tarea
     * @var string 
     */
    public $startDate;

    /**
     * Fecha y hora del fin de la tarea
     * @var string 
     */
    public $finishDate;

    /**
     * Tipo de tarea
     * @var string 
     */
    public $type;

    //constructor recibe por parametros los atributos de la clase
    function __construct($name, $description, $id_ceo, $status, $startDate)
    {
        // atributos de la clase tarea
        // se corresponden con los atributos de la tabla task de la base de datos
        $this->name = $name;
        $this->description = $description;
        $this->id_ceo = $id_ceo;
        $this->status = $status;
        $this->startDate = $startDate;
    }

    function set_id($id)
    {
        $this->id = $id;
    }

    function get_id()
    {
        return $this->id;
    }

    function set_name($name)
    {
        $this->name = $name;
    }

    function get_name()
    {
        return $this->name;
    }

    function set_description($description)
    {
        $this->description = $description;
    }

    function get_description()
    {
        return $this->description;
    }

    function set_id_ceo($id_ceo)
    {
        $this->id_ceo = $id_ceo;
    }

    function get_id_ceo()
    {
        return $this->id_ceo;
    }

    function set_id_employee($id_employee)
    {
        $this->id_employee = $id_employee;
    }

    function get_id_employee()
    {
        return $this->id_employee;
    }

    function set_status($status)
    {
        $this->status = $status;
    }

    function get_status()
    {
        return $this->status;
    }

    function set_priority($priority)
    {
        $this->priority = $priority;
    }

    function get_priority()
    {
        return $this->priority;
    }

    function set_startDate($startDate)
    {
        $this->startDate = $startDate;
    }

    function get_startDate()
    {
        return $this->startDate;
    }
    function set_finishDate($finishDate)
    {
        $this->finishDate = $finishDate;
    }

    function get_finishDate()
    {
        return $this->finishDate;
    }

    function set_type($type)
    {
        $this->type = $type;
    }

    function get_type()
    {
        return $this->type;
    }
}
