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
    <title>REGISTRO CATEGORIAS</title>
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
                <h1 class="text-center ">REGISTRO DE CATEGORIAS</h1><br>
                <form action="procesar_registro/procesar_regcategoria.php" method="post">
                    <div class="form-group">
                        <label for="">NOMBRE:</label>
                        <input name="nombreform" type="text" class="form-control" placeholder="Nombre Categoría" required>
                    </div><br>
                    <div class="form-group">
                        <label for="">DESCRIPCION:</label>
                        <input name="decripcionform" type="text" class="form-control" placeholder="Descripción de la categoría">
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