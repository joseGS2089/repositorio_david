<?php
// Incluye el archivo que contiene la clase ProductoDAO
include_once('../models/productoDAO.php');

// Obtiene el nombre y la descripción del producto desde las variables POST
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];

// Crea una instancia de la clase ProductoDAO
$productoDAO = new ProductoDAO();

// Llama al método agregarProducto de la instancia de ProductoDAO,
// pasando el nombre y la descripción del producto como argumentos
if ($productoDAO->agregarProducto($nombre, $descripcion)) {
    // Si la adición del producto fue exitosa, redirige al usuario a la página principal
    header("Location: ../index.php");
    exit(); // Finaliza la ejecución del script después de la redirección
} else {
    // Si hubo un error al agregar el producto, muestra un mensaje de error
    echo "Error al agregar el producto.";
}
?>
