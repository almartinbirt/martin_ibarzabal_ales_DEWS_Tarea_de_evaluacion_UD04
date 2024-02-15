<?php 

class ProductoDAO {

    private $db;

    public function __construct(){
        $this->db=DatabaseSingleton::getInstance();
    }

    public function obtenerProductos(){

        try {
            $connection = $this->db->getConnection();
            $query = "SELECT * FROM productos";
            $statement = $connection->query($query);
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            $productosDTO = array();

            for($i=0; $i<count($result);$i++){
                $fila = $result[$i];
                $productoDTO = new ProductoDTO(
                    $fila['id'],
                    $fila['nombre'],
                    $fila['precio'],
                    $fila['cantidad']
                );
                $productosDTO[]=$productoDTO;
            }

            return $productosDTO;

        } catch (PDOException $e) {
            // Manejar errores de la base de datos
            error_log("Error al obtener productos" . $e->getMessage());
            return null; 
        }


    }

    public function obtenerProductoPorID($id) {

        try {
            $connection = $this->db->getConnection();
            $query = "SELECT * FROM productos WHERE id = :id";
            $statement = $connection->prepare($query);
            $statement->bindParam(':id', $id, PDO::PARAM_INT); // Asumiendo que $id es un entero
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC); // Para obtener cada fila de registros de la BD como un array asociativo
    
            // Verificar si se encontró un resultado
            if ($result !== false) {
               
                $productoDTO = new ProductoDTO(
                    $result['id'],
                    $result['nombre'],
                    $result['precio'],
                    $result['cantidad']
                );

               return $productoDTO;

            } else {

                return null; 
            }
        } catch (PDOException $e) {
            // Manejar errores de la base de datos
            error_log("Error al obtener producto por ID: " . $e->getMessage());
            return null; 
        }
    }
  
    public function crearProducto($producto) { }

    public function actualizarProducto($id, $nuevosDatos) { }

    public function eliminarProducto($id) {

        try {
            $connection = $this->db->getConnection();
            $query = "DELETE FROM productos WHERE id = :id";
            $statement = $connection->prepare($query);
            $statement->bindParam(':id', $id, PDO::PARAM_INT); // Asumiendo que $id es un entero
            $statement->execute();
            $rowCount = $statement->rowCount(); // Obtener la cantidad de filas afectadas por la eliminación
            return $rowCount;
        } catch (PDOException $e) {
    
            // Manejar errores de la base de datos
            //error_log("Error al eliminar producto: " . $e->getMessage());
            return "Este producto consta que ha sido comprado por algún usuario y no puede ser eliminado del registro de productos"; // O podrías lanzar una excepción aquí si prefieres
        }

    }
    
}