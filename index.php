<?php
require_once 'auth.php';
checkUserRole([1,2]);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inventario</title>
</head>

<body>

    <?php
    include "header.php";
    ?>

    <?php
    include "inventario.php";
    ?>

</body>

</html>