<?php
include "../../db/conexion.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombreform'];
    $idproveedor = $_POST['categoriaform']; //int
    $fecha = $_POST['fechaform']; //date
    $dolar = $_POST['dolarform']; //decimal
    $yuan = $_POST['yuanform']; //decimal
    $gasto1 = $_POST['gasto1form']; //decimal
    $gasto2 = $_POST['gasto2form']; //decimal
    $gasto3 = $_POST['gasto3form']; //decimal
    $gasto4 = $_POST['gasto4form']; //decimal

    $sql = "UPDATE contenedor SET nombre_contenedor = ?, idproveedor = ?, fecha = ?, dolar = ?, yuan = ?, gastos_importacion1 = ?, gastos_importacion2 = ?, gastos_importacion3 = ?, gastos_importacion4 = ? WHERE idcontenedor = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sisddddddi", $nombre ,$idproveedor, $fecha, $dolar, $yuan, $gasto1, $gasto2, $gasto3, $gasto4, $id);

    if ($stmt->execute()) {
        header("Location: ../../listar/listar_contenedor.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    mysqli_close($conn);
}
