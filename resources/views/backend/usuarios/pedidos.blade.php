@extends('plantilla')

@section('contenido')
<section class="py-5" style="background-color: var(--blanco-roto); min-height: 80vh;">
    <div class="container">

        {{-- Header --}}
        <div class="text-center mb-5">
            <h1 class="hero-titulo">
                Mis <em>Pedidos</em>
            </h1>

            <p class="texto-suave">
                Consultá el historial de tus compras.
            </p>
        </div>

        @if($pedidos->count() > 0)

            @foreach($pedidos as $pedido)
                <div class="card-aesthetic card-hover p-4 mb-4">

                    <div class="row align-items-center text-center text-md-start">

                        {{-- Número de pedido --}}
                        <div class="col-md-3 mb-3 mb-md-0">
                            <small class="text-muted d-block">Pedido</small>
                            <h5 class="mb-0" style="color: var(--verde-oscuro);">
                                #{{ $pedido->id }}
                            </h5>
                        </div>

                        {{-- Fecha --}}
                        <div class="col-md-3 mb-3 mb-md-0">
                            <small class="text-muted d-block">Fecha</small>
                            <span style="color: var(--verde-oscuro);">
                                {{ $pedido->fecha_venta->format('d/m/Y H:i') }}
                            </span>
                        </div>

                        {{-- Total --}}
                        <div class="col-md-3 mb-3 mb-md-0">
                            <small class="text-muted d-block">Total</small>
                            <strong style="font-size: 1.1rem; color: var(--verde-medio);">
                                ${{ number_format($pedido->total, 2, ',', '.') }}
                            </strong>
                        </div>

                        {{-- Estado --}}
                        <div class="col-md-3">
                            <small class="text-muted d-block mb-2">Estado</small>
                            <span class="badge px-3 py-2"
                                  style="background-color: var(--verde-medio); color: var(--crema); border-radius: 20px;">
                                {{ ucfirst($pedido->estado) }}
                            </span>
                        </div>
                         {{-- Detalle de pedido --}}   
                        <div class="text-end mt-3">
                            <a href="{{ route('cliente.pedido.detalle', $pedido->id) }}"
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
                <i class="bi bi-box-seam"
                   style="font-size: 4rem; color: var(--beige);"></i>

                <h4 class="mt-3 text-muted">
                    Todavía no realizaste compras
                </h4>

                <p class="texto-suave">
                    Cuando hagas tu primera compra, aparecerá aquí.
                </p>

                <a href="/productos" class="btn-primario mt-3">
                    Ir al catálogo
                </a>
            </div>
        @endif

    </div>
</section>
@endsection