<?php
// Incluir el archivo que contiene la clase ProductoDAO
include_once('../models/productoDAO.php'); 

// Obtener el ID del producto a eliminar de los parámetros de la URL
$id = $_GET['id']; 

// Crear una instancia de la clase ProductoDAO
$productoDAO = new ProductoDAO(); //Crear instancia

// Llamar al método eliminarProducto() del objeto ProductoDAO y pasarle el ID del producto a eliminar
if ($productoDAO->eliminarProducto($id)) { //Llamar al metodo 
    
    // Si el producto se elimina correctamente, redirigir al usuario a la página principal
    header("Location: ../index.php");
    exit(); 
} else {
    // Si ocurre algún error al eliminar el producto, mostrar un mensaje de error
    echo "Error al eliminar el producto.";
}
?>

