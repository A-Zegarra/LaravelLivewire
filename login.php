<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    include "db/conexion.php";

    $sql = "SELECT * FROM usuario WHERE usuario = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verificar la contraseña
        if ($contrasena == $user['contraseña']) {
            $_SESSION['user_id'] = $user['idusuario'];
            $_SESSION['user_role'] = $user['idrol'];
            $_SESSION['user_name'] = $user['nombre']; // Agrega esta línea para almacenar el nombre del usuario en la sesión

            header('Location: index.php');
            exit;
        } else {
            echo "<div class='alert alert-danger'>Contraseña incorrecta</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>El usuario no existe</div>";
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body, html {
            height: 100%;
            margin: 0;
        }
        .bg {
            background-image: url('https://wallpaperset.com/w/full/4/1/9/201520.jpg');
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
    <title>Login</title>
</head>

<body>
    <div class="bg">
        <div class="container h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="text-center">Iniciar sesión</h1>
                            <form action="login.php" method="post">
                                <div class="mb-3">
                                    <label for="usuario" class="form-label">Usuario</label>
                                    <input type="text" class="form-control" name="usuario" id="usuario" required>
                                </div>
                                <div class="mb-3">
                                    <label for="contrasena" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" name="contrasena" id="contrasena" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBudKczMXN5omwDIOi5GXYk/sU+fn/4zWkB4jVI4JG2NWIw/" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-GLhlTQ8iVG93xB1tB0F8Gd/inupl7A3g1ud3PAzKV0AKxW3tKdzA9P6g6y6XC8Wb" crossorigin="anonymous"></script>
</body>

</html>
