<?php
 
class UsuarioDTO implements JsonSerializable  {

    private $id;
    private $nombre;
    private $correo;
    private $telefono;

    public function __construct($id,$nombre,$correo,$telefono){

        $this->id=$id;
        $this->nombre=$nombre;
        $this->correo=$correo;
        $this->telefono=$telefono;

    }

    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
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




?>