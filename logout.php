<?php
session_start();

// Destruir la sesión y eliminar todos los datos de la sesión
session_unset();
session_destroy();

// Redirigir al usuario a la página de inicio de sesión
header('Location: login.php');
exit;
?>
