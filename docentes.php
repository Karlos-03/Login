<?php session_start(); 
  if (!isset($_SESSION['dni'])) {
    header("location:index.php");
    exit();
  }
  
  // Conexión a la base de datos usando la clase
  include "clases/Conexion.php";
  $con = new Conexion();
  $conexion = $con->conectar();
?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Gestión de Docentes - SGA</title>
  </head>
  <body class="bg-light">
    
  <!-- Navegación -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top shadow-sm">
    <div class="container-fluid px-4">
      <a class="navbar-brand fw-bold" href="inicio.php">
        <img src="logo.jpg" alt="Logo" height="36" class="d-inline-block align-text-top me-2">
        SGA - Dirección
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto align-items-center">
          <li class="nav-item"><a class="nav-link" href="inicio.php">Inicio</a></li>
          <li class="nav-item"><a class="nav-link active fw-bold" href="docentes.php">Docentes</a></li>
          <li class="nav-item"><a class="nav-link" href="asignaciones.php">Asignaciones</a></li>
          <li class="nav-item dropdown ms-2">
            <a class="btn btn-secondary dropdown-toggle btn-sm text-white px-3" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              👤 <?php echo $_SESSION['nombres']; ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item text-danger" href="servidor/login/logout.php">Cerrar Sesión</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid px-4 my-4">
      <div class="d-flex justify-content-between align-items-center mb-4">
          <div>
              <h2 class="fw-bold mb-0 text-dark">Gestión de Personal Docente</h2>
              <p class="text-muted mb-0">Registra y administra las cuentas de acceso de los profesores</p>
          </div>
          <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#modalDocente">
              + Registrar Nuevo Docente
          </button>
      </div>

      <!-- Tabla de Docentes Registrados -->
      <div class="card border-0 shadow-sm">
          <div class="card-header bg-white fw-bold py-3">
              Lista de Profesores Activos
          </div>
          <div class="card-body p-0">
              <div class="table-responsive">
                  <table class="table table-hover align-middle mb-0">
                      <thead class="table-light">
                          <tr>
                              <th>#</th>
                              <th>DNI</th>
                              <th>Nombres y Apellidos</th>
                              <th>Rol</th>
                              <th>Estado</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                          if (isset($conexion)) {
                              $sql = "SELECT id, dni, nombres, apellidos, rol FROM t_usuarios WHERE rol = 'profesor'";
                              $result = mysqli_query($conexion, $sql);
                              
                              if ($result && mysqli_num_rows($result) > 0) {
                                  while ($row = mysqli_fetch_assoc($result)) {
                                      echo "<tr>
                                              <td>{$row['id']}</td>
                                              <td><strong>{$row['dni']}</strong></td>
                                              <td>{$row['nombres']} {$row['apellidos']}</td>
                                              <td><span class='badge bg-info text-dark'>{$row['rol']}</span></td>
                                              <td><span class='badge bg-success'>Activo</span></td>
                                            </tr>";
                                  }
                              } else {
                                  echo "<tr><td colspan='5' class='text-center text-muted py-4'>No hay profesores registrados aún.</td></tr>";
                              }
                          } else {
                              echo "<tr><td colspan='5' class='text-center text-muted py-4'>Error en la conexión a la base de datos.</td></tr>";
                          }
                          ?>
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>

  <!-- Modal Registrar Docente -->
  <div class="modal fade" id="modalDocente" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="servidor/docentes/registrar.php" method="POST">
          <div class="modal-header">
            <h5 class="modal-header-title fw-bold">Registrar Profesor</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label font-weight-bold">DNI</label>
              <input type="text" class="form-control" name="dni" maxlength="8" required placeholder="Ingrese 8 dígitos">
            </div>
            <div class="mb-3">
              <label class="form-label">Nombres</label>
              <input type="text" class="form-control" name="nombres" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Apellidos</label>
              <input type="text" class="form-control" name="apellidos" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Contraseña</label>
              <input type="password" class="form-control" name="password" required placeholder="Clave para la app móvil">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary fw-bold">Guardar Docente</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>