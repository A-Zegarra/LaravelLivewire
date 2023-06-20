<?php
require_once '../auth.php';
checkUserRole([1]);
?>
<?php
include "../db/conexion.php";


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRO PRODUCTOS</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
                <h1 class="text-center">REGISTRO DE PRODUCTOS</h1><br>
                <form action="procesar_registro/procesar_regproducto.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input name="descripcionform" type="text" class="form-control" placeholder="Descripcion de producto" required>
                    </div><br>
                    <div class="form-group">
                        <input name="codigoform" type="text" class="form-control" placeholder="Código del producto" required>
                    </div><br>
                    <div class="form-group">
                        <input name="cajaform" type="number" class="form-control" placeholder="Cantidad de unidades por caja">
                    </div><br>
                    <div class="form-group">
                        <input name="costoform" type="number" class="form-control" step="0.01" placeholder="Costo (USD si es importado, PEN si es nacional)" required>
                    </div><br>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <input name="costoformMayor" type="number" class="form-control" step="0.01" placeholder="Costo Mayor" >
                        </div>
                        <div class="col-sm-6">
                            <input name="costoformMenor" type="number" class="form-control" step="0.01" placeholder="Costo Menor" >
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="categoria">Categoria: </label>
                        <?php
                        $sql = "select * from categoria order by nombre asc";
                        $resultado = $conn->query($sql);
                        ?>
                        <select id="categoria-select" name="categoriaform" class="form-control">
                            <?php
                            while ($fila = $resultado->fetch_assoc()) {
                                $idcategoria  = $fila['idcategoria'];
                                $nombrecategoria  = $fila['nombre'];
                            ?>
                                <option value="<?php echo $idcategoria; ?>"><?php echo $nombrecategoria; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div><br>
                    <div class="form-group">
                        <label>Origen:</label><br>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="origenform" id="importado" value="1" checked>
                            <label class="form-check-label" for="importado">importado</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="origenform" id="nacional" value="2">
                            <label class="form-check-label" for="nacional">nacional</label>
                        </div>
                    </div><br>
                    <div class="form-group">
                        <input name="imagenform" type="file" class="form-control">
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
            const categorySelect = document.getElementById('categoria-select');
            if (categorySelect) {
                $(categorySelect).select2();
            }
        });
    </script>
    <script src="../js/temporizador_registro.js"></script>
</body>

</html>