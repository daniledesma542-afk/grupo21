<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu Carrito | Ondas de Sanación</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body>

    @include('partials.navbar')

    <div class="container" style="padding-top: 120px; min-height: 70vh;">
        <h2 style="font-family: 'Playfair Display', serif; color: var(--verde-oscuro);">Tu Carrito de Compras</h2>
        <hr>
        <div class="alert alert-light border text-center p-5">
            <p class="text-muted">Tu carrito está actualmente vacío.</p>
            <a href="{{ url('/productos') }}" class="btn-primario">Explorar Catálogo</a>
        </div>
    </div>

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>