<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: var(--verde-oscuro);">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}" style="font-family: 'Playfair Display', serif; color: var(--crema); font-size: 1.4rem;">
        Ondas de <span>Sanación</span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" style="color: var(--crema); font-family: 'Lato', sans-serif; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 0.1em;" href="{{ url('/') }}">Inicio</a></li>
        <li class="nav-item"><a class="nav-link" style="color: var(--crema); font-family: 'Lato', sans-serif; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 0.1em;" href="{{ url('/quienes') }}">Quiénes somos</a></li>
        <li class="nav-item"><a class="nav-link" style="color: var(--crema); font-family: 'Lato', sans-serif; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 0.1em;" href="{{ url('/productos') }}">Productos</a></li>
        <li class="nav-item"><a class="nav-link" style="color: var(--crema); font-family: 'Lato', sans-serif; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 0.1em;" href="{{ url('/comercializacion') }}">Comercialización</a></li>
        <li class="nav-item"><a class="nav-link" style="color: var(--crema); font-family: 'Lato', sans-serif; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 0.1em;" href="{{ url('/contacto') }}">Contacto</a></li>
      </ul>
    </div>
  </div>
</nav>