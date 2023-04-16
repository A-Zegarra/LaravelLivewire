<?php
include "../../db/conexion.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $producto = $_POST['productoform'];
    $cantidad = $_POST['cantidadform'];
    $fecha = $_POST['fechaform'];

    // Actualizar la consulta para reflejar los cambios en las columnas y las variables
    $sql = "UPDATE ingreso SET idproducto = ?, cantidad = ?, fecha = ? WHERE idingreso = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iisi", $producto, $cantidad, $fecha, $id);

    if ($stmt->execute()) {
        header("Location: ../../listar/listar_ingreso.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    mysqli_close($conn);
}
?>
