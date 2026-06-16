<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ondas de Sanación | Inicio</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body>

    <nav id="navbar">
        <a href="{{ url('/') }}" class="nav-logo">Ondas de <span>Sanación</span></a>
        <ul class="nav-links">
            <li><a href="{{ url('/') }}">Inicio</a></li>
            <li><a href="{{ url('/quienes-somos') }}">Quiénes Somos</a></li>
            <li><a href="{{ url('/catalogo') }}">Catálogo</a></li>
            <li><a href="{{ url('/contacto') }}">Contacto</a></li>
        </ul>
    </nav>

    <header class="hero">
        <div class="hero-content text-center text-white">
            <p class="hero-eyebrow">Tienda holística · Corrientes, Argentina</p>
            <h1 class="hero-titulo">Encuentra tu<br><em>equilibrio natural</em></h1>
            <p class="hero-descripcion">Productos y terapias naturales para el bienestar integral.</p>
            <div class="hero-ctas">
                <a href="{{ url('/catalogo') }}" class="btn btn-primary btn-lg">Ver catálogo</a>
            </div>
        </div>
    </header>

    <main class="container my-5">
        <section class="seccion-intro text-center">
            <p class="intro-cita">"Cada cuerpo tiene su propia sabiduría. Nosotros te ayudamos a escucharla."</p>
        </section>
    </main>

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    
    <script>
        window.addEventListener('scroll', function() {
            const nav = document.getElementById('navbar');
            if (window.scrollY > 50) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }
        });
    </script>
</body>
</html>