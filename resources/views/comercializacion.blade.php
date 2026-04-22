@extends('plantilla')

@section('contenido')
    <div class="container my-5">
        <h1 class="text-center mb-4">Comercialización</h1>

        <p class="text-center">En esta sección encontrarás información sobre cómo comercializamos nuestros productos y servicios, así como nuestras políticas de venta y distribución.</p>
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                <img src="{{ asset('img/fotos-cuadradas/fotovelaycafe.jpg') }}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">¿Cómo realizar una compra?</h5>
                    <p class="card-text">Comprar en Ondas de Sanación es simple</p>
                    <p class="card-text"><small class="text-body-secondary">1) Selecciona el producto que deseas comprar.</small></p>  
                                        <p class="card-text"><small class="text-body-secondary">2) Agrega el producto al carrito.</small></p>  
                                        <p class="card-text"><small class="text-body-secondary">3) Realiza el pago.</small></p>  
                                        <p class="card-text"><small class="text-body-secondary">4) Recibe tu pedido en la comodidad de tu hogar.</small></p>
                </div>
                </div>
            </div>
            </div>
    </div>
@endsection