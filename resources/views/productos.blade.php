@extends('plantilla')

@section('contenido')
{{-- 
    SECCIÓN PRINCIPAL
    Define el layout con un padding vertical (py-5) y un fondo claro. 
    Se asegura que la altura mínima sea del 80% del viewport (min-height: 80vh) 
    para que el footer no se suba si hay pocos productos.
--}}
<section class="py-5" style="background-color: var(--blanco-roto); min-height: 80vh;">
    <div class="container">

        {{-- HERO SECTION: Título y descripción de la página --}}
        <div class="text-center mb-5">
            <p class="hero-eyebrow">Nuestro catálogo</p>
            <h1 class="hero-titulo" style="color: var(--verde-oscuro);">
                Productos de <em>Sanación</em>
            </h1>
            <p class="texto-suave">
                Elegí el producto que resuene con vos y comenzá tu camino de transformación.
            </p>
        </div>

        {{-- 
            =============================================================
            MÓDULO DE FILTRO DE CATEGORÍAS
            Genera botones dinámicos usando la variable $categorias enviada 
            por el ProductoController. Utiliza el helper request() para 
            saber qué categoría está activa y aplicarle colores distintos.
            =============================================================
        --}}
        <div class="d-flex justify-content-center flex-wrap gap-3 mb-5">
            {{-- Botón para resetear filtros y ver "Todos" --}}
            <a href="{{ route('productos.index') }}" 
               class="btn rounded-pill px-4 shadow-sm"
               style="{{ !request('categoria') ? 'background-color: var(--verde-oscuro); color: var(--blanco-roto);' : 'background-color: transparent; border: 1px solid var(--verde-oscuro); color: var(--verde-oscuro);' }}">
                Todos
            </a>

            {{-- Iteración sobre las categorías disponibles en la base de datos --}}
            @foreach($categorias as $cat)
                <a href="{{ route('productos.index', ['categoria' => $cat->id]) }}" 
                   class="btn rounded-pill px-4 shadow-sm"
                   style="{{ request('categoria') == $cat->id ? 'background-color: var(--verde-oscuro); color: var(--blanco-roto);' : 'background-color: transparent; border: 1px solid var(--verde-oscuro); color: var(--verde-oscuro);' }}">
                    {{ $cat->nombre }}
                </a>
            @endforeach
        </div>

        {{-- 
            =============================================================
            GRILLA DE PRODUCTOS
            Utiliza el sistema de grillas de Bootstrap (row g-4).
            La directiva @forelse es ideal porque maneja automáticamente 
            el caso en el que el array $productos esté vacío.
            =============================================================
        --}}
        <div class="row g-4">
            @forelse($productos as $producto)
                <div class="col-md-6 col-lg-4">
                    <div class="card-aesthetic h-100 card-hover p-3">

                        {{-- 
                            Zona navegable: Envuelve la imagen y el texto en un enlace 
                            que dirige a la vista de detalle del producto individual.
                        --}}
                        <a href="{{ route('producto.detalle', $producto->id) }}"
                           class="text-decoration-none"
                           style="color: inherit;">

                            {{-- Manejo de Imagen: Verifica si existe la imagen física, sino muestra un placeholder --}}
                            <div class="text-center mb-3">
                                @if($producto->imagen)
                                    <img src="{{ asset($producto->imagen) }}"
                                         alt="{{ $producto->nombre }}"
                                         style="
                                            width: 100%;
                                            height: 280px;
                                            object-fit: cover;
                                            border-radius: 16px;
                                         ">
                                @else
                                    <div class="d-flex justify-content-center align-items-center"
                                         style="
                                            height:280px;
                                            background:#eee;
                                            border-radius:16px;
                                         ">
                                        <span class="text-muted">Sin imagen</span>
                                    </div>
                                @endif
                            </div>

                            {{-- Información resumida del producto --}}
                            <div class="text-center">
                                <h4 style="font-family:'Playfair Display', serif; color: var(--verde-oscuro);">
                                    {{ $producto->nombre }}
                                </h4>

                                <h5 style="color: var(--verde-medio); font-weight: bold;">
                                    ${{ number_format($producto->precio, 2, ',', '.') }}
                                </h5>
                            </div>
                        </a>

                        {{-- 
                            =============================================================
                            MÓDULO DE ACCIONES (COMPRA Y ROLES)
                            Aplica lógica de negocio directamente en la vista.
                            Utiliza @auth para saber si hay sesión iniciada y verifica 
                            el rol y el stock para habilitar o deshabilitar la compra.
                            =============================================================
                        --}}
                        <div class="text-center mt-3">
                            @auth
                                {{-- Si es admin, no puede comprar, solo previsualizar --}}
                                @if(auth()->user()->rol->nombre === 'admin')
                                    <button class="btn mt-2 w-100" disabled
                                            style="background:#d9d9d9; color:#666; cursor:not-allowed;">
                                        Vista de administrador
                                    </button>
                                @else
                                    {{-- Si es cliente, verificamos el stock disponible --}}
                                    @if($producto->stock > 0)
                                        <form action="{{ route('carrito.agregar') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                                            <input type="hidden" name="cantidad" value="1">

                                            <button type="submit" class="btn-primario mt-2 w-100">
                                                Agregar al carrito
                                            </button>
                                        </form>
                                    @else
                                        {{-- Deshabilita el botón si no hay stock --}}
                                        <button class="btn mt-2 w-100" disabled
                                                style="background:#ccc; color:#666; cursor:not-allowed;">
                                            Sin stock
                                        </button>
                                    @endif
                                @endif
                            @else
                                {{-- Manejo de usuarios invitados (sin sesión) --}}
                                <a href="{{ route('login') }}" class="btn-primario mt-2 d-inline-block w-100 text-center">
                                    Iniciar sesión para comprar
                                </a>
                            @endauth
                        </div>

                    </div>
                </div>
            @empty
                {{-- 
                    ESTADO VACÍO (EMPTY STATE)
                    Se muestra cuando una categoría no tiene productos asignados 
                    o el catálogo está completamente vacío.
                --}}
                <div class="col-12">
                    <div class="text-center py-5">
                        <h4>No hay productos cargados en esta categoría</h4>
                        <p class="text-muted">Pronto habrá novedades ✨</p>
                    </div>
                </div>
            @endforelse
        </div>

    </div>
</section>
@endsection