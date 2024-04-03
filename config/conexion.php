<?php

// Definición de la clase Conexion
class Conexion {
    // Propiedad para almacenar la conexión a la base de datos
    private $conexion;

    // Constructor de la clase Conexion
    public function __construct() {
        // Parámetros de conexión a la base de datos
        $host = "localhost";
        $user = "root";
        $pass = "";
        $bd = "oda";

        // Establecer la conexión utilizando mysqli
        $this->conexion = new mysqli($host, $user, $pass, $bd);

        // Verificar si hay errores en la conexión
        if ($this->conexion->connect_error) {
            die("Error al conectar a la base de datos: " . $this->conexion->connect_error);
        }
    }

    // Método para obtener la conexión a la base de datos
    public function conectar() {
        return $this->conexion; // Retornar la conexión
    }

    // Método para cerrar la conexión a la base de datos
    public function desconectar() {
        $this->conexion->close(); // Cerrar la conexión
    }
}

?>
