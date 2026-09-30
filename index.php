<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- Tu CSS Personalizado -->
    <link rel="stylesheet" href="public/css/login.css">
    
    <title>Login de usuario</title>
  </head>
<div class="container">
  <div class="row min-vh-100 align-items-center justify-content-center">
    
    <!-- Contenedor central del formulario -->
    <div class="col-md-8 col-lg-5">
      <div class="card-login p-4 p-sm-5">
        <h3 class="login-heading mb-4 text-center">Login de usuario</h3>

        <!-- Formulario flotante -->
<form action="servidor/login/loguear.php" method="post">
  <!-- Nueva caja de DNI -->
  <div class="form-floating mb-3">
    <input type="text" class="form-control" id="dni" name="dni" placeholder="DNI" maxlength="8" pattern="[0-9]{8}" required autofocus>
    <label for="dni">DNI</label>
  </div>
  
  <!-- Caja de contraseña intacta -->
  <div class="form-floating mb-3">
    <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
    <label for="password">Contraseña</label>
  </div>
  
  <div class="d-grid mb-2">
    <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase" type="submit">Iniciar sesión</button>
  </div>
  
  <a class="d-block text-center mt-3 small" href="registro.php">¿No tienes cuenta? Regístrate aquí</a>
</form>
        
      </div>
    </div>

  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>