<?php
require_once '../auth.php';
checkUserRole([1]);
?>
<?php
include "../db/conexion.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM producto WHERE idproducto = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: ../listar/listar_producto.php");
        exit();
    } else {
        echo "Error al eliminar el producto";
    }

    mysqli_close($conn);
}
?>
