@extends('plantilla')

@section('contenido')
<section class="py-5" style="min-height: 80vh; background-color: var(--blanco-roto);">
    <div class="container">
        
        <div class="text-center mb-5">
            <h1 class="hero-titulo" style="font-family: 'Playfair Display', serif; color: var(--verde-oscuro);">
                Tu Carrito de Sanación
            </h1>
        </div>

        {{-- Mensaje de éxito --}}
        @if(session('success'))
            <div class="alert mb-4" style="background-color: rgba(135, 169, 156, 0.2); color: var(--verde-oscuro); border: 1px solid var(--verde-medio); border-radius: 12px;">
                {{ session('success') }}
            </div>
        @endif

        <div class="card p-4 shadow-sm" style="border: none; border-radius: 16px; background-color: #ffffff;">
            <div class="table-responsive">
                <table class="table align-middle" style="color: var(--verde-oscuro);">
                    <thead style="border-bottom: 2px solid var(--beige);">
                        <tr>
                            <th style="font-weight: 600;">Producto</th>
                            <th style="font-weight: 600;">Cantidad</th>
                            <th style="font-weight: 600;">Precio Unitario</th>
                            <th style="font-weight: 600;">Subtotal</th>
                            <th style="font-weight: 600;">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Vela de Canela</td>
                            <td>1</td>
                            <td>$16.700,00</td>
                            <td>$16.700,00</td>
                            <td>
                                <button class="btn btn-sm btn-outline-danger" style="border-radius: 8px;" title="Eliminar">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- Total --}}
            <div class="d-flex justify-content-end align-items-center mt-3 pt-3">
                <h4 class="me-3" style="color: var(--verde-oscuro); font-family: 'Playfair Display', serif;">
                    TOTAL: <strong>$16.700,00</strong>
                </h4>
            </div>

            {{-- BOTONES DE ACCIÓN --}}
            <div class="d-flex justify-content-end gap-3 mt-4 pt-3" style="border-top: 1px solid var(--beige);">
                
                <a href="{{ route('productos.index') }}" class="btn" 
                   style="border: 1px solid var(--verde-oscuro); color: var(--verde-oscuro); border-radius: 50px; padding: 10px 25px; font-family: 'Playfair Display', serif; text-decoration: none; transition: 0.3s;">
                    <i class="bi bi-arrow-left"></i> Seguir comprando
                </a>

                <form action="{{ route('carrito.confirmar') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn" 
                            style="background-color: var(--verde-oscuro); color: white; border-radius: 50px; padding: 10px 25px; font-family: 'Playfair Display', serif; transition: 0.3s;">
                        Confirmar Compra <i class="bi bi-check-circle"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection