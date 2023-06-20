<?php
$textoRestriccionEdad = "HOLAAAAAAAAA";
// Obtener el código del producto de la URL
$codigoProducto = $_GET['codigo'];

// Obtener el texto de restricción de edad del producto desde la base de datos utilizando el código
// Aquí deberías utilizar tu lógica para obtener el texto correspondiente

// Mostrar la plantilla de impresión
?>
<!DOCTYPE html>
<html>

<head>
    <title>Plantilla de impresión de rotulados</title>
    <!-- Estilos CSS para la plantilla de impresión -->
    <style>
        /* Estilos personalizados para la plantilla de impresión */
    </style>
</head>

<body>
    <h1>Plantilla de impresión de rotulados</h1>
    <div>
        <h2>Texto de restricción de edad</h2>
        <p id="texto-restriccion"><?php echo $textoRestriccionEdad; ?></p>
    </div>

    <div>
        <h2>Opciones de impresión</h2>
        <form id="form-imprimir" action="imprimir_rotulados.php" method="post">
            <label for="cantidad">Cantidad:</label>
            <input type="number" id="cantidad" name="cantidad" min="1" value="1">
            <br>
            <button type="submit">Imprimir</button>
        </form>
    </div>

    <script>
        // Obtener el texto de restricción de edad desde PHP y almacenarlo en una variable JavaScript
        var textoRestriccion = "<?php echo $textoRestriccionEdad; ?>";

        // Mostrar el texto de restricción en el lugar adecuado
        document.getElementById('texto-restriccion').textContent = textoRestriccion;

        // Manejar el envío del formulario de impresión
        document.getElementById('form-imprimir').addEventListener('submit', (event) => {
            event.preventDefault();

            // Obtener la cantidad ingresada por el usuario
            const cantidad = document.getElementById('cantidad').value;

            // Enviar la cantidad de rotulados y cualquier otra información necesaria al servidor para su procesamiento e impresión
            // Puedes utilizar una petición AJAX aquí para enviar los datos al servidor
        });
    </script>
</body>

</html>
