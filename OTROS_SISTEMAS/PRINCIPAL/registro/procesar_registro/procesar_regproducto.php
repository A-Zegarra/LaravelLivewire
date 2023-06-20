<?php
session_start();

include "../../db/conexion.php";

$categoria = $_POST["categoriaform"];
$descripcion = $_POST["descripcionform"];
$codigo = $_POST["codigoform"];
$caja = $_POST["cajaform"];
$costo = $_POST["costoform"];
$origen = $_POST["origenform"];
$costomenor = $_POST["costoformMenor"];
$costomayor = $_POST["costoformMayor"];

// Directorio donde se almacenarán las imágenes
$directorio_imagenes = '../../imagenes_productos/';

// Comprobar si el directorio existe, si no, crearlo
if (!file_exists($directorio_imagenes)) {
    mkdir($directorio_imagenes, 0755, true);
}

// Verificar si se ha seleccionado una imagen
if (!empty($_FILES['imagenform']['tmp_name'])) {
    // Obtener el archivo de imagen y su extensión
    $nombre_imagen = $_FILES['imagenform']['name'];
    $extension_imagen = pathinfo($nombre_imagen, PATHINFO_EXTENSION);

    // Crear un nombre único para la imagen
    $nombre_imagen_unico = $codigo . '_' . time() . '.' . $extension_imagen;

    // Ruta completa de la imagen
    $ruta_imagen = $directorio_imagenes . $nombre_imagen_unico;

    // Mover la imagen al directorio
    if (!move_uploaded_file($_FILES['imagenform']['tmp_name'], $ruta_imagen)) {
        echo "Error al subir la imagen.";
        exit();
    }
} else {
    // Asignar la ruta de la imagen predeterminada si no se ha seleccionado ninguna imagen
    $ruta_imagen = $directorio_imagenes . 'sinimagen.jpg';
}

$sql = "INSERT INTO producto (idcategoria, descripcion, codigo, caja, costo, origen, imagen,costomenor,costomayor)
 VALUES ($categoria, UPPER('$descripcion'), UPPER('$codigo'), '$caja', '$costo', '$origen', '$ruta_imagen','$costomenor','$costomayor')";

$resultado = mysqli_query($conn, $sql);

if ($resultado) {
    $_SESSION['success_message'] = 'El producto se ha registrado correctamente.';
    header("Location: ../registro_producto.php");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

mysqli_close($conn);
