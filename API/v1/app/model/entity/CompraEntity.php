<?php 

class CompraEntity{

    private $id;
    private $usuario_id;
    private $producto_id;
    private $cantidad;
    private $fecha;

    public function __construct($usuario_id, $producto_id, $cantidad, $fecha){
        $this->usuario_id=$usuario_id;
        $this->producto_id=$producto_id;
        $this->cantidad=$cantidad;
        $this->fecha=$fecha;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of usuario_id
     */
    public function getUsuarioId()
    {
        return $this->usuario_id;
    }

    /**
     * Get the value of producto_id
     */
    public function getProductoId()
    {
        return $this->producto_id;
    }

    /**
     * Get the value of cantidad
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Get the value of fecha
     */
    public function getFecha()
    {
        return $this->fecha;
    }


}