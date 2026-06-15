@extends('plantilla')

@section('contenido')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <div class="card shadow border-0" style="background-color: #f7f5ef;">
                <div class="card-body p-5">
                    <i class="bi bi-balloon-heart" style="font-size: 5rem; color: var(--verde-oscuro);"></i>
                    <h1 class="mt-4 mb-3" style="font-family: 'Playfair Display', serif; color: var(--verde-oscuro);">¡Gracias por tu compra!</h1>
                    <p class="fs-5 text-muted">Tu pedido fue confirmado exitosamente. Te enviaremos un mail con los detalles del envío.</p>
                    
                    <hr style="border-color: var(--beige); margin: 30px 0;">
                    
                    <h5 class="fw-bold mb-3">Resumen de tu pedido:</h5>
                    <ul class="list-group mb-4 text-start shadow-sm">
                        @foreach(session('items') as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $item['nombre'] }} (x{{ $item['cantidad'] }})
                                <span>${{ number_format($item['subtotal'], 2, ',', '.') }}</span>
                            </li>
                        @endforeach
                        <li class="list-group-item d-flex justify-content-between align-items-center fw-bold" style="background-color: var(--verde-oscuro); color: var(--crema);">
                            TOTAL A ABONAR
                            <span>${{ number_format(session('total'), 2, ',', '.') }}</span>
                        </li>
                    </ul>

                    <a href="{{ url('/productos') }}" class="btn" style="background-color: var(--beige); color: var(--verde-oscuro); font-weight: bold;">Volver al Catálogo</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection