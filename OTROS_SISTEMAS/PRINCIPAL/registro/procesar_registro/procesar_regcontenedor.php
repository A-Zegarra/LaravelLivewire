<?php 
session_start();

include "../../db/conexion.php";
$nombrecontenedor = $_POST["nombreform"];
$idproveedor = $_POST["proveedorform"];
$fecha = $_POST["fechaform"];
$dolar = $_POST["dolarform"];
$yuan = $_POST["yuanform"];
$gasto1 = empty($_POST["gasto1form"]) ? 0 : $_POST["gasto1form"];
$gasto2 = empty($_POST["gasto2form"]) ? 0 : $_POST["gasto2form"];
$gasto3 = empty($_POST["gasto3form"]) ? 0 : $_POST["gasto3form"];
$gasto4 = empty($_POST["gasto4form"]) ? 0 : $_POST["gasto4form"];

$sql = "INSERT INTO contenedor (nombre_contenedor, idproveedor, fecha, dolar, yuan, gastos_importacion1, gastos_importacion2, gastos_importacion3, gastos_importacion4) 
VALUES ('$nombrecontenedor','$idproveedor', '$fecha', '$dolar', '$yuan', '$gasto1', '$gasto2', '$gasto3', '$gasto4')";

$resultado = mysqli_query($conn, $sql);

if ($resultado) {
  $_SESSION['success_message'] = 'El contenedor se ha registrado correctamente.';
  header("Location: ../registro_contenedor.php");
  exit();
  } else {
    echo "Error al registrar";
  }
  
  mysqli_close($conn);
?>
