<?php
include "../../db/conexion.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombreform'];
    $descripcion = $_POST['decripcionform'];



    $sql = "UPDATE categoria SET nombre = UPPER(?), descripcion = UPPER(?) WHERE idcategoria = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $nombre, $descripcion, $id);

    if ($stmt->execute()) {
        header("Location: ../../listar/listar_categoria.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    mysqli_close($conn);
}
