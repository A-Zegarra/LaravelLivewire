<?php
require_once '../auth.php';
checkUserRole([1]);
?>
<?php
include "../db/conexion.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM ingreso WHERE idingreso = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Categoría eliminada";
        header("Location: ../listar/listar_ingreso.php");
        exit();
    } else {
        echo "Error al eliminar el ingreso";
    }
    mysqli_close($conn);
}
?>
