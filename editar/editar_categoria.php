<?php
require_once '../auth.php';
checkUserRole([1]);
?>
<?php
include "../db/conexion.php";

// Verificar si se ha pasado un ID a través de la URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta para obtener los detalles del producto
    $sql = "SELECT * FROM categoria WHERE idcategoria = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $fila = $resultado->fetch_assoc();
} else {
    // Redirigir a la página principal si no se pasa un ID válido
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
</head>

<body>
    <?php
    include "../header.php";
    ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1>Editar Producto</h1>
                <form action="confirmar_editar/aceptar_editarcategoria.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="form-group">
                        <label for="">NOMBRE:</label>
                        <input name="nombreform" type="text" class="form-control" placeholder="Nombre Categoría" value="<?php echo $fila['nombre']; ?>" required>
                    </div><br>
                    <div class="form-group">
                        <label for="">DESCRIPCION:</label>
                        <input name="decripcionform" type="text" class="form-control" placeholder="Descripción de la categoría" value="<?php echo $fila['descripcion']; ?>">
                    </div><br>
                    <div class="text-center mb-3">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>