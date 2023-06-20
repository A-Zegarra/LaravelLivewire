<?php
require_once '../auth.php';
checkUserRole([1]);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRO PROVEEDORES</title>
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
                <h1 class="text-center ">REGISTRO DE PROVEEDORES</h1><br>
                <form action="procesar_registro/procesar_regproveedor.php" method="post">
                    <div class="form-group">
                        <input name="nombre" type="text" class="form-control" placeholder="Nombre proveedor (Obligatorio)" required>
                    </div><br>
                    <div class="form-group">
                        <input name="tel" type="number" class="form-control" placeholder="Numero de teléfono | 000 000 000">
                    </div><br>
                    <div class="form-group">
                        <input name="direccion" type="text" class="form-control" placeholder="Ingresa la direccion de proveedor">
                    </div><br>
                    <div class="form-group">
                        <input name="email" type="email" class="form-control" placeholder="@ Ingresa correo electronico">
                    </div><br>
                    <div class="form-group">
                        <input name="documento" type="number" class="form-control" placeholder="Ingresa numero de documento | 00000000 (Obligatorio)">
                    </div><br>
                    <div class="form-group">
                        <select class="form-select" name="pais">
                            <option value="">Selecciona un Pais</option>
                            <option value="China">China</option>
                            <option value="Peru">Perú</option>
                            <option value="Chile">Chile</option>
                        </select>
                    </div><br>
                    <div class="form-group">
                        <input name="ciudad" type="text" class="form-control" placeholder="Ciudad">
                    </div><br>

                    <div class="text-center mb-3">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../js/temporizador_registro.js"></script>
</body>

</html>