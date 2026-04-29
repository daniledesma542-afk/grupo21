@extends('plantilla')

@section('contenido')
<section class="seccion-productos py-5" style="background-color: #f7f5ef;">
    <div class="container py-5">
        
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-lg-8 text-center text-oliva-oscuro">
                
                <span class="text-dorado-nuevo fs-5 mb-3 d-block font-serif" style="letter-spacing: 2px;">
                    Ondas de <em class="fw-light" style="font-style: italic;">Sanación</em>
                </span>
                
                <h1 class="display-2 font-serif fw-bold mb-4 position-relative d-inline-block">
                    Nuestro Catálogo
                    <span class="position-absolute start-50 translate-middle-x rounded-pill" style="bottom: -10px; width: 80px; height: 4px; background-color: #cba87c;"></span>
                </h1>
                
                <div class="d-flex justify-content-center align-items-center mt-4">
                    <span class="badge px-4 py-2 rounded-pill font-sans-serif small shadow-sm" style="background-color: #4b5e40; color: white; letter-spacing: 1px;">
                        Mostrando 16 productos
                    </span>
                </div>
                
            </div>
        </div>

        <div class="row g-4">
            
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="tarjeta-producto shadow-sm h-100 d-flex flex-column">
                    <div class="contenedor-imagen">
                        <img src="{{ asset('img/fotos-productos/velaCanela.jpg') }}" alt="Vela de Canela" class="img-fluid w-100">
                    </div>
                    <div class="p-4 text-center d-flex flex-column flex-grow-1">
                        <h5 class="font-serif fw-bold text-oliva-oscuro mb-2">Vela de Canela</h5>
                        <p class="small text-muted mb-3 flex-grow-1">Calidez botánica. Vela especiada con notas de naranja, canela y anís estrellado. Hecha a mano.</p>
                        <p class="text-dorado-nuevo fw-bold fs-5 mb-3">$16.700</p>
                        <a href="#" class="btn btn-dorado-principal w-100 mt-auto">Añadir al Carrito</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="tarjeta-producto shadow-sm h-100 d-flex flex-column">
                    <div class="contenedor-imagen">
                        <span class="badge-holistico bg-oliva" style="background-color: #4b5e40 !important;">Más Vendido</span>
                        <img src="{{ asset('img/fotos-productos/velaEucalipto.jpg') }}" alt="Vela de Eucalipto" class="img-fluid w-100">
                    </div>
                    <div class="p-4 text-center d-flex flex-column flex-grow-1">
                        <h5 class="font-serif fw-bold text-oliva-oscuro mb-2">Vela de Eucalipto</h5>
                        <p class="small text-muted mb-3 flex-grow-1">Refugio natural. Notas botánicas de eucalipto y cedro en un diseño clásico ámbar.</p>
                        <p class="text-dorado-nuevo fw-bold fs-5 mb-3">$14.900</p>
                        <a href="#" class="btn btn-dorado-principal w-100 mt-auto">Añadir al Carrito</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="tarjeta-producto shadow-sm h-100 d-flex flex-column">
                    <div class="contenedor-imagen">
                        <img src="{{ asset('img/fotos-productos/tarotRider.jpg') }}" alt="Tarot Rider" class="img-fluid w-100">
                    </div>
                    <div class="p-4 text-center d-flex flex-column flex-grow-1">
                        <h5 class="font-serif fw-bold text-oliva-oscuro mb-2">Tarot Rider</h5>
                        <p class="small text-muted mb-3 flex-grow-1">El clásico indiscutido. Tarot Rider-Waite. Simbología vintage y la mejor puerta de entrada al tarot.</p>
                        <p class="text-dorado-nuevo fw-bold fs-5 mb-3">$11.200</p>
                        <a href="#" class="btn btn-dorado-principal w-100 mt-auto">Añadir al Carrito</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="tarjeta-producto shadow-sm h-100 d-flex flex-column">
                    <div class="contenedor-imagen">
                        <img src="{{ asset('img/fotos-productos/serpentina.jpg') }}" alt="Serpentina" class="img-fluid w-100">
                    </div>
                    <div class="p-4 text-center d-flex flex-column flex-grow-1">
                        <h5 class="font-serif fw-bold text-oliva-oscuro mb-2">Serpentina</h5>
                        <p class="small text-muted mb-3 flex-grow-1">Energía y arraigo. Piedra Serpentina natural. Tu aliada para desbloquear, sanar y volver a tu centro.</p>
                        <p class="text-dorado-nuevo fw-bold fs-5 mb-3">$6.000</p>
                        <a href="#" class="btn btn-dorado-principal w-100 mt-auto">Añadir al Carrito</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="tarjeta-producto shadow-sm h-100 d-flex flex-column">
                    <div class="contenedor-imagen">
                        <img src="{{ asset('img/fotos-productos/sahumerioRosasYOlibano.jpg') }}" alt="Sahumerio Rosas y Olíbano" class="img-fluid w-100">
                    </div>
                    <div class="p-4 text-center d-flex flex-column flex-grow-1">
                        <h5 class="font-serif fw-bold text-oliva-oscuro mb-2">Sahumerio Rosas y Olíbano</h5>
                        <p class="small text-muted mb-3 flex-grow-1">Armonía y limpieza por Sagrada Madre. El equilibrio perfecto para purificar y endulzar la energía.</p>
                        <p class="text-dorado-nuevo fw-bold fs-5 mb-3">$4.800</p>
                        <a href="#" class="btn btn-dorado-principal w-100 mt-auto">Añadir al Carrito</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="tarjeta-producto shadow-sm h-100 d-flex flex-column">
                    <div class="contenedor-imagen">
                        <img src="{{ asset('img/fotos-productos/sahumerioPaloSantoRosas.jpg') }}" alt="Sahumerio Palo Santo y Rosas" class="img-fluid w-100">
                    </div>
                    <div class="p-4 text-center d-flex flex-column flex-grow-1">
                        <h5 class="font-serif fw-bold text-oliva-oscuro mb-2">Palo Santo y Rosas</h5>
                        <p class="small text-muted mb-3 flex-grow-1">Limpieza dulce. Sahumerio artesanal. Humo sagrado para purificar tu espacio y abrir el corazón.</p>
                        <p class="text-dorado-nuevo fw-bold fs-5 mb-3">$3.700</p>
                        <a href="#" class="btn btn-dorado-principal w-100 mt-auto">Añadir al Carrito</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="tarjeta-producto shadow-sm h-100 d-flex flex-column">
                    <div class="contenedor-imagen">
                        <img src="{{ asset('img/fotos-productos/sahumerioPaloSantoFresias.jpg') }}" alt="Sahumerio Palo Santo y Fresias" class="img-fluid w-100">
                    </div>
                    <div class="p-4 text-center d-flex flex-column flex-grow-1">
                        <h5 class="font-serif fw-bold text-oliva-oscuro mb-2">Palo Santo y Fresias</h5>
                        <p class="small text-muted mb-3 flex-grow-1">Frescura y renovación. Humo sagrado por Sagrada Madre para limpiar tu espacio y levantar la energía.</p>
                        <p class="text-dorado-nuevo fw-bold fs-5 mb-3">$5.400</p>
                        <a href="#" class="btn btn-dorado-principal w-100 mt-auto">Añadir al Carrito</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="tarjeta-producto shadow-sm h-100 d-flex flex-column">
                    <div class="contenedor-imagen">
                        <span class="badge-holistico" style="background-color: #a68253;">Ideal Regalo</span>
                        <img src="{{ asset('img/fotos-productos/kitAuraSuave.png') }}" alt="Kit Aura Suave" class="img-fluid w-100">
                    </div>
                    <div class="p-4 text-center d-flex flex-column flex-grow-1">
                        <h5 class="font-serif fw-bold text-oliva-oscuro mb-2">Kit Aura Suave</h5>
                        <p class="small text-muted mb-3 flex-grow-1">Equilibra tu energía. Kit con productos para crear un ambiente armonioso y revitalizante.</p>
                        <p class="text-dorado-nuevo fw-bold fs-5 mb-3">$29.000</p>
                        <a href="#" class="btn btn-dorado-principal w-100 mt-auto">Añadir al Carrito</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="tarjeta-producto shadow-sm h-100 d-flex flex-column">
                    <div class="contenedor-imagen">
                        <img src="{{ asset('img/fotos-productos/kitArcilla.jpg') }}" alt="Kit Arcilla" class="img-fluid w-100">
                    </div>
                    <div class="p-4 text-center d-flex flex-column flex-grow-1">
                        <h5 class="font-serif fw-bold text-oliva-oscuro mb-2">Kit Arcilla</h5>
                        <p class="small text-muted mb-3 flex-grow-1">Pausa terrenal. Kit de limpieza energética con piezas de arcilla, salvia y palo santo.</p>
                        <p class="text-dorado-nuevo fw-bold fs-5 mb-3">$31.000</p>
                        <a href="#" class="btn btn-dorado-principal w-100 mt-auto">Añadir al Carrito</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="tarjeta-producto shadow-sm h-100 d-flex flex-column">
                    <div class="contenedor-imagen">
                        <span class="badge-holistico">Nuevo</span>
                        <img src="{{ asset('img/fotos-productos/jaspe.jpg') }}" alt="Piedra Jaspe" class="img-fluid w-100">
                    </div>
                    <div class="p-4 text-center d-flex flex-column flex-grow-1">
                        <h5 class="font-serif fw-bold text-oliva-oscuro mb-2">Piedra Jaspe</h5>
                        <p class="small text-muted mb-3 flex-grow-1">Piedra de la tierra. Poderosa para la limpieza energética y el equilibrio. Ideal para rituales.</p>
                        <p class="text-dorado-nuevo fw-bold fs-5 mb-3">$2.700</p>
                        <a href="#" class="btn btn-dorado-principal w-100 mt-auto">Añadir al Carrito</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="tarjeta-producto shadow-sm h-100 d-flex flex-column">
                    <div class="contenedor-imagen">
                        <img src="{{ asset('img/fotos-productos/cuarzoAuraAngel.jpg') }}" alt="Cuarzo Aura Angel" class="img-fluid w-100">
                    </div>
                    <div class="p-4 text-center d-flex flex-column flex-grow-1">
                        <h5 class="font-serif fw-bold text-oliva-oscuro mb-2">Cuarzo Aura Angel</h5>
                        <p class="small text-muted mb-3 flex-grow-1">Luz y suavidad lunar. Cristales opalescentes pulidos para conectar con tu intuición y calma.</p>
                        <p class="text-dorado-nuevo fw-bold fs-5 mb-3">$2.400</p>
                        <a href="#" class="btn btn-dorado-principal w-100 mt-auto">Añadir al Carrito</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="tarjeta-producto shadow-sm h-100 d-flex flex-column">
                    <div class="contenedor-imagen">
                        <img src="{{ asset('img/fotos-productos/amatista.jpg') }}" alt="Amatista" class="img-fluid w-100">
                    </div>
                    <div class="p-4 text-center d-flex flex-column flex-grow-1">
                        <h5 class="font-serif fw-bold text-oliva-oscuro mb-2">Amatista</h5>
                        <p class="small text-muted mb-3 flex-grow-1">Piedra transmutadora. Poderosa para la limpieza energética y el equilibrio. Ideal para meditar.</p>
                        <p class="text-dorado-nuevo fw-bold fs-5 mb-3">$3.100</p>
                        <a href="#" class="btn btn-dorado-principal w-100 mt-auto">Añadir al Carrito</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="tarjeta-producto shadow-sm h-100 d-flex flex-column">
                    <div class="contenedor-imagen">
                        <img src="{{ asset('img/fotos-productos/aceiteRosas.jpg') }}" alt="Aceite de Rosas" class="img-fluid w-100">
                    </div>
                    <div class="p-4 text-center d-flex flex-column flex-grow-1">
                        <h5 class="font-serif fw-bold text-oliva-oscuro mb-2">Aceite de Rosas</h5>
                        <p class="small text-muted mb-3 flex-grow-1">Aceite esencial de rosas para hidratación y rejuvenecimiento. Ideal para rutinas de cuidado personal.</p>
                        <p class="text-dorado-nuevo fw-bold fs-5 mb-3">$2.860</p>
                        <a href="#" class="btn btn-dorado-principal w-100 mt-auto">Añadir al Carrito</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="tarjeta-producto shadow-sm h-100 d-flex flex-column">
                    <div class="contenedor-imagen">
                        <img src="{{ asset('img/fotos-productos/aceiteNaranja.jpg') }}" alt="Aceite de Naranja" class="img-fluid w-100">
                    </div>
                    <div class="p-4 text-center d-flex flex-column flex-grow-1">
                        <h5 class="font-serif fw-bold text-oliva-oscuro mb-2">Aceite de Naranja</h5>
                        <p class="small text-muted mb-3 flex-grow-1">Alegría cítrica. Aceite esencial puro de naranja dulce. Vitalidad, frescura y energía positiva en cada gota.</p>
                        <p class="text-dorado-nuevo fw-bold fs-5 mb-3">$3.000</p>
                        <a href="#" class="btn btn-dorado-principal w-100 mt-auto">Añadir al Carrito</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="tarjeta-producto shadow-sm h-100 d-flex flex-column">
                    <div class="contenedor-imagen">
                        <img src="{{ asset('img/fotos-productos/oráculoDeLaIntuicion.jpg') }}" alt="Oráculo de la Intuición" class="img-fluid w-100">
                    </div>
                    <div class="p-4 text-center d-flex flex-column flex-grow-1">
                        <h5 class="font-serif fw-bold text-oliva-oscuro mb-2">Oráculo de la Intuición</h5>
                        <p class="small text-muted mb-3 flex-grow-1">Inspiración diaria. Oráculo de bolsillo con mensajes claros y arte vibrante para despertar tu intuición.</p>
                        <p class="text-dorado-nuevo fw-bold fs-5 mb-3">$12.500</p>
                        <a href="#" class="btn btn-dorado-principal w-100 mt-auto">Añadir al Carrito</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="tarjeta-producto shadow-sm h-100 d-flex flex-column">
                    <div class="contenedor-imagen">
                        <img src="{{ asset('img/fotos-productos/oraculoDDiosas.jpg') }}" alt="Oráculo de las Diosas" class="img-fluid w-100">
                    </div>
                    <div class="p-4 text-center d-flex flex-column flex-grow-1">
                        <h5 class="font-serif fw-bold text-oliva-oscuro mb-2">Oráculo de las Diosas</h5>
                        <p class="small text-muted mb-3 flex-grow-1">Poder femenino. Oráculo de bolsillo con símbolos sagrados y mensajes inspiradores para guiar tu camino.</p>
                        <p class="text-dorado-nuevo fw-bold fs-5 mb-3">$15.000</p>
                        <a href="#" class="btn btn-dorado-principal w-100 mt-auto">Añadir al Carrito</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="tarjeta-producto shadow-sm h-100 d-flex flex-column">
                    <div class="contenedor-imagen">
                        <img src="{{ asset('img/fotos-productos/aceiteManzanilla.jpg') }}" alt="Aceite de Manzanilla" class="img-fluid w-100">
                    </div>
                    <div class="p-4 text-center d-flex flex-column flex-grow-1">
                        <h5 class="font-serif fw-bold text-oliva-oscuro mb-2">Aceite de Manzanilla</h5>
                        <p class="small text-muted mb-3 flex-grow-1">Calma y confort. Aceite esencial puro de manzanilla para aliviar el estrés y promover el sueño profundo.</p>
                        <p class="text-dorado-nuevo fw-bold fs-5 mb-3">$2.000</p>
                        <a href="#" class="btn btn-dorado-principal w-100 mt-auto">Añadir al Carrito</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection