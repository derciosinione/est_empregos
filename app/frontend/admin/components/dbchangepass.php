<?php
$servername = "localhost";
$username = "username"; // Tu nombre de usuario de la base de datos
$password = "password"; // Tu contraseña de la base de datos
$dbname = "myDB"; // El nombre de tu base de datos

// Crea la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
