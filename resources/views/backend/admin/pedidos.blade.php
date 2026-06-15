@extends('plantilla')

@section('contenido')
<section class="py-5" style="background-color: var(--blanco-roto); min-height: 85vh;">
    <div class="container">

        <div class="text-center mb-5">
            <p class="hero-eyebrow">Administración</p>
            <h1 class="hero-titulo">
                Gestión de <em>Pedidos</em>
            </h1>
        </div>

        @if($pedidos->count() > 0)

            @foreach($pedidos as $pedido)
                <div class="card-aesthetic p-4 mb-4 card-hover">
                    <div class="row align-items-center">

                        <div class="col-md-2">
                            <small class="text-muted">Pedido</small>
                            <h5>#{{ $pedido->id }}</h5>
                        </div>

                        <div class="col-md-3">
                            <small class="text-muted">Cliente</small>
                            <div>{{ $pedido->usuario->nombre }}</div>
                        </div>

                        <div class="col-md-2">
                            <small class="text-muted">Fecha</small>
                            <div>
                                {{ $pedido->fecha_venta ? $pedido->fecha_venta->format('d/m/Y') : '-' }}
                            </div>
                        </div>

                        <div class="col-md-2">
                            <small class="text-muted">Total</small>
                            <div>
                                ${{ number_format($pedido->total, 2, ',', '.') }}
                            </div>
                        </div>

                        <div class="col-md-3 text-end">
                            <span class="badge px-3 py-2"
                                  style="background-color: var(--verde-medio); color:white;">
                                {{ ucfirst($pedido->estado) }}
                            </span>
                        </div>
                        <div class="mt-3 text-end">
                            <a href="{{ route('admin.pedidos.show', $pedido->id) }}"
                            class="btn btn-sm"
                            style="background-color: var(--beige); color: var(--verde-oscuro);">
                                Ver detalle
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach

        @else
            <div class="text-center py-5">
                <h4>No hay pedidos todavía</h4>
            </div>
        @endif

    </div>
</section>
@endsection