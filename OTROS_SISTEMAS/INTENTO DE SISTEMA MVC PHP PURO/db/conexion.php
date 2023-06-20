<?php

$hostname = "localhost";
$user = "root";
$password = "1234";
$db  = "laravel";
$port = "3306";


$conn = new mysqli($hostname, $user, $password, $db, $port);
if ($conn->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
}
echo $conn->host_info . "\n";
