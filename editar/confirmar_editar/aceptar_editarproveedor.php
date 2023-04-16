<?php
include "../../db/conexion.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $tel = $_POST['tel'];
    $direccion = $_POST['direccion'];
    $email = $_POST['email'];
    $documento = $_POST['documento'];
    $pais = $_POST['pais'];
    $ciudad = $_POST['ciudad'];

    $sql = "UPDATE proveedor SET nombre = UPPER(?), telefono = ?, direccion = ?, email = ?, documento = ?, pais = ?, ciudad = ? WHERE idproveedor = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sisssssi", $nombre, $tel, $direccion, $email, $documento, $pais, $ciudad, $id);

    if ($stmt->execute()) {
        header("Location: ../../listar/listar_proveedor.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    mysqli_close($conn);
}
?>
