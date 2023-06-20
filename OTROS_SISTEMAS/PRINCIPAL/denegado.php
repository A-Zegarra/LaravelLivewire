<?php
require_once 'auth.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Acceso denegado</title>
</head>

<body>
    <?php
    include "header.php";
    ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center">Acceso denegado</h1>
                <p class="text-center">No tienes permiso para acceder a esta página.</p>
                <div class="d-grid gap-2">
                    <a href="index.php" class="btn btn-primary">Volver al inicio</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>