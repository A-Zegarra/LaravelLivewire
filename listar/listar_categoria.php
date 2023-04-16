<?php
require_once '../auth.php';
checkUserRole([1]);
?>
<?php
include "../db/conexion.php";
$registros_por_pagina = 50; // Número de registros que deseas mostrar por página
$pagina_actual = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;
$offset = ($pagina_actual - 1) * $registros_por_pagina;
$sql = "SELECT * FROM categoria LIMIT $registros_por_pagina OFFSET $offset";
$resultado = $conn->query($sql);
$sql_total = "SELECT COUNT(*) as total_registros FROM categoria";
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
    <title>CATEGORIAS</title>
</head>

<body>
    <?php
    include "../header.php";
    ?>
    <br>
    <div class="container">
        <h1>CATEGORIAS</h1><br>
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <form class='d-flex' action="#" method="dialog">
                    <input class="form-control me-2" type="search" name="busqueda" aria-label="Search" id="busqueda" placeholder="Buscar por nombre">
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
                        <th>DESCRIPCION</th>

                        <th colspan="2">OPCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($fila = $resultado->fetch_assoc()) {
                        $id_categoria = $fila['idcategoria'];
                        $nombre = $fila['nombre'];
                        $descripcion = $fila['descripcion'];
                    ?>
                        <tr>
                            <td><?php echo $id_categoria; ?></td>
                            <td><?php echo $nombre; ?></td>
                            <td><?php echo $descripcion; ?></td>
                            <td class="text-center"><a href="../editar/editar_categoria.php?id=<?php echo $id_categoria; ?>" class="btn btn-primary">Editar</a></td>
                            <td class="text-center"><a href="#" class="btn btn-danger" data-id="<?php echo $id_categoria; ?>">Eliminar</a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="../js/buscador.js"></script>
    <script src="../js/eliminar_categoria.js"></script>

</body>

</html>