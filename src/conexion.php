<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$host = 'db';
$user = 'root';
$pass = 'rootpassword';
$db   = 'ripperdoc';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");
?>