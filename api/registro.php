<?php
header('Content-Type: application/json');
require_once '../clases/Conexion.php';

$conexion = (new Conexion())->conectar();

$nombres = $_POST['nombres'] ?? '';
$apellidos = $_POST['apellidos'] ?? '';
$dni = $_POST['dni'] ?? '';
$password = $_POST['password'] ?? '';
$rol = 'padre'; // Forzado automáticamente

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO t_usuarios (nombres, apellidos, dni, password, rol) VALUES (?, ?, ?, ?, ?)";
$query = $conexion->prepare($sql);
$query->bind_param('sssss', $nombres, $apellidos, $dni, $hashedPassword, $rol);

if ($query->execute()) {
    echo json_encode(["success" => true, "message" => "Registro exitoso"]);
} else {
    echo json_encode(["success" => false, "message" => "Error al registrar. Verifica si el DNI ya existe."]);
}
?>