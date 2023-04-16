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
    $sql = "SELECT * FROM proveedor WHERE idproveedor = ?";
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
                <h1 class="text-center ">EDITAR DE PROVEEDORES</h1><br>
                <form action="confirmar_editar/aceptar_editarproveedor.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="form-group">
                        <input name="nombre" type="text" class="form-control" placeholder="Nombre proveedor (Obligatorio)" value="<?php echo $fila['nombre']; ?>" required>
                    </div><br>
                    <div class="form-group">
                        <input name="tel" type="number" class="form-control" placeholder="Numero de teléfono | 000 000 000" value="<?php echo $fila['telefono']; ?>">
                    </div><br>
                    <div class="form-group">
                        <input name="direccion" type="text" class="form-control" placeholder="Ingresa la direccion de proveedor" value="<?php echo $fila['direccion']; ?>">
                    </div><br>
                    <div class="form-group">
                        <input name="email" type="email" class="form-control" placeholder="@ Ingresa correo electronico" value="<?php echo $fila['email']; ?>">
                    </div><br>
                    <div class="form-group">
                        <input name="documento" type="number" class="form-control" placeholder="Ingresa numero de documento | 00000000 (Obligatorio)" value="<?php echo $fila['documento']; ?>">
                    </div><br>
                    <div class="form-group">
                        <?php $pais_actual = strtoupper($fila['pais']); ?>
                        <select class="form-select" name="pais">
                            <option value="" <?= $pais_actual == '' ? 'selected' : '' ?>>Selecciona un Pais</option>
                            <option value="China" <?= $pais_actual == 'CHINA' ? 'selected' : '' ?>>China</option>
                            <option value="Peru" <?= $pais_actual == 'PERU' ? 'selected' : '' ?>>Perú</option>
                            <option value="Chile" <?= $pais_actual == 'CHILE' ? 'selected' : '' ?>>Chile</option>
                        </select>
                    </div><br>
                    <div class="form-group">
                        <input name="ciudad" type="text" class="form-control" placeholder="Ciudad" value="<?php echo $fila['ciudad']; ?>">
                    </div><br>
                    <div class="text-center mb-3">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                        <a href="../listar/listar_proveedor.php"><button type="button" class="btn btn-danger">Cancelar</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>