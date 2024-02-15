<?php 

class UsuarioEntity{

    private $id;
    private $nombre;
    private $correo;
    private $telefono;

    public function __construct($nombre, $correo, $telefono){
        $this->nombre=$nombre;
        $this->correo=$correo;
        $this->telefono=$telefono;
    }



    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Get the value of correo
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Get the value of telefono
     */
    public function getTelefono()
    {
        return $this->telefono;
    }
}