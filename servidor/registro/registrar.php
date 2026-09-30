<?php 
session_start();
require_once '../../clases/Auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $auth = new Auth();

    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $dni = $_POST['dni'];
    $password = $_POST['password'];

    // Pasamos los 4 datos a la función registrar
    $registroExitoso = $auth->registrar($nombres, $apellidos, $dni, $password);

    if ($registroExitoso) {
        // Redirige al login para que inicie sesión con su nuevo DNI
        header("location: ../../index.php"); 
        exit();
    } else {
        echo "No se pudo registrar.";
    }
}
?>