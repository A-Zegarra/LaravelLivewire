<?php
require_once '../auth.php';
checkUserRole([1]);
?>
<?php
include "../db/conexion.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRO CONTENEDORES</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body>
    <?php
    include "../header.php";

    if (isset($_SESSION['success_message'])) {
        echo '<div id="success-alert" class="alert alert-success">' . $_SESSION['success_message'] . '</div>';
        unset($_SESSION['success_message']);
    }

    ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center">REGISTRO DE CONTENEDORES</h1><br>
                <form action="procesar_registro/procesar_regcontenedor.php" method="post">
                    <div class="form-group">
                        <input name="nombreform" type="text" class="form-control" placeholder="Nombre contenedor" required>
                    </div><br>
                    <div class="form-group">
                        <?php
                        $sql = "select * from proveedor order by nombre asc";
                        $resultado = $conn->query($sql);
                        ?>
                        <select id="proveedor-select" name="proveedorform" class="form-control">
                            <option value="">Selecciona un Proveedor</option>
                            <?php
                            while ($fila = $resultado->fetch_assoc()) {
                                $idproveedor  = $fila['idproveedor'];
                                $nombreprove  = $fila['nombre'];
                                $documentoprove  = $fila['documento'];
                            ?>

                                <option value="<?php echo $idproveedor; ?>"><?php echo $nombreprove, " ", $documentoprove; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div><br>
                    <div class="form-group">
                        <input name="fechaform" type="date" class="form-control" required>
                    </div><br>
                    <div class="form-group">
                        <input name="dolarform" type="number" class="form-control" placeholder="Cambio Dolar 0.00" required step="0.01">
                    </div><br>
                    <div class="form-group">
                        <input name="yuanform" type="number" class="form-control" placeholder="Cambio Yuan 0.00" step="0.01">
                    </div><br>
                    <!-- Campos agregados para los gastos de importación -->
                    <div class="form-group">
                        <input name="gasto1form" type="number" class="form-control" placeholder="Costo importacion 1 0.00" required step="0.01">
                    </div><br>
                    <div class="form-group">
                        <input name="gasto2form" type="number" class="form-control" placeholder="Costo importacion 2 0.00" step="0.01">
                    </div><br>
                    <div class="form-group">
                        <input name="gasto3form" type="number" class="form-control" placeholder="Costo importacion 3 0.00" step="0.01">
                    </div><br>
                    <div class="form-group">
                        <input name="gasto4form" type="number" class="form-control" placeholder="Costo importacion 4 0.00" step="0.01">
                    </div><br>
                    <!-- Fin de los campos agregados -->
                    <div class="text-center mb-3">
                        <button type="submit" class="btn btn-primary">Guardar</button>
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
    <script src="../js/temporizador_registro.js"></script>
</body>

</html>