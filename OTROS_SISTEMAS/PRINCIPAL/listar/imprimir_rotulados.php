<?php
// Obtener la cantidad de rotulados enviada desde la página de impresión
$cantidadRotulados = $_POST['cantidad'];

// Realizar cualquier acción necesaria para enviar los datos de impresión a la impresora

// Redireccionar al usuario a la página de lista de productos u otra página relevante después de la impresión
header('Location: listar_productos.php');
exit();
