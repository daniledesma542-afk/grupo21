@extends('plantilla')

@section('contenido')
<div class="container my-5">

    <!-- TITULO -->
    <div class="text-center mb-5">
        <h1 class="fw-bold">Comercialización</h1>
        <p class="text-muted">
            Conocé cómo recibir tu pedido, pagar y todas nuestras modalidades disponibles.
        </p>
    </div>

    <div class="row g-4">

        <!-- TIPOS DE ENTREGA -->
        <div class="col-md-4">
            <div class="card h-100 shadow border-0 rounded-4 p-4">
                <h5 class="fw-bold mb-3">📦 Tipos de entrega</h5>
                
                <p class="small text-muted">
                    • Entrega a domicilio <br>
                    • Retiro en punto acordado <br>
                    • Entrega personalizada (según zona)
                </p>
            </div>
        </div>

        <!-- ENVIOS -->
        <div class="col-md-4">
            <div class="card h-100 shadow border-0 rounded-4 p-4">
                <h5 class="fw-bold mb-3">🚚 Formas de envío</h5>
                
                <p class="small text-muted">
                    • Envíos dentro de la ciudad <br>
                    • Envíos a todo el país <br>
                    • Empresas de transporte (ej: correo)
                </p>

                <p class="small text-muted mt-2">
                    ⏳ Tiempo estimado: 3 a 7 días hábiles
                </p>
            </div>
        </div>

        <!-- PAGOS -->
        <div class="col-md-4">
            <div class="card h-100 shadow border-0 rounded-4 p-4">
                <h5 class="fw-bold mb-3">💳 Métodos de pago</h5>
                
                <p class="small text-muted">
                    • Mercado Pago <br>
                    • Transferencia bancaria <br>
                    • Efectivo (según modalidad)
                </p>
            </div>
        </div>

    </div>

    <!-- INFO EXTRA -->
    <div class="mt-5 text-center">
        <p class="text-muted small">
            Para más información o consultas, podés contactarnos directamente. Estamos para ayudarte ✨
        </p>
    </div>

</div>
@endsection