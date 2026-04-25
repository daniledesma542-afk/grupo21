@extends('plantilla')

@section('contenido')
<section class="seccion-editorial py-5">
    <div class="container py-5">
        <div class="row align-items-center gx-5">
            
            <div class="col-lg-6 mb-5 mb-lg-0">
                <span class="text-dorado text-uppercase fw-bold letter-spacing-2 mb-2 d-block">Nuestro Propósito</span>
                <h1 class="display-3 text-oliva mb-4 font-serif">
                    Quienes <span class="fst-italic">somos</span>
                </h1>
                
                <div class="bloque-texto-color p-4 mb-4 shadow-sm">
                    <p class="font-sans-serif mb-0 text-dark" style="line-height: 1.8; font-size: 1.1rem;">
                        Somos un equipo a la par, apasionado por el bienestar integral. Creamos este espacio para transmitirte <strong>confianza y seguridad</strong>, acompañándote en cada paso de tu camino.
                    </p>
                </div>

                <p class="font-sans-serif text-muted mb-4" style="line-height: 1.8; font-size: 1.05rem;">
                    Entendemos que buscar el equilibrio es un proceso personal. Por eso, curamos cada herramienta, vela y ritual con total transparencia, para que te sientas en casa desde el primer momento.
                </p>

                <div class="d-flex gap-4 mt-4 text-oliva">
                    <div>
                        <h4 class="font-serif fw-bold mb-1">Confianza</h4>
                        <span class="font-sans-serif small text-muted">En cada producto</span>
                    </div>
                    <div class="border-start border-2 border-dorado ps-4">
                        <h4 class="font-serif fw-bold mb-1">Seguridad</h4>
                        <span class="font-sans-serif small text-muted">En tu proceso</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 position-relative">
                <div class="shadow-lg rounded overflow-hidden">
                    <img src="{{ asset('img/equipo.jpg') }}" alt="Nuestro Equipo" class="img-fluid w-100" style="height: 600px; object-fit: cover;">
                </div>
                
                <div class="cuadro-flotante-color shadow-lg p-4 text-center">
                    <i class="bi bi-quote fs-1 text-dorado mb-2"></i>
                    <p class="font-serif m-0 fw-bold fst-italic" style="font-size: 1.25rem;">
                        "Acompañándote con empatía y transparencia en cada paso de tu sanación."
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection