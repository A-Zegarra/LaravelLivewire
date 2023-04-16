<?php
require_once '../auth.php';
checkUserRole([1]);
?>
<?php
include "../db/conexion.php";
$registros_por_pagina = 50; // Número de registros que deseas mostrar por página
$pagina_actual = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;
$offset = ($pagina_actual - 1) * $registros_por_pagina;
$sql = "SELECT * FROM contenedor INNER JOIN proveedor ON contenedor.idproveedor = proveedor.idproveedor LIMIT $registros_por_pagina OFFSET $offset";
$resultado = $conn->query($sql);
$sql_total = "SELECT COUNT(*) as total_registros FROM contenedor";
$resultado_total = $conn->query($sql_total);
$fila_total = $resultado_total->fetch_assoc();
$total_registros = $fila_total['total_registros'];
$total_paginas = ceil($total_registros / $registros_por_pagina);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTENEDORES</title>
</head>

<body>
    <?php
    include "../header.php";
    ?>
    <br>
    <div class="container">
        <h1>CONTENEDORES</h1><br>
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <form class='d-flex' action="#" method="dialog">
                    <input class="form-control me-2" type="search" name="busqueda" aria-label="Search" id="busqueda" placeholder="Proveedor, fecha">
                </form>
                <ul class="pagination">
                    <li class="page-item <?= $pagina_actual == 1 ? 'disabled' : '' ?>"><a class="page-link" href="?page=<?= $pagina_actual - 1 ?>">Anterior</a></li>
                    <?php for ($i = 1; $i <= $total_paginas; $i++) : ?>
                        <li class="page-item <?= $i == $pagina_actual ? 'active' : '' ?>"><a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a></li>
                    <?php endfor; ?>
                    <li class="page-item <?= $pagina_actual == $total_paginas ? 'disabled' : '' ?>"><a class="page-link" href="?page=<?= $pagina_actual + 1 ?>">Siguiente</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="container">
        <div class="table-responsive">
            <table id="tabla-listas" class="table table-bordered table-striped mx-auto">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>CONTENEDOR</th>
                        <th>PROVEEDOR</th>
                        <th>FECHA</th>
                        <th>YUAN ¥</th>
                        <th>DÓLAR $</th>
                        <th>GASTO 1</th>
                        <th>GASTO 2</th>
                        <th>GASTO 3</th>
                        <th>GASTO 4</th>
                        <th colspan="2">OPCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($fila = $resultado->fetch_assoc()) {
                        $idcontenedor = $fila['idcontenedor'];
                        $nombrecontenedor = $fila['nombre_contenedor'];
                        $idproveedor = $fila['idproveedor'];
                        $nombreproveedor = $fila['nombre'];
                        $fecha = $fila['fecha'];
                        $yuan = $fila['yuan'];
                        $dolar = $fila['dolar'];
                        $gasto1 = $fila['gastos_importacion1'];
                        $gasto2 = $fila['gastos_importacion2'];
                        $gasto3 = $fila['gastos_importacion3'];
                        $gasto4 = $fila['gastos_importacion4'];
                    ?>
                        <tr>
                            <td><?php echo $idcontenedor; ?></td>
                            <td><?php echo $nombrecontenedor; ?></td>
                            <td><?php echo $nombreproveedor; ?></td>
                            <td><?php echo $fecha; ?></td>
                            <td><?php echo $yuan; ?></td>
                            <td><?php echo $dolar; ?></td>
                            <td><?php echo $gasto1; ?></td>
                            <td><?php echo $gasto2; ?></td>
                            <td><?php echo $gasto3; ?></td>
                            <td><?php echo $gasto4; ?></td>
                            <td class="text-center"><a href="../editar/editar_contenedor.php?id=<?php echo $idcontenedor; ?>" class="btn btn-primary">Editar</a></td>
                            <td class="text-center"><a href="#" class="btn btn-danger" data-id="<?php echo $idcontenedor; ?>">Eliminar</a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="../js/buscador.js"></script>
    <script src="../js/eliminar_contenedor.js"></script>

</body>

</html>