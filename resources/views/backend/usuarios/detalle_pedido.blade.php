@extends('plantilla')

@section('contenido')
<section class="py-5" style="background-color: var(--blanco-roto); min-height: 80vh;">
    <div class="container">

        <div class="text-center mb-5">
            <h1 class="hero-titulo">
                Detalle del <em>Pedido</em>
            </h1>

            <p class="texto-suave">
                Pedido #{{ $pedido->id }}
            </p>
        </div>

        <div class="card-aesthetic p-4 mb-4">

            <div class="row mb-4">
                <div class="col-md-4">
                    <strong>Fecha:</strong><br>
                    {{ $pedido->fecha_venta->format('d/m/Y H:i') }}
                </div>

                <div class="col-md-4">
                    <strong>Estado:</strong><br>
                    <span class="badge px-3 py-2"
                          style="background-color: var(--verde-medio); color: white;">
                        {{ ucfirst($pedido->estado) }}
                    </span>
                </div>

                <div class="col-md-4">
                    <strong>Total:</strong><br>
                    ${{ number_format($pedido->total, 2, ',', '.') }}
                </div>
            </div>

            <hr>

            <h4 class="mb-4">Productos</h4>

            <table class="table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($pedido->detalles as $detalle)
                        <tr>
                            <td>{{ $detalle->producto->nombre }}</td>
                            <td>{{ $detalle->cantidad }}</td>
                            <td>${{ number_format($detalle->precio_unitario, 2, ',', '.') }}</td>
                            <td>${{ number_format($detalle->subtotal, 2, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-end mt-4">
                <a href="/cliente/pedidos" class="btn-primario">
                    Volver a pedidos
                </a>
            </div>

        </div>
    </div>
</section>
@endsection