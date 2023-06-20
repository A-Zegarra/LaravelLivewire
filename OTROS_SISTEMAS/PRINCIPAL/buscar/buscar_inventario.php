<?php
require_once '../auth.php';
checkUserRole([1,2]);
?>
<?php
include "../db/conexion.php";

// Obtener términos de búsqueda desde el formulario
$busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : '';

$registros_por_pagina = 50;
$pagina_actual = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;
$offset = ($pagina_actual - 1) * $registros_por_pagina;
// Ejecutar consulta SQL para buscar productos por descripción o código
$sql = "SELECT 
p.imagen,
p.descripcion,
p.codigo,
p.costomenor,
p.costomayor,
SUM(i.cantidad) AS cantidad_ingreso,
SUM(s.cantidad) AS cantidad_salida,
(SUM(i.cantidad) - SUM(s.cantidad)) AS total_stock
FROM 
producto p
LEFT JOIN 
ingreso i ON p.idproducto = i.idproducto
LEFT JOIN 
salida s ON p.idproducto = s.idproducto
WHERE p.descripcion LIKE '%$busqueda%' OR p.codigo LIKE '%$busqueda%'
GROUP BY 
p.idproducto
LIMIT $registros_por_pagina OFFSET $offset;";

$resultado = $conn->query($sql);

$sql_total = "SELECT COUNT(*) as total_registros FROM producto";
$resultado_total = $conn->query($sql_total);
$fila_total = $resultado_total->fetch_assoc();
$total_registros = $fila_total['total_registros'];
$total_paginas = ceil($total_registros / $registros_por_pagina);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BUSQUEDA PRODUCTOS</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <?php
    include "../header.php";
    ?>
    <br>
    <div class="container">
        <h1>INVENTARIO</h1><br>
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <form class='d-flex' action="buscar_inventario.php" method="get">
                    <input class="form-control me-3" type="search" name="busqueda" aria-label="Search" id="busqueda" placeholder="Descripción o código">
                    <button class="btn btn-outline-success me-3" type="submit" value="Buscar">Buscar</button><br>
                    <a href="../index.php" class="btn btn-outline-danger" >Regresar</a>
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
                        <th>IMAGEN</th>
                        <th>DESCRIPCION</th>
                        <th>CODIGO</th>
                        <!--<th>INGRESO</th>-->
                        <!--<th>SALIDA</th>-->
                        <th>STOCK</th>
                        <th>MINIMO</th>
                        <th>MAYOR</th>
                        <th>MENOR</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($fila = $resultado->fetch_assoc()) {
                        $imagen = $fila['imagen'];
                        $producto = $fila['descripcion'];
                        $codigo = $fila['codigo'];
                        $entrada = $fila['cantidad_ingreso'];
                        $salida = $fila['cantidad_salida'];
                        $stock = $fila['total_stock'];
                        $costomenor = $fila['costomenor'];
                        $costomayor = $fila['costomayor'];
                    ?>
                        <tr>
                            <td><img width="100" src="<?php echo $imagen ?>"></td>
                            <td><?php echo $producto; ?></td>
                            <td><?php echo $codigo; ?></td>
                            <!--<td><?php echo $entrada; ?></td>-->
                            <!--<td><?php echo $salida; ?></td>-->
                            <td><?php echo $stock ?></td>
                            <td></td>
                            <td><?php echo $costomayor?></td>
                            <td><?php echo $costomenor?></td>

                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="../js/buscador.js"></script>
</body>

</html>