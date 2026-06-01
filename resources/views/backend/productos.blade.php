@extends('plantilla')

@section('contenido')
<div class="container mt-5 mb-5">
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 style="font-family: 'Playfair Display', serif; color: var(--verde-oscuro);">Mi Catálogo</h2>
        <a href="{{ url('/admin/productos/crear') }}" class="btn text-white" style="background-color: var(--beige); color: var(--verde-oscuro) !important; font-weight: bold;">
            + Nuevo Producto
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm" style="border: 1px solid rgba(212, 184, 150, 0.4);">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead style="background-color: var(--verde-oscuro); color: var(--crema);">
                    <tr>
                        <th class="p-3">Nombre</th>
                        <th class="p-3">Precio</th>
                        <th class="p-3">Stock</th>
                        <th class="p-3 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($productos as $producto)
                        <tr>
                            <td class="p-3 align-middle">{{ $producto->nombre }}</td>
                            <td class="p-3 align-middle">${{ number_format($producto->precio, 2, ',', '.') }}</td>
                            <td class="p-3 align-middle">{{ $producto->stock }} un.</td>
                            <td class="p-3 align-middle text-center">
                                <form action="{{ url('/admin/productos/' . $producto->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro que querés eliminar este producto?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i> Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center p-4 text-muted">
                                Todavía no cargaste ningún producto. ¡Hacé clic en "Nuevo Producto" para empezar!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection