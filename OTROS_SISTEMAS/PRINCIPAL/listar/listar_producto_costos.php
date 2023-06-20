<?php
require_once '../auth.php';
checkUserRole([1, 2]);
?>
<?php
include "../db/conexion.php";
$registros_por_pagina = 50; // Número de registros que deseas mostrar por página
$pagina_actual = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;
$offset = ($pagina_actual - 1) * $registros_por_pagina;

$sql = "SELECT * FROM producto LIMIT $registros_por_pagina OFFSET $offset";
$resultado = $conn->query($sql);

$sql_total = "SELECT COUNT(*) as total_registros FROM producto";
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
    <title>PRODUCTOS</title>
</head>

<body>
    <?php
    include "../header.php";
    ?>
    <br>
    <div class="container">
        <h1>PRODUCTOS</h1><br>
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <form class='d-flex' action="../buscar/buscar_producto_costos.php" method="post">
                    <input class="form-control me-2" type="search" name="busqueda" aria-label="Search" id="busqueda" placeholder="Descripción o código">
                    <button class="btn btn-outline-success" type="submit" value="Buscar">Buscar</button>
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
        <div class="container mt-3">
            <label for="precio-dolar">Precio del dólar:</label>
            <input id="precio-dolar" type="number" step="0.01" value="3.85">
        </div><br>
    </div>
    <div class="container">
        <div class="table-responsive">
            <div class="tabla-listas">
                <table id="tabla-listas" class="table table-bordered table-striped mx-auto">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>IMAGEN</th>
                            <th>DESCRIPCION</th>
                            <th>CODIGO</th>
                            <th>CAJA</th>
                            <th>COSTO</th>
                            <th>MINIMO</th>
                            <th>MAYOR</th>
                            <th>MENOR</th>
                            <th colspan="2">OPCIONES</th>
                            <th>IMPRIMIR</th> <!-- Nuevo encabezado para el botón "Imprimir" -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($fila = $resultado->fetch_assoc()) {
                            $id_producto = $fila['idproducto'];
                            $id_categoria = $fila['idcategoria'];
                            $descripcion = $fila['descripcion'];
                            $codigo = $fila['codigo'];
                            $origen = $fila['origen'];
                            $costo = $fila['costo'];
                            $caja = $fila['caja'];
                            $imagen = $fila['imagen'];
                            $dolar = 3.85;
                            $minimo = round(($costo * 2) * $dolar);
                            $mayor = round($fila['costomayor']);
                            $menor = round($fila['costomenor']);
                        ?>
                            <tr>
                                <td><?php echo $id_producto; ?></td>
                                <td><img width="100" src="<?php echo $imagen; ?>"></td>
                                <td><?php echo $descripcion; ?></td>
                                <td><?php echo $codigo; ?></td>
                                <td><?php echo $caja; ?></td>
                                <td>
                                    <?php
                                    if ($origen == "importado") {
                                        echo "$ ", $costo;
                                    } else {
                                        echo "s/ ", $costo;
                                    }
                                    ?>
                                </td>
                                <td class="precio-minimo" data-costo="<?php echo $costo; ?>" style="background-color: #F5B7B1;"><?php echo $minimo; ?></td>
                                <td style="background-color: #F5CBA7;"><?php echo $mayor; ?></td>
                                <td style="background-color: #ABEBC6;"><?php echo $menor; ?></td>
                                <td class="text-center"><a href="../editar/editar_producto_costos.php?id=<?php echo $id_producto; ?>" class="btn btn-primary">Editar</a></td>
                                <td class="text-center"><a href="#" class="btn btn-danger" data-id="<?php echo $id_producto; ?>">Eliminar</a></td>
                                <td>
                                    <button class="btn btn-primary imprimir-rotulado" data-codigo="<?php echo $codigo; ?>">Imprimir Rotulado</button>
                                    <input type="number" min="1" max="100" value="1" class="cantidad-rotulados">
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="../js/buscador.js"></script>

    <script src="../js/eliminar_producto.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const precioDolarInput = document.getElementById('precio-dolar');
            const preciosMinimo = document.querySelectorAll('.precio-minimo');

            precioDolarInput.addEventListener('input', () => {
                const dolar = parseFloat(precioDolarInput.value);

                preciosMinimo.forEach((element, index) => {
                    const costo = parseFloat(element.dataset.costo);
                    element.textContent = Math.round((costo * 2) * dolar);
                });

            });


        });
    </script>
    <script>
        // Agrega un evento de clic a todos los botones "Imprimir Rotulado"
        const imprimirRotuladoButtons = document.querySelectorAll('.imprimir-rotulado');
        imprimirRotuladoButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Obtiene el código del producto asociado al botón clicado
                const codigo = button.dataset.codigo;

                // Obtiene la cantidad de rotulados ingresada
                const cantidadInput = button.parentElement.querySelector('.cantidad-rotulados');
                const cantidad = parseInt(cantidadInput.value);

                // Abre la ventana de plantilla de impresión con el código y la cantidad como parámetros en la URL
                const url = `print_template.php?codigo=${codigo}&cantidad=${cantidad}`;
                window.open(url, '_blank');
            });
        });
    </script>

</body>

</html>