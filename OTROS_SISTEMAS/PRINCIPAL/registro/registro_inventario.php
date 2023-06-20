<?php
require_once '../auth.php';
checkUserRole([1]);
?>
<?php
include "conexion.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRO INVENTARIO</title>
</head>

<body>

    <?php
    include "header.php";
    ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1>REGISTRO DE INVENTARIO</h1><br>
                <form action="procesar_reginventario.php" method="post">
                    <div class="form-group">
                        <label for="">PRODUCTO:</label>
                        <?php
                        $sql = "select * from producto order by descripcion asc";
                        $resultado = $conn->query($sql);
                        ?>
                        <select name="producto" class="form-control">
                            <?php
                            while ($fila = $resultado->fetch_assoc()) {
                                $idProducto  = $fila['idProducto'];
                                $descripcion = $fila['descripcion'];
                                $codigo = $fila['codigo']; ?>

                                <option value="<?php echo $idProducto; ?>"><?php echo $descripcion, " | ", $codigo; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div><br>
                    <div class="text-center mb-3">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


</body>

</html>