<?php

// La clase User representa un controlador para manejar operaciones relacionadas con usuarios
class Usuario {

    // Constructor de la clase
    function __construct(){}

    // Obtiene todos los usuarios y los imprime en formato JSON
    function getAllUsers(){
      
        $UsuarioDAO = new UsuarioDAO();
        $usuarios = $UsuarioDAO->obtenerUsuarios();
        echo json_encode($usuarios);
    
    }

    // Obtiene un usuario por su ID y lo imprime en formato JSON
    function getUserById($id) {

        $productoDAO = new ProductoDAO();
        $productos = $productoDAO->obtenerProductoPorID($id);

        var_dump($productos);
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
    function deleteUserById($id) {

        $productoDAO = new ProductoDAO();
        $productos = $productoDAO->eliminarProducto($id);

        var_dump($productos);
      
    }


    



}

?>

