<?php
require_once '../auth.php';
checkUserRole([1]);
?>
<?php
include "../db/conexion.php";

// Verificar si se ha pasado un ID a través de la URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta para obtener los detalles del producto
    $sql = "SELECT * FROM salida WHERE idsalida = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $fila = $resultado->fetch_assoc();
} else {
    // Redirigir a la página principal si no se pasa un ID válido
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR INGRESO</title>
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
    ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center">EDITAR INGRESO</h1>
                <form action="confirmar_editar/aceptar_editarsalida.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="form-group">
                        <label for="">PRODUCTO:</label>
                        <?php
                        $sql = "select * from producto order by descripcion asc";
                        $resultado = $conn->query($sql);
                        ?>
                        <select id="producto-select" name="productoform" class="form-control">
                            <?php
                            while ($filas = $resultado->fetch_assoc()) {
                                $idProducto  = $filas['idproducto'];
                                $imagen = $filas['imagen'];
                                $descripcion = $filas['descripcion'];
                                $codigo = $filas['codigo'];
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
                        <input name="cantidadform" type="text" class="form-control" placeholder="Descripción de la categoría" value="<?php echo $fila['cantidad']; ?>">
                    </div><br>
                    <div class="form-group">
                        <label for="">FECHA:</label>
                        <input name="fechaform" type="date" class="form-control" placeholder="Descripción de la categoría" value="<?php echo $fila['fecha']; ?>">
                    </div><br>
                    <div class="text-center mb-3">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
</body>

</html>