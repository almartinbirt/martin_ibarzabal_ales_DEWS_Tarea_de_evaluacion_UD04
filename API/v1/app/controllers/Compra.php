<?php

// La clase User representa un controlador para manejar operaciones relacionadas con usuarios
class Compra {

    // Constructor de la clase
    function __construct(){}

    // Obtiene todos los usuarios y los imprime en formato JSON
    function getAllPurchases(){
      
        $compraDAO = new CompraDAO();
        $compras = $compraDAO->obtenerCompras();

        //var_dump($compras);
        echo json_encode($compras);
    }

    // Obtiene un usuario por su ID y lo imprime en formato JSON
    function getPurchaseById($id) {

        $compraDAO = new CompraDAO();
        $compras = $compraDAO->obtenerCompraPorID($id);

        var_dump($compras);
    }

    // Crea un nuevo usuario utilizando los datos proporcionados y lo imprime en formato JSON
    function createPurchase($data) {
 
        $compraDAO = new CompraDAO();
        $compras = $compraDAO->obtenerCompraPorID($data);

        var_dump($compras);
    }

    // Actualiza un usuario existente por su ID con los nuevos datos proporcionados y lo imprime en formato JSON
    function updatePurchase($id, $data) {

        $compraDAO = new CompraDAO();
        $compras = $compraDAO->actualizarCompra($id, $nuevosDatos);

        var_dump($compras);
    }

    // Elimina un usuario por su ID y devuelve el array de usuarios modificado en formato JSON
    function deletePurchase($id) {

        $compraDAO = new CompraDAO();
        $compras = $compraDAO->eliminarCompra($id);

        var_dump($compras); 
    }

}

?>

