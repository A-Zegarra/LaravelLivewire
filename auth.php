<?php
session_start();

function checkUserRole($allowedRoles) {
    // Verificar si el usuario ha iniciado sesión
    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }

    // Verificar el rol del usuario
    if (!in_array($_SESSION['user_role'], $allowedRoles)) {
        // Redirige al usuario a la página denegado.php
        header('Location: ../denegado.php');
        exit;
    }
}
?>
