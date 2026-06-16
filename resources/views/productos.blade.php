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

        {{-- Menú de Filtro tipo Desplegable (Aesthetic) --}}
        <div class="text-center mb-5">
            <div class="dropdown">
                <button class="btn btn-filtro-principal dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ request('categoria_id') ? \App\Models\Categoria::find(request('categoria_id'))->nombre : 'Filtrar por Categoría' }}
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('productos') }}">Todos</a></li>
                    @foreach(\App\Models\Categoria::all() as $cat)
                        <li><a class="dropdown-item" href="{{ route('productos', ['categoria_id' => $cat->id]) }}">{{ $cat->nombre }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>

        {{-- Estilos personalizados --}}
        <style>
            .btn-filtro-principal {
                background-color: transparent;
                border: 1px solid var(--verde-oscuro);
                color: var(--verde-oscuro);
                padding: 10px 40px;
                border-radius: 50px;
                font-family: 'Playfair Display', serif;
                transition: 0.3s;
            }
            .btn-filtro-principal:hover {
                background-color: var(--verde-oscuro);
                color: white;
            }
            .dropdown-menu {
                border-radius: 15px;
                box-shadow: 0 4px 15px rgba(0,0,0,0.1);
                border: none;
                margin-top: 10px;
            }
            .dropdown-item {
                font-family: 'Playfair Display', serif;
                color: var(--verde-oscuro);
                padding: 10px 20px;
            }
            .dropdown-item:hover {
                background-color: var(--verde-medio);
                color: white;
            }
        </style>

        {{-- Grilla de Productos --}}
        <div class="row g-4">
            @forelse($productos as $producto)
                <div class="col-md-6 col-lg-4">
                    <div class="card-aesthetic h-100 card-hover p-3">
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

                        <div class="text-center">
                            <h4 style="font-family:'Playfair Display', serif;">{{ $producto->nombre }}</h4>
                            <p class="texto-suave mb-3">{{ $producto->descripcion }}</p>
                            <h5 style="color: var(--verde-medio); font-weight: bold;">
                                ${{ number_format($producto->precio, 2, ',', '.') }}
                            </h5>

                            @auth
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
                                    <button class="btn mt-2 w-100" disabled style="background:#ccc; color:#666;">Sin stock</button>
                                @endif
                            @else
                                <a href="/login" class="btn-primario mt-2 d-inline-block w-100 text-center">Iniciar sesión</a>
                            @endauth
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <h4>No hay productos en esta categoría todavía</h4>
                    <p class="texto-suave">Pronto habrá novedades ✨</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection