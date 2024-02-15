<?php

class ProductoDTO implements JsonSerializable  {

    private $id;
    private $nombre;
    private $precio;
    private $cantidad;

    public function __construct($id,$nombre,$precio,$cantidad){

        $this->id=$id;
        $this->nombre=$nombre;
        $this->precio=$precio;
        $this->cantidad=$cantidad;

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
     * Get the value of precio
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Get the value of cantidad
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }
}




?>