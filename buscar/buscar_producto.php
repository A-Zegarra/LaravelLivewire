<?php
require_once '../auth.php';
checkUserRole([1]);
?>
<?php
include "../db/conexion.php";

// Obtener términos de búsqueda desde el formulario
$busqueda = $_POST["busqueda"];

// Ejecutar consulta SQL para buscar productos por descripción o código
$sql = "SELECT * FROM producto WHERE descripcion LIKE '%" . $busqueda . "%' OR codigo LIKE '%" . $busqueda . "%'";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BUSQUEDA PRODUCTOS</title>
</head>

<body>
    <?php
    include "../header.php";
    ?>
    <br>
    <div class="container">
        <h1>BUSCADOR DE PRODUCTOS</h1><br>
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid ">
                <form class='d-flex' action="buscar_producto.php" method="post">
                    <input class="form-control me-2" type="search" name="busqueda" aria-label="Search" id="busqueda" placeholder="Descripción o código">
                    <button class="btn btn-outline-success me-2" type="submit" value="Buscar">Buscar</button><br>
                    <a href="../listar/listar_producto.php" class="btn btn-outline-danger" >Regresar</a>
</form>
            </div>
        </nav>
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
                        $minimo = round($costo * 2 * $dolar);
                        $mayor = $minimo + 4;
                        $menor = $minimo + 10;
                    ?>
                        <tr>
                            <td><?php echo $id_producto; ?></td>
                            <td><img width="100" src="<?php echo $imagen; ?>"></td>
                            <td><?php echo $descripcion; ?></td>
                            <td><?php echo $codigo; ?></td>
                            <td><?php echo $caja; ?></td>
                            <td>
                                <?php
                                if($origen == "importado"){
                                    echo "$ " ,$costo;
                                }
                                else{
                                    echo "s/ " ,$costo;
                                }
                                ?>
                            </td>
                            <td  style="background-color: #F5B7B1;"><?php echo $minimo; ?></td>
                            <td style="background-color: #F5CBA7;"><?php echo $mayor; ?></td>
                            <td style="background-color: #ABEBC6;"><?php echo $menor; ?></td>
                            <td class="text-center"><a href="../editar/editar_producto.php?id=<?php echo $id_producto; ?>" class="btn btn-primary">Editar</a></td>
                            <td class="text-center"><a href="#" class="btn btn-danger" data-id="<?php echo $id_producto; ?>">Eliminar</a></td>
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

</body>

</html>