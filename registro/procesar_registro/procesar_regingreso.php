<?php
session_start();
// Incluir el archivo de conexión a la base de datos
include "../../db/conexion.php";

// Obtener los datos del formulario
$producto_codigo = $_POST['productoform'];
$cantidad = $_POST['cantidad'];
$fecha = $_POST['fecha'];

// Insertar los datos en la base de datos
$sql = "INSERT INTO ingreso (idproducto, cantidad, fecha) VALUES ('$producto_codigo', '$cantidad', '$fecha')";
$resultado = mysqli_query($conn, $sql);



if ($resultado) {
    $_SESSION['success_message'] = 'El ingreso se ha registrado correctamente.';
    header("Location: ../registro_ingreso.php");
    exit();
    } else {
      echo "Error al registrar";
    }
    
    mysqli_close($conn);
  ?>
  