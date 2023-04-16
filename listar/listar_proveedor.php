<?php
require_once '../auth.php';
checkUserRole([1]);
?>
<?php
include "../db/conexion.php";
$registros_por_pagina = 10; // Número de registros que deseas mostrar por página
$pagina_actual = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;
$offset = ($pagina_actual - 1) * $registros_por_pagina;
$sql = "SELECT * FROM proveedor LIMIT $registros_por_pagina OFFSET $offset";
$resultado = $conn->query($sql);
$sql_total = "SELECT COUNT(*) as total_registros FROM proveedor";
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
    <title>PROVEEDORES</title>
</head>

<body>
    <?php
    include "../header.php";
    ?>
    <br>
    <div class="container">
        <h1>PROVEEDORES</h1><br>
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <form class='d-flex' action="#" method="dialog">
                    <input class="form-control me-2" type="search" name="busqueda" aria-label="Search" id="busqueda" placeholder="Nombre, documento">
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
                        <th>NOMBRE</th>
                        <th>TELEFONO</th>
                        <th>DIRECCION</th>
                        <th>CORREO</th>
                        <th>DOCUMENTO</th>
                        <th>PAIS</th>
                        <th>CIUDAD</th>
                        <th colspan="2">OPCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($fila = $resultado->fetch_assoc()) {
                        $idproveedor = $fila['idproveedor'];
                        $nombre = $fila['nombre'];
                        $telefono = $fila['telefono'];
                        $direccion = $fila['direccion'];
                        $correo = $fila['email'];
                        $documento = $fila['documento'];
                        $pais = $fila['pais'];
                        $ciudad = $fila['ciudad'];
                    ?>
                        <tr>
                            <td><?php echo $idproveedor; ?></td>
                            <td><?php echo $nombre; ?></td>
                            <td><?php echo $telefono; ?></td>
                            <td><?php echo $direccion; ?></td>
                            <td><?php echo $correo; ?></td>
                            <td><?php echo $documento; ?></td>
                            <td><?php echo $pais; ?></td>
                            <td><?php echo $ciudad; ?></td>

                            <td class="text-center"><a href="../editar/editar_proveedor.php?id=<?php echo $idproveedor; ?>" class="btn btn-primary">Editar</a></td>
                            <td class="text-center"><a href="#" class="btn btn-danger" data-id="<?php echo $idproveedor; ?>">Eliminar</a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="../js/buscador.js"></script>
    <script src="../js/eliminar_proveedor.js"></script>
</body>

</html>