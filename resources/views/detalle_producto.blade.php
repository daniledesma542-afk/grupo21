@extends('plantilla')

@section('contenido')
<div class="container mt-5 mb-5">
    
    {{-- Botón para volver atrás --}}
    <div class="mb-4">
        <a href="{{ route('productos') }}" class="text-decoration-none" style="color: var(--verde-oscuro); font-weight: bold;">
            <i class="bi bi-arrow-left"></i> Volver al catálogo
        </a>
    </div>

    <div class="card shadow-sm border-0" style="background-color: #f7f5ef;">
        <div class="row g-0 align-items-center">
            
            {{-- Columna de la Imagen --}}
            <div class="col-md-6 text-center p-4">
                @if($producto->imagen)
                    <img src="{{ asset($producto->imagen) }}" class="img-fluid rounded" alt="{{ $producto->nombre }}" style="max-height: 450px; object-fit: cover;">
                @else
                    <img src="{{ asset('img/placeholder.jpg') }}" class="img-fluid rounded" alt="Sin imagen">
                @endif
            </div>

            {{-- Columna de la Información --}}
            <div class="col-md-6 p-5">
                
                {{-- Categoría (Opcional, si la tenés relacionada) --}}
                <span class="badge mb-2" style="background-color: var(--verde-medio); color: var(--crema);">
                    {{ $producto->categoria->nombre ?? 'Producto' }}
                </span>

                <h1 style="font-family: 'Playfair Display', serif; color: var(--verde-oscuro); font-weight: bold;">
                    {{ $producto->nombre }}
                </h1>
                
                <h3 class="mb-4" style="color: var(--verde-oscuro);">
                    ${{ number_format($producto->precio, 2, ',', '.') }}
                </h3>

                <p class="fs-5 text-muted mb-4">
                    {{ $producto->descripcion ?? 'Este producto no tiene una descripción detallada por el momento.' }}
                </p>

                <hr style="border-color: var(--beige);">

                <div class="d-flex align-items-center mt-4">
                    <p class="mb-0 me-4">
                        <strong>Stock disponible:</strong> 
                        <span class="{{ $producto->stock > 0 ? 'text-success' : 'text-danger' }}">
                            {{ $producto->stock }} unidades
                        </span>
                    </p>
                </div>

                {{-- Formulario para agregar al carrito --}}
                <div class="mt-4">
                    @if($producto->stock > 0)
                        <form action="{{ route('carrito.agregar') }}" method="POST" class="d-flex align-items-center gap-3">
                            @csrf
                            <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                            
                            <div style="width: 100px;">
                                <input type="number" name="cantidad" class="form-control text-center" value="1" min="1" max="{{ $producto->stock }}">
                            </div>

                            <button type="submit" class="btn" style="background-color: var(--verde-oscuro); color: var(--crema); font-weight: bold; padding: 10px 30px;">
                                <i class="bi bi-cart-plus"></i> Agregar al Carrito
                            </button>
                        </form>
                    @else
                        <button class="btn btn-secondary w-100 p-3" disabled>
                            <i class="bi bi-x-circle"></i> Sin Stock
                        </button>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
@endsection