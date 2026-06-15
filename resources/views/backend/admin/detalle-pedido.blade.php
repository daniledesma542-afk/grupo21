@extends('plantilla')

@section('contenido')
<section class="py-5" style="background-color: var(--blanco-roto); min-height: 85vh;">
<div class="container">

    <div class="text-center mb-5">
        <h1 class="hero-titulo">
            Pedido <em>#{{ $pedido->id }}</em>
        </h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card-aesthetic p-4 mb-4">

        <div class="row mb-4">
            <div class="col-md-4">
                <strong>Cliente:</strong><br>
                {{ $pedido->usuario->nombre }}
            </div>

            <div class="col-md-4">
                <strong>Email:</strong><br>
                {{ $pedido->usuario->email }}
            </div>

            <div class="col-md-4">
                <strong>Estado actual:</strong><br>
                {{ ucfirst(str_replace('_', ' ', $pedido->estado)) }}
            </div>
        </div>

        <hr>

        <h4>Actualizar estado</h4>

        <form method="POST" action="{{ route('admin.pedidos.estado', $pedido->id) }}" class="mb-4">
            @csrf
            @method('PUT')

            <div class="row align-items-end">
                <div class="col-md-8">
                    <label class="form-label">Nuevo estado</label>
                    <select name="estado" class="form-select">
                        <option value="pendiente_pago" {{ $pedido->estado == 'pendiente_pago' ? 'selected' : '' }}>
                            Pendiente de pago
                        </option>

                        <option value="pagado" {{ $pedido->estado == 'pagado' ? 'selected' : '' }}>
                            Pagado
                        </option>

                        <option value="enviado" {{ $pedido->estado == 'enviado' ? 'selected' : '' }}>
                            Enviado
                        </option>

                        <option value="entregado" {{ $pedido->estado == 'entregado' ? 'selected' : '' }}>
                            Entregado
                        </option>

                        <option value="cancelado" {{ $pedido->estado == 'cancelado' ? 'selected' : '' }}>
                            Cancelado
                        </option>
                    </select>
                </div>

                <div class="col-md-4">
                    <button type="submit" class="btn w-100"
                            style="background-color: var(--verde-oscuro); color: white;">
                        Actualizar estado
                    </button>
                </div>
            </div>
        </form>

        <hr>

        <h4>Productos</h4>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
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
            <h4>Total: ${{ number_format($pedido->total, 2, ',', '.') }}</h4>
        </div>

    </div>
</div>
</section>
@endsection