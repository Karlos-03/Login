<?php
include "Conexion.php";

class Auth extends Conexion {
    
    public function registrar($nombres, $apellidos, $dni, $password) {
        $conexion = parent::conectar();
        
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $rol = 'padre'; // Forzamos el rol internamente
        
        $sql = "INSERT INTO t_usuarios (nombres, apellidos, dni, password, rol) VALUES (?, ?, ?, ?, ?)";
        $query = $conexion->prepare($sql);
        $query->bind_param('sssss', $nombres, $apellidos, $dni, $hashedPassword, $rol);
        
        return $query->execute();
    }
    
    public function logear($dni, $password) {
        $conexion = parent::conectar();
        
        $sql = "SELECT * FROM t_usuarios WHERE dni = ?";
        $query = $conexion->prepare($sql);
        $query->bind_param('s', $dni);
        $query->execute();
        
        $resultado = $query->get_result();
        
        if ($resultado->num_rows === 1) {
            $fila = $resultado->fetch_assoc();
            $passwordExistente = $fila['password'];
            
            if (password_verify($password, $passwordExistente)) {
                // Guardamos sus datos en la sesión para usarlos en el sistema
                $_SESSION['dni'] = $dni;
                $_SESSION['nombres'] = $fila['nombres'];
                $_SESSION['rol'] = $fila['rol'];
                return true;
            }
        }
        return false;
    }
}
?>