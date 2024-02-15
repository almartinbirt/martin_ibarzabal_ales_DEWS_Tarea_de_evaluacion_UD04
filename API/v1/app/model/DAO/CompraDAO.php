<?php 

class CompraDAO {

    private $db;

    public function __construct(){
        $this->db=DatabaseSingleton::getInstance();
    }

    public function obtenerCompras(){
        $connection = $this->db->getConnection();
        $query = "SELECT * FROM compras";
        $statement = $connection->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        $comprasDTO = array();

        for($i=0; $i<count($result);$i++){
            $fila = $result[$i];
            $compraDTO = new CompraDTO(
                $fila['id'],
                $fila['usuario_id'],
                $fila['producto_id'],
                $fila['cantidad'],
                $fila['fecha_compra']
            );
            $comprasDTO[]=$compraDTO;
        }

        return $comprasDTO;


    }

    public function obtenerCompraPorID($id) {

        try {
            $connection = $this->db->getConnection();
            $query = "SELECT * FROM compras WHERE id = :id";
            $statement = $connection->prepare($query);
            $statement->bindParam(':id', $id, PDO::PARAM_INT); // Asumiendo que $id es un entero
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC); // Para obtener cada fila de registros de la BD como un array asociativo
    
            // Verificar si se encontró un resultado
            if ($result !== false) {
                return $result;
            } else {
                return null; 
            }
        } catch (PDOException $e) {
            // Manejar errores de la base de datos
            error_log("Error al obtener producto por ID: " . $e->getMessage());
            return null; 
        }
    }
  
    public function crearCompra($producto) {}

    public function actualizarCompra($id, $nuevosDatos) {}

    public function eliminarCompra($id) {

        try {
            $connection = $this->db->getConnection();
            $query = "DELETE FROM compras WHERE id = :id";
            $statement = $connection->prepare($query);
            $statement->bindParam(':id', $id, PDO::PARAM_INT); // Asumiendo que $id es un entero
            $statement->execute();
            $rowCount = $statement->rowCount(); // Obtener la cantidad de filas afectadas por la eliminación
            return $rowCount;
        } catch (PDOException $e) {
             var_dump($e);
            // Manejar errores de la base de datos
            //error_log("Error al eliminar producto: " . $e->getMessage());
            return "Este producto está registrado como comprado por algún usuario y no puede ser eliminado del registro de productos"; // O podrías lanzar una excepción aquí si prefieres
        }

    }
    
}