<<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

    <title>Document</title>
</head>
<body>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <nav class="navbar navbar-expand-lg navbar-dark bg-verde-musgo">
  <div class="container">
    <a class="navbar-brand" href="/">Tienda</a>

    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="/inicio">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/comercializacion">Comercialización</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/productos">Productos</a>
        <li class="nav-item">
          <a class="nav-link" href="/Quienes">Quienes somos</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<footer class="bg-verde-musgo text-white mt-5 p-4">
  <div class="container text-center">
    
    <a href="/contacto" class="text-white me-3">
      Información de Contactos
    </a>

    <a href="/terminos" class="text-white">
      Términos y Usos
    </a>

    <p class="mt-3 mb-0">© 2026 Ondas de Sanacion</p>

  </div>
</footer>
</body>
</html>