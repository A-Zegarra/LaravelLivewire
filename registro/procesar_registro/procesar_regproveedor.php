<?php
session_start();

include "../../db/conexion.php";

$nombre = $_POST["nombre"];
$telefono = $_POST["tel"];
$direccion = $_POST["direccion"];
$email = $_POST["email"];
$documento = $_POST["documento"];
$pais = $_POST["pais"];
$ciudad = $_POST["ciudad"];

var_dump($pais);

$sql = "INSERT INTO proveedor (nombre, telefono, direccion, email, documento, pais, ciudad) 
VALUES (UPPER(?), ?, UPPER(?), UPPER(?), ?, UPPER(?), UPPER(?))";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sisssss", $nombre, $telefono, $direccion, $email, $documento, $pais, $ciudad);

$resultado = $stmt->execute();

if ($resultado) {
    $_SESSION['success_message'] = 'El proveedor se ha registrado correctamente.';
    header("Location: ../registro_proveedor.php");
    exit();
} else {
    echo "Error: Código duplicado" . $stmt->error;
}

$stmt->close();
mysqli_close($conn);
