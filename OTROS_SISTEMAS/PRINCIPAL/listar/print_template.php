<?php
include "../db/conexion.php";

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title> </title>
    <style>
        /* Estilos CSS para el formato del rotulado */
        /* Ajusta los estilos según tus necesidades */
        .rotulado {
            width: 4cm;
            height: 2.5cm;
            border: 1px solid black;
            padding: 1px;
            position: relative;
        }

        .rotulado-image {
            position: absolute;
            bottom: 15px;
            right: 5px;
            width: 1cm;
            height: 1cm;
            opacity: 0.5;
        }

        .texto {
            font-size: 5%;
        }
    </style>
</head>

<body>
    <?php
    // Obtén el código y la cantidad de rotulados enviados por la página de lista de productos
    $codigo = $_GET['codigo'];
    $cantidad = isset($_GET['cantidad']) ? intval($_GET['cantidad']) : 1;

    // Realiza una consulta a la base de datos para obtener la información del producto
    // y el texto de restricción de edad asociado al código
    $query = "SELECT * FROM producto WHERE codigo = '$codigo'";
    $result = mysqli_query($conn, $query);
    $producto = mysqli_fetch_assoc($result);

    ?>

    <?php
    // Repite la impresión del rotulado según la cantidad especificada
    for ($i = 0; $i < $cantidad; $i++) {
    ?>
        <!-- Muestra el rotulado con el texto de restricción de edad -->
        <div class="rotulado">
            <p class="texto"><strong>Nombre de Producto : </strong> Muñeca </p>
            <p class="texto"><strong>Razón Social : </strong> Importaciones ZEGARRA HNOS SAC </p>
            <p class="texto"><strong>RUC : </strong> 12345678900 </p>
            <p class="texto"><strong>Dirección : </strong> Calle Los Colores N°350 GALERÍA “MUNDO COLORES” </p>
            <p class="texto"><strong>Hecho en : </strong> Perú </p>
            <p class="texto"><strong>Registro Nacional : </strong> N°152-2018-JUE-DIGESA </p>
            <p class="texto"><strong>Autorización Sanitaria : </strong> R.D. N°152-2018/DCEA/DIGESA/SA </p>
            <p class="texto"><strong>Recomendaciones y Advertencias</strong></p>
            <li class="texto">Manténgase alejado del fuego.</li>
            <li class="texto">Evitar el contacto con la boca.</li>
            <li class="texto">En caso de ingestión, acudir al centro médico mas cercano.</li>
            <img class="rotulado-image" src="../imagenes_productos/rotulado.png" alt="Imagen de rotulado">
        </div>
    <?php
    }
    ?>
    <script>
        window.onload = function() {
            // Imprime la página actual
            window.print();

            // Cierra la ventana después de 1 segundo
            setTimeout(function() {
                window.close();
            }, 1000);
        };
    </script>
</body>

</html>