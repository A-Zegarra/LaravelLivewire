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
    $sql = "SELECT * FROM producto WHERE idproducto = ?";
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
    <title>Editar Producto</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body>
    <?php
    include "../header.php";
    ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1>EDITAR PRODUCTO</h1>
                <form action="confirmar_editar/aceptar_editarproducto.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="form-group">
                        <label for="descripcion">Descripcion:</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $fila['descripcion']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Codigo:</label>
                        <input type="text" class="form-control" id="codigo" name="codigo" value="<?php echo $fila['codigo']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Cantidad caja:</label>
                        <input type="text" class="form-control" id="caja" name="caja" value="<?php echo $fila['caja']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Costo:</label>
                        <input type="text" class="form-control" id="costo" name="costo" value="<?php echo $fila['costo']; ?>" required>
                    </div><br>
                    
                    <div class="form-group">
                        <label for="categoria">Categoria: </label>

                        <select id="categoria-select" name="categoriaform" class="form-control">
                            <?php
                            $sql = "select * from categoria order by nombre asc";
                            $resultado = $conn->query($sql);
                            $categoria_actual = $fila['idcategoria'];
                            while ($fila_categoria = $resultado->fetch_assoc()) {
                                $idcategoria  = $fila_categoria['idcategoria'];
                                $nombrecategoria  = $fila_categoria['nombre'];
                            ?>
                                <option value="<?php echo $idcategoria; ?>" <?php echo ($idcategoria == $categoria_actual) ? "selected" : ""; ?>><?php echo $nombrecategoria; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div><br>
                    <div class="form-group row">
                        <label>Origen:</label><br>
                        <div class="form-group col-sm-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="origenform" id="importado" value="1" <?php echo ($fila['origen'] == "importado") ? "checked" : ""; ?>>
                                <label class="form-check-label" for="importado">importado</label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="origenform" id="nacional" value="2" <?php echo ($fila['origen'] == "nacional") ? "checked" : ""; ?>>
                                <label class="form-check-label" for="nacional">nacional</label>
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Imagen actual:</label>
                            <img width="100" src="<?php echo $fila['imagen']; ?>">
                        </div><br>
                    </div><br>
                    <div class="form-group">
                        <label for="imagen">Imagen:</label>

                        <input name="imagenform" type="file" class="form-control">
                    </div><br>

                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="../listar/listar_producto.php"><button type="button" class="btn btn-danger">Cancelar</button></a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>