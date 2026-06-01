<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: var(--verde-oscuro); border-bottom: 1px solid rgba(212, 184, 150, 0.2);">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}" style="font-family: 'Playfair Display', serif; color: var(--crema); font-size: 1.4rem; letter-spacing: 0.05em;">
        Ondas de <span style="color: var(--beige); font-style: italic;">Sanación</span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-center">
        
        <li class="nav-item"><a class="nav-link" style="color: var(--crema); font-family: 'Lato', sans-serif; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 0.15em; padding: 0.5rem 1.2rem;" href="{{ url('/') }}">Inicio</a></li>
        <li class="nav-item"><a class="nav-link" style="color: var(--crema); font-family: 'Lato', sans-serif; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 0.15em; padding: 0.5rem 1.2rem;" href="{{ url('/quienes') }}">Quiénes somos</a></li>
        <li class="nav-item"><a class="nav-link" style="color: var(--crema); font-family: 'Lato', sans-serif; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 0.15em; padding: 0.5rem 1.2rem;" href="{{ url('/productos') }}">Productos</a></li>
        <li class="nav-item"><a class="nav-link" style="color: var(--crema); font-family: 'Lato', sans-serif; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 0.15em; padding: 0.5rem 1.2rem;" href="{{ url('/comercializacion') }}">Comercialización</a></li>
        <li class="nav-item"><a class="nav-link" style="color: var(--crema); font-family: 'Lato', sans-serif; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 0.15em; padding: 0.5rem 1.2rem;" href="{{ url('/contacto') }}">Contacto</a></li>
        
        @guest
            <li class="nav-item"><a class="nav-link" style="color: var(--crema); font-family: 'Lato', sans-serif; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 0.15em; padding: 0.5rem 1.2rem;" href="{{ route('login') }}">Login</a></li>
            <li class="nav-item"><a class="nav-link" style="color: var(--crema); font-family: 'Lato', sans-serif; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 0.15em; padding: 0.5rem 1.2rem;" href="{{ url('/registro') }}">Registro</a></li>
        @endguest

        @auth
            @if(auth()->user()->rol->nombre === 'admin')
                <li class="nav-item"><a class="nav-link" style="color: var(--crema); font-family: 'Lato', sans-serif; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 0.15em; padding: 0.5rem 1.2rem;" href="{{ url('/admin') }}">Panel Admin</a></li>
            
            @else
                <li class="nav-item ms-lg-3">
                  <a class="nav-link position-relative" href="{{ url('/carrito') }}" style="color: var(--crema); font-size: 1.2rem;">
                    <i class="bi bi-bag"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill" 
                          style="background-color: var(--beige); color: var(--verde-oscuro); font-size: 0.55rem; padding: 0.35em 0.5em;">
                      0
                    </span>
                  </a>
                </li>
            @endif

            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST" class="d-inline m-0 p-0">
                    @csrf
                    <button type="submit" class="nav-link border-0 bg-transparent" style="color: var(--crema); font-family: 'Lato', sans-serif; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 0.15em; padding: 0.5rem 1.2rem;">Cerrar Sesión</button>
                </form>
            </li>
        @endauth

      </ul>
    </div>
  </div>
</nav>