<?php 
// Incluir el archivo de conexión a la base de datos
include "conexion.php";

// Obtener los datos del formulario
$producto = $_POST['producto'];


// Insertar los datos en la base de datos
$sql = "INSERT INTO inventario (idProducto) VALUES ('$producto')";

if ($conn->query($sql) === TRUE) {
    echo "Ingreso registrado exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$conn->close();


?>