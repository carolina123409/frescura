<?php

$conexion = new mysqli("localhost", "root", "", "mi_empresa");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$mensaje = $_POST['mensaje'];


$nombre = $conexion->real_escape_string($nombre);
$email = $conexion->real_escape_string($email);
$mensaje = $conexion->real_escape_string($mensaje);


$sql = "INSERT INTO contactos (nombre, email, mensaje) 
        VALUES ('$nombre', '$email', '$mensaje')";

if ($conexion->query($sql) === TRUE) {
    echo "Mensaje enviado con éxito.";
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

$conexion->close();
?>