<?php
header('Content-Type: application/json');
require_once '../clases/Conexion.php'; // Ajusta la ruta si es necesario

$conexion = (new Conexion())->conectar();

$dni = $_POST['dni'] ?? '';
$password = $_POST['password'] ?? '';

$sql = "SELECT * FROM t_usuarios WHERE dni = ?";
$query = $conexion->prepare($sql);
$query->bind_param('s', $dni);
$query->execute();
$resultado = $query->get_result();

if ($resultado->num_rows === 1) {
    $fila = $resultado->fetch_assoc();
    if (password_verify($password, $fila['password'])) {
        // Si el login es correcto, devolvemos un JSON con éxito y sus datos
        echo json_encode([
            "success" => true, 
            "nombres" => $fila['nombres'], 
            "rol" => $fila['rol']
        ]);
    } else {
        echo json_encode(["success" => false, "message" => "Contraseña incorrecta"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "DNI no encontrado"]);
}
?>