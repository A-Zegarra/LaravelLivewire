<?php
require_once '../auth.php';
checkUserRole([1]);
?>
<?php
include "../db/conexion.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM proveedor WHERE idproveedor = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Proveedor eliminado";
        header("Location: ../listar/listar_proveedor.php");
        exit();
    } else {
        echo "Error al eliminar el proveedor";
    }
    mysqli_close($conn);
}
?>
