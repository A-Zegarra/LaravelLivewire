<?php
include "../../db/conexion.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $id_categoria = $_POST['categoriaform'];
    $descripcion = $_POST['descripcion'];
    $codigo = $_POST['codigo'];
    $caja = $_POST['caja'];
    $costo = $_POST['costo'];
    $origen = $_POST['origenform'];
    $costomenor = $_POST['costoformMenor'];
    $costomayor = $_POST['costoformMayor'];

    // Verificar si se ha cargado una nueva imagen
    if (!empty($_FILES['imagenform']['tmp_name'])) {
        // Obtener la ruta de la imagen anterior
        $sql = "SELECT imagen FROM producto WHERE idProducto = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $fila = $resultado->fetch_assoc();
        $ruta_imagen_anterior = $fila['imagen'];

        // Directorio donde se almacenarán las imágenes
        $directorio_imagenes = '../../imagenes_productos/';

        // Comprobar si el directorio existe, si no, crearlo
        if (!file_exists($directorio_imagenes)) {
            mkdir($directorio_imagenes, 0755, true);
        }

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

        // Eliminar la imagen anterior
        if (file_exists($ruta_imagen_anterior)) {
            unlink($ruta_imagen_anterior);
        }

        // Actualizar la base de datos
        $sql = "UPDATE producto SET descripcion = UPPER(?), codigo = UPPER(?), costo = ?, imagen = ?, caja = ?, idcategoria = ?, origen = ?,costomenor = ?,costomayor =? WHERE idProducto = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdsiiiddi", $descripcion, $codigo, $costo, $ruta_imagen, $caja, $id_categoria, $origen, $costomenor, $costomayor, $id);
    } else {
        $sql = "UPDATE producto SET descripcion = UPPER(?), codigo = UPPER(?), costo = ?, caja = ?, idcategoria = ?, origen = ?, costomenor = ?,costomayor =? WHERE idProducto = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdiiiddi", $descripcion, $codigo, $costo, $caja, $id_categoria, $origen, $costomenor, $costomayor, $id);
    }
    if ($stmt->execute()) {
        header("Location: ../../listar/listar_producto_costos.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    mysqli_close($conn);
}
