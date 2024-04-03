<?php
// Incluimos el archivo de configuración de la conexión a la base de datos
include_once('../config/conexion.php');

// Creamos una instancia de la clase Conexion para establecer la conexión a la base de datos
$conexion = new Conexion();

// Obtenemos la conexión utilizando el método conectar() de la clase Conexion
$conn = $conexion->conectar();

// Definición de la clase ProductoDAO
class ProductoDAO {
    // Propiedad para almacenar la conexión a la base de datos
    private $conexion;

    // Constructor de la clase ProductoDAO que inicializa la conexión
    public function __construct() {
        $this->conexion = new Conexion();
    }

    // Método para agregar un nuevo producto a la base de datos
    public function agregarProducto($nombre, $descripcion) {
        $conn = $this->conexion->conectar(); // Obtenemos la conexión
        $sql = "INSERT INTO producto (Nombre, Descripcion) VALUES ('$nombre', '$descripcion')"; // Consulta SQL para insertar el producto
        return mysqli_query($conn, $sql); // Ejecutamos la consulta y retornamos el resultado
    }

    // Método para obtener todos los productos de la base de datos
    public function obtenerProductos() {
        $conn = $this->conexion->conectar(); // Obtenemos la conexión
        $sql = "SELECT * FROM producto"; // Consulta SQL para seleccionar todos los productos
        $query = mysqli_query($conn, $sql); // Ejecutamos la consulta
        $productos = []; // Creamos un array para almacenar los productos
        while ($row = mysqli_fetch_array($query)) { // Recorremos el resultado de la consulta
            $productos[] = $row; // Agregamos cada producto al array
        }
        return $productos; // Retornamos el array de productos
    }

    // Método para actualizar un producto en la base de datos
    public function actualizarProducto($conn, $id, $nombre, $descripcion) {
        $sql = "UPDATE producto SET Nombre=?, descripcion=? WHERE ID=?"; // Consulta SQL para actualizar el producto
        $stmt = $conn->prepare($sql); // Preparamos la consulta
        $stmt->bind_param("ssi", $nombre, $descripcion, $id); // Asociamos los parámetros a la consulta
    
        // Ejecutamos la consulta preparada y retornamos el resultado
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    // Método para eliminar un producto de la base de datos
    public function eliminarProducto($id) {
        $conn = $this->conexion->conectar(); // Obtenemos la conexión
        $sql = "DELETE FROM producto WHERE ID='$id'"; // Consulta SQL para eliminar el producto
        return mysqli_query($conn, $sql); // Ejecutamos la consulta y retornamos el resultado
    }
}
?>
