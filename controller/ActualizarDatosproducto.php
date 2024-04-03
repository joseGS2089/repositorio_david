<?php
// Incluye el archivo que contiene la clase ProductoDAO
include_once('../models/productoDAO.php');

// Verifica si se han enviado las variables POST 'id', 'nombre' y 'descripcion'
if(isset($_POST['id'], $_POST['nombre'], $_POST['descripcion'])) {
    // Asigna los valores de las variables POST a variables locales
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    // Si se ha enviado el formulario de actualización
    if(isset($_POST['confirmacion']) == 'si') {
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
    } else {
        // Mostrar el mensaje de confirmación y el formulario de confirmación
        echo "¿Estás seguro de que desea actualizar los datos del producto producto?";
        echo '<form method="post">';
        echo '<input type="hidden" name="id" value="' . $id . '">';
        echo '<input type="hidden" name="nombre" value="' . $nombre . '">';
        echo '<input type="hidden" name="descripcion" value="' . $descripcion . '">';
        echo '<input type="hidden" name="confirmacion" value="si">';
        echo '<button type="submit">Sí</button>';
        echo '<a href="../index.php">No</a>';
        echo '</form>';
    }
}
?>

