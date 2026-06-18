@extends('plantilla')

@section('contenido')
<section class="py-5" style="background-color: var(--blanco-roto); min-height: 80vh;">
    <div class="container">

        {{-- Encabezado --}}
        <div class="text-center mb-5">
            <p class="hero-eyebrow">Nuestro catálogo</p>
            <h1 class="hero-titulo" style="color: var(--verde-oscuro);">Productos de <em>Sanación</em></h1>
            <p class="texto-suave">Elegí el producto que resuene con vos y comenzá tu camino de transformación.</p>
        </div>

        {{-- Filtro Desplegable --}}
        <div class="text-center mb-5">
            <div class="dropdown">
                <button class="btn dropdown-toggle px-4 py-2" 
                        type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false"
                        style="background-color: var(--verde-oscuro); color: var(--blanco-roto); border-radius: 50px; border: none; transition: 0.3s;">
                    Filtrar por categoría <i class="bi bi-chevron-down ms-2"></i>
                </button>
                <ul class="dropdown-menu text-center shadow-sm" aria-labelledby="dropdownMenuButton" style="border-radius: 15px; border: 1px solid var(--verde-oscuro);">
                    <li><a class="dropdown-item" href="{{ route('productos') }}">Todas las categorías</a></li>
                    <li><hr class="dropdown-divider"></li>
                    @foreach($categorias as $cat)
                        <li>
                            <a class="dropdown-item" href="{{ route('productos', ['categoria' => $cat->id]) }}">
                                {{ $cat->nombre }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        {{-- Lista de Productos --}}
        <div class="row g-4">
            @forelse($productos as $producto)
                <div class="col-md-6 col-lg-4">
                    <div class="card-aesthetic h-100 card-hover p-3" style="background: white; border-radius: 20px;">

                        {{-- Imagen --}}
                        <div class="text-center mb-3">
                            @if($producto->imagen)
                                <img src="{{ asset($producto->imagen) }}" alt="{{ $producto->nombre }}"
                                     style="width: 100%; height: 280px; object-fit: cover; border-radius: 16px;">
                            @else
                                <div class="d-flex justify-content-center align-items-center" style="height:280px; background:#eee; border-radius:16px;">
                                    <span class="text-muted">Sin imagen</span>
                                </div>
                            @endif
                        </div>

                        {{-- Info --}}
                        <div class="text-center">
                            <a href="{{ route('producto.detalle', $producto->id) }}" class="text-decoration-none" style="color: inherit;">
                                <h4 style="font-family:'Playfair Display', serif; color: var(--verde-oscuro);">
                                    {{ $producto->nombre }}
                                </h4>
                            </a>
                            
                            <p class="texto-suave mb-3">{{ $producto->descripcion }}</p>

                            <h5 style="color: var(--verde-medio); font-weight: bold;">
                                ${{ number_format($producto->precio, 2, ',', '.') }}
                            </h5>

                            @auth
                                @if(auth()->user()->rol->nombre === 'admin')
                                    <button class="btn mt-2 w-100" disabled style="background:#d9d9d9; color:#666; cursor:not-allowed;">
                                        Vista de administrador
                                    </button>
                                @else
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
                                        <button class="btn mt-2 w-100" disabled style="background:#ccc; color:#666; cursor:not-allowed;">Sin stock</button>
                                    @endif
                                @endif
                            @else
                                <a href="/login" class="btn-primario mt-2 d-inline-block w-100 text-center">Iniciar sesión para comprar</a>
                            @endauth
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <h4>No hay productos en esta selección.</h4>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection