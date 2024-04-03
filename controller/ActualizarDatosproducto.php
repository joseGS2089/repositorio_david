<?php
// Incluye el archivo que contiene la clase ProductoDAO
include_once('../models/productoDAO.php');

// Verifica si se han enviado las variables POST 'id', 'nombre' y 'descripcion'
if(isset($_POST['id'], $_POST['nombre'], $_POST['descripcion'])) {
    // Asigna los valores de las variables POST a variables locales
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    
    // Crea una instancia de la clase ProductoDAO
    $productoDAO = new ProductoDAO();

    // Llama al método actualizarProducto de la instancia de ProductoDAO,
    // pasando los parámetros necesarios
    if($productoDAO->actualizarProducto($conn, $id, $nombre, $descripcion)) {
        // Si la actualización fue exitosa, redirige al usuario a la página principal
        header("Location: ../index.php");
        exit(); // Finaliza la ejecución del script después de la redirección
    } else {
        // Si hubo un error al actualizar el producto, muestra un mensaje de error
        echo "Error al actualizar el producto.";
    }
}
?>

