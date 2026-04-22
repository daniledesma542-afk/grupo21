<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ondas de Sanación | Inicio</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

    @include('partials.navbar')
    @include('partials.carrusel')

    <header class="hero" >
        <div class="hero-content">
            <p class="hero-eyebrow">Tienda holística · Corrientes, Argentina</p>
            <h1 class="hero-titulo">Encuentra tu<br /><em>equilibrio natural</em></h1>
            <p class="hero-descripcion">
                Productos, terapias y remedios naturales seleccionados para el bienestar integral.
            </p>
            <div class="hero-ctas">
                <a href="{{ url('/productos') }}" class="btn-primario">Ver catálogo</a>
            </div>
        </div>
    </header>

    <section class="seccion-intro">
        <p class="intro-cita">"Cada cuerpo tiene su propia sabiduría.<br />Nosotros te ayudamos a escucharla."</p>
        <p class="intro-subtexto">— Ondas de Sanación</p>
    </section>

    @include('partials.footer')

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>