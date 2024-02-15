<?php

// La clase User representa un controlador para manejar operaciones relacionadas con usuarios
class Producto {

    // Constructor de la clase
    function __construct(){}

    // Obtiene todos los usuarios y los imprime en formato JSON
    function getAllProducts(){
      
        $productoDAO = new ProductoDAO();
        $productos = $productoDAO->obtenerProductos();
        echo json_encode($productos);
       
    }

    // Obtiene un usuario por su ID y lo imprime en formato JSON
    function getProductById($id) {

        $productoDAO = new ProductoDAO();
        $productos = $productoDAO->obtenerProductoPorID($id);
        echo json_encode($productos);
    }

    // Crea un nuevo usuario utilizando los datos proporcionados y lo imprime en formato JSON
    function createProducto($data) {
 
        $productoDAO = new ProductoDAO();
        $productos = $productoDAO->obtenerProductoPorID($data);

        var_dump($productos);
    }

    // Actualiza un usuario existente por su ID con los nuevos datos proporcionados y lo imprime en formato JSON
    function updateProduct($id, $data) {

        $productoDAO = new ProductoDAO();
        $productos = $productoDAO->actualizarProducto($id, $nuevosDatos);

        var_dump($productos);
    }

    // Elimina un usuario por su ID y devuelve el array de usuarios modificado en formato JSON
    function deleteProductById($id) {

        $productoDAO = new ProductoDAO();
        $productos = $productoDAO->eliminarProducto($id);

        var_dump($productos);
      
    }


    



}

?>

