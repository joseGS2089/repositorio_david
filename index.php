<?php
include('./config/conexion.php');

$conexion = new Conexion();
$conn = $conexion->conectar();
$sql = "SELECT * FROM producto";
$query = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/">
</head>
<body>
    <!-- Botón para agregar producto -->
    <div class="container mt-4">
        <div class="row justify-content-between"> <!-- Cambia justify-content-end a justify-content-between -->
            <div class="col-md-2">
                <button type="button" class="d-flex justify-content-end mb-3 " data-toggle="modal" data-target="#agregarModal">
                    Add
                </button>
            </div>
        </div>
    </div>

    <!-- Modal para agregar producto -->
    <div class="modal fade" id="agregarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulario para agregar producto -->
                    <form action="controller/AgregarDatosproducto.php" method="POST">
                        <div class="form-group">
                            <label for="nombre">Name:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Description:</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción">
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <table class="table table-bordered table-custom"> <!-- Agrega la clase table-custom -->
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th> 
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($query)): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['nombre'] ?></td>
                    <td><?= $row['descripcion'] ?></td>
                    <td>
                        <!-- Botón para editar producto -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editarModal<?= $row['id'] ?>">
                           Update
                        </button>
                        <!-- Enlace para eliminar producto -->
                        <a href="controller/EliminarDatosproducto.php?id=<?= $row['id'] ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>

                <!-- Modal para editar producto -->
                <div class="modal fade" id="editarModal<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update product</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Formulario para editar producto -->
                                <form action="controller/ActualizarDatosproducto.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $row['Id'] ?>">
                                    <div class="form-group">
                                        <label for="nombre">Add name:</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre" value="<?= $row['nombre'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion">Add Description:</label>
                                        <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="descripción" value="<?= $row['descripcion'] ?>">
                                    </div>
                                    <button type="submit" class="btn btn-warning">Save changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</body>
</html>
