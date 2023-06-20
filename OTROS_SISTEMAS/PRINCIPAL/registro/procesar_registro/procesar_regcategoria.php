<?php
session_start();

include "../../db/conexion.php";

$nombre = $_POST["nombreform"];
$descripcion = $_POST["decripcionform"];

$sql = "INSERT INTO categoria (nombre, descripcion) 
VALUES (UPPER('$nombre'), UPPER('$descripcion'))";

$resultado = mysqli_query($conn, $sql);

if ($resultado) {
    $_SESSION['success_message'] = 'La categoría se ha registrado correctamente.';
    header("Location: ../registro_categoria.php");
    exit();
} else {
    echo "Error: Código duplicado" . $stmt->error;
}

mysqli_close($conn);
