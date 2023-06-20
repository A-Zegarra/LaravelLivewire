<?php
require_once '../auth.php';
checkUserRole([1]);
?>
<?php
include "../db/conexion.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM contenedor WHERE idcontenedor = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: listar_contenedor.php");
        exit();
    } else {
        echo "Error al eliminar el contenedor";
    }

    mysqli_close($conn);
}
?>
