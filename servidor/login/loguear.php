<?php 
session_start();

if (isset($_POST['dni']) && isset($_POST['password'])) {
    $dni = $_POST['dni'];
    $password = $_POST['password'];

    require_once '../../clases/Auth.php';
    $auth = new Auth();

    $loginExitoso = $auth->logear($dni, $password);

    if ($loginExitoso) {
        header("location: ../../inicio.php");
        exit();
    } else {
        echo "No se pudo logear.";
    }
} else {
    echo "Error: Las credenciales no están definidas.";
}
?>
