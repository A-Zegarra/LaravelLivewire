<?php
require_once '../auth.php';
checkUserRole([1]);
?>
<?php include "../db/conexion.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRO INGRESO</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <style>
        .select2-results__option img {
            max-width: 30px;
            margin-right: 20px;
        }
    </style>
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
                <h1>REGISTRO DE INGRESOS</h1><br>
                <form action="procesar_registro/procesar_regingreso.php" method="post">
                    <div class="form-group">
                        <label for="">PRODUCTO:</label>
                        <?php
                        $sql = "select * from producto order by descripcion asc";
                        $resultado = $conn->query($sql);
                        ?>
                        <select id="producto-select" name="productoform" class="form-control">
                            <?php
                            while ($fila = $resultado->fetch_assoc()) {
                                $idProducto  = $fila['idproducto'];
                                $imagen = $fila['imagen'];
                                $descripcion = $fila['descripcion'];
                                $codigo = $fila['codigo'];
                                $imagenicono = " <img src = '$imagen;' />"
                            ?>
                                <option value="<?php echo $idProducto; ?>" data-imagen="<?php echo $imagen; ?>"><?php echo $descripcion, " | ", $codigo; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div><br>
                    <div class="form-group">
                        <label for="">CANTIDAD:</label>
                        <input name="cantidad" type="number" class="form-control" placeholder="000">
                    </div><br>

                    <div class="form-group">
                        <label for="">FECHA:</label>
                        <input name="fecha" type="date" class="form-control">
                    </div><br>
                    <div class="text-center mb-3">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const productoSelect = document.getElementById('producto-select');
            if (productoSelect) {
                $(productoSelect).select2();
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const productoSelect = document.getElementById('producto-select');
            if (productoSelect) {
                $(productoSelect).select2({
                    templateResult: function(producto) {
                        if (producto.loading) {
                            return producto.text;
                        }

                        var img = $('<img src="' + producto.element.dataset.imagen + '" alt="' + producto.text + '" />');
                        var markup = $('<span></span>').append(img).append(producto.text);

                        return markup;
                    },
                    escapeMarkup: function(markup) {
                        return markup;
                    }
                });
            }
        });
    </script>
     <script src="../js/temporizador_registro.js"></script>
</body>

</html>