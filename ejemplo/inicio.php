<?php session_start(); 
  if (!isset($_SESSION['dni'])) {
    header("location:index.php");
  }
?>

<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Panel de Dirección - Sistema Escolar</title>
  </head>
  <body class="bg-light">
    
  <!-- Navegación Principal -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top shadow-sm">
    <div class="container-fluid px-4">
      <a class="navbar-brand fw-bold" href="#">
        <img src="logo.jpg" alt="Logo Colegio" height="36" class="d-inline-block align-text-top me-2">
        SGA - Dirección
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto align-items-center">
          <li class="nav-item">
            <a class="nav-link active fw-bold" aria-current="page" href="inicio.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="docentes.php">Docentes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="asignaciones.php">Asignaciones</a>
          </li>
          <li class="nav-item dropdown ms-2">
           <a class="btn btn-secondary dropdown-toggle btn-sm text-white px-3" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              👤 <?php echo $_SESSION['nombres']; ?>
           </a>
            <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="navbarDropdown">
              <li><span class="dropdown-item-text text-muted small">Rol: Director</span></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item text-danger" href="servidor/login/logout.php">Cerrar Sesión</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Panel del Director -->
  <div class="container-fluid px-4 my-4">
      <!-- Saludo e Información Institucional -->
      <div class="d-flex justify-content-between align-items-center mb-4">
          <div>
              <h2 class="fw-bold mb-0 text-dark">Bienvenido, Director <?php echo $_SESSION['nombres']; ?></h2>
              <p class="text-muted mb-0">Panel general de administración y control institucional</p>
          </div>
          <span class="badge bg-primary fs-6 px-3 py-2 shadow-sm">Año Lectivo 2026</span>
      </div>

      <!-- Tarjetas de Métricas Rápidas -->
      <div class="row g-3 mb-4">
          <div class="col-md-4">
              <div class="card border-0 shadow-sm border-start border-4 border-primary h-100">
                  <div class="card-body">
                      <div class="text-uppercase fw-bold text-primary small mb-1">Docentes Registrados</div>
                      <h3 class="fw-bold mb-0 text-dark" id="cant-docentes">--</h3>
                      <small class="text-muted">Personal activo en sistema</small>
                  </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="card border-0 shadow-sm border-start border-4 border-success h-100">
                  <div class="card-body">
                      <div class="text-uppercase fw-bold text-success small mb-1">Aulas Habilitadas</div>
                      <h3 class="fw-bold mb-0 text-dark">30</h3>
                      <small class="text-muted">15 Mañana / 15 Tarde</small>
                  </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="card border-0 shadow-sm border-start border-4 border-warning h-100">
                  <div class="card-body">
                      <div class="text-uppercase fw-bold text-warning small mb-1">Cursos MINEDU</div>
                      <h3 class="fw-bold mb-0 text-dark">10</h3>
                      <small class="text-muted">Plan curricular oficial</small>
                  </div>
              </div>
          </div>
      </div>

      <!-- Módulos Principales de Trabajo -->
      <div class="row g-3">
          <div class="col-md-6">
              <div class="card border-0 shadow-sm h-100">
                  <div class="card-header bg-white fw-bold py-3 border-0">
                      👨‍🏫 Gestión del Personal Docente
                  </div>
                  <div class="card-body pt-0">
                      <p class="text-muted">Registra nuevos profesores en la base de datos, asigna sus credenciales de acceso y gestiona sus datos personales.</p>
                      <a href="docentes.php" class="btn btn-primary fw-bold">
                          Administrar Docentes &rarr;
                      </a>
                  </div>
              </div>
          </div>
          <div class="col-md-6">
              <div class="card border-0 shadow-sm h-100">
                  <div class="card-header bg-white fw-bold py-3 border-0">
                      📚 Carga Académica y Horarios
                  </div>
                  <div class="card-body pt-0">
                      <p class="text-muted">Asigna las materias de la malla curricular a los profesores según su aula (1ro A - 5to F) y turno correspondiente.</p>
                      <a href="asignaciones.php" class="btn btn-outline-primary fw-bold">
                          Asignar Cursos &rarr;
                      </a>
                  </div>
              </div>
          </div>
      </div>
  </div>
    
    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>