<?php
require_once '../auth.php';
checkUserRole([1]);
?>
<?php
include "../db/conexion.php";

// Verificar si se ha pasado un ID a través de la URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta para obtener los detalles del contenedor
    $sql = "SELECT * FROM contenedor WHERE idcontenedor = ?";
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
    <title>Editar Contenedor</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body>
    <?php
    include "../header.php";
    ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1>Editar Contenedor</h1>
                <form action="confirmar_editar/aceptar_editarcontenedor.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="form-group">
                    <input name="nombreform" type="text" class="form-control" placeholder="Nombre contenedor" value="<?php echo $fila['nombre_contenedor']; ?>" required>
                    </div><br>
                    <div class="form-group">
                        <label for="">Proveedor:</label>
                        <select id="proveedor-select" name="categoriaform" class="form-control">
                            <?php
                            $sql = "select * from proveedor order by nombre asc";
                            $resultado = $conn->query($sql);
                            $proveedor_actual = $fila['idproveedor'];
                            while ($fila_categoria = $resultado->fetch_assoc()) {
                                $idproveedor  = $fila_categoria['idproveedor'];
                                $nombreproveedor  = $fila_categoria['nombre'];
                                $documento  = $fila_categoria['documento'];
                            ?>
                                <option value="<?php echo $idproveedor; ?>" <?php echo ($idproveedor == $proveedor_actual) ? "selected" : ""; ?>><?php echo $nombreproveedor, " ", $documento; ?></option>
                            <?php
                            }
                            ?>
                        </select>

                    </div><br>
                    <div class="form-group">
                        <label for="">Fecha:</label>
                        <input name="fechaform" type="date" class="form-control" value="<?php echo $fila['fecha']; ?>" required>
                    </div><br>
                    <div class="form-group">
                        <label for="">Dólar:</label>
                        <input name="dolarform" type="number" class="form-control" step="0.01" value="<?php echo $fila['dolar']; ?>" required>
                    </div><br>
                    <div class="form-group">
                        <label for="">Yuan:</label>
                        <input name="yuanform" type="number" class="form-control" step="0.01" value="<?php echo $fila['yuan']; ?>">
                    </div><br>
                    <!-- Campos para los gastos de importación -->
                    <!-- Agrega aquí los campos adicionales para gastos de importación si los necesitas -->
                    <div class="form-group">
                        <input name="gasto1form" type="number" class="form-control" placeholder="Costo importacion 1 0.00" value="<?php echo $fila['gastos_importacion1']; ?>" required step="0.01">
                    </div><br>
                    <div class="form-group">
                        <input name="gasto2form" type="number" class="form-control" placeholder="Costo importacion 2 0.00" value="<?php echo $fila['gastos_importacion2']; ?>" step="0.01">
                    </div><br>
                    <div class="form-group">
                        <input name="gasto3form" type="number" class="form-control" placeholder="Costo importacion 3 0.00" value="<?php echo $fila['gastos_importacion3']; ?>" step="0.01">
                    </div><br>
                    <div class="form-group">
                        <input name="gasto4form" type="number" class="form-control" placeholder="Costo importacion 4 0.00" value="<?php echo $fila['gastos_importacion4']; ?>" step="0.01">
                    </div><br>
                    <!-- Fin de los campos adicionales -->
                    <div class="text-center mb-3">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const proveedorSelect = document.getElementById('proveedor-select');
            if (proveedorSelect) {
                $(proveedorSelect).select2();
            }
        });
    </script>
</body>

</html>