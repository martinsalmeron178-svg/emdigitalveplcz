<?php
$host = "localhost";
$user = "root";    // Tu usuario de MySQL en XAMPP
$password = "";    // Contraseña (por defecto en XAMPP va vacía)[cite: 1]
$dbname = "emdigitalveanz_db";

$conn = @new mysqli($host, $user, $password, $dbname);

// Si falla la conexión en Render, no matamos la página con "die", solo dejamos pasar
if ($conn->connect_error) {
    $conn = null; 
} else {
    $conn->set_charset("utf8mb4");
}
?>