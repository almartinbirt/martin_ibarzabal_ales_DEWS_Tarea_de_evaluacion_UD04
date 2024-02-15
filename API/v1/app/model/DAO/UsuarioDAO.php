<?php 

class UsuarioDAO {

    private $db;

    public function __construct(){
        $this->db=DatabaseSingleton::getInstance();
    }

    public function obtenerUsuarios(){
        try {

            $connection = $this->db->getConnection();
            $query = "SELECT * FROM usuarios";
            $statement = $connection->query($query);
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            //return $result;

            $usuariosDTO = array();

            for($i=0; $i<count($result);$i++){
                $fila = $result[$i];
                $usuarioDTO = new UsuarioDTO(
                    $fila['id'],
                    $fila['nombre'],
                    $fila['correo'],
                    $fila['telefono']
                );
                $usuariosDTO[]=$usuarioDTO;
            }

            return $usuariosDTO;


        } catch (PDOException $e) {
            // Manejar errores de la base de datos
            error_log("Error al obtener usuarios " . $e->getMessage());
            return null; 
        }
    }

    public function obtenerUsuarioPorID($id) {

        try {
            $connection = $this->db->getConnection();
            $query = "SELECT * FROM usuarios WHERE id = :id";
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
            error_log("Error al obtener usuario por ID: " . $e->getMessage());
            return null; 
        }
    }
  
    public function crearUsuario($producto) { }

    public function actualizarUsuario($id, $nuevosDatos) { }

    public function eliminarUsuario($id) {

        try {
            $connection = $this->db->getConnection();
            $query = "DELETE FROM usuarios WHERE id = :id";
            $statement = $connection->prepare($query);
            $statement->bindParam(':id', $id, PDO::PARAM_INT); // Asumiendo que $id es un entero
            $statement->execute();
            $rowCount = $statement->rowCount(); // Obtener la cantidad de filas afectadas por la eliminación
            return $rowCount;
        } catch (PDOException $e) {
    
            // Manejar errores de la base de datos
            //error_log("Error al eliminar producto: " . $e->getMessage());
            return "Este Usuario consta que ha comprado por algún producto y no puede ser eliminado del registro de usuarios"; // O podrías lanzar una excepción aquí si prefieres
        }

    }
    
}