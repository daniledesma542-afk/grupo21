@extends('plantilla')

@section('contenido')
<section class="seccion-productos py-5">
    <div class="container-fluid px-lg-5">
        <div class="row">
            
            <aside class="col-lg-3 mb-5">
                <div class="sidebar-holistica p-4 shadow-sm">
                    <h4 class="font-serif fw-bold text-oliva-oscuro mb-4 border-bottom border-dorado-sutil pb-2">Categorías</h4>
                    
                    <ul class="list-unstyled categorias-lista">
                        <li><a href="#" class="active">Todos los Productos</a></li>
                        <li><a href="#">Velas Aromáticas</a></li>
                        <li><a href="#">Cristales y Piedras</a></li>
                        <li><a href="#">Aceites Esenciales</a></li>
                        <li><a href="#">Sahumerios</a></li>
                        <li><a href="#">Tarot y Oráculos</a></li>
                        <li><a href="#">Kits de Meditación</a></li>
                    </ul>

                    <div class="banner-sidebar mt-5 p-4 text-center text-crema">
                        <h5 class="font-serif">Envío Gratis</h5>
                        <p class="small mb-0">En compras mayores a $15.000</p>
                    </div>
                </div>
            </aside>

            <main class="col-lg-9">
                <div class="d-flex justify-content-between align-items-center mb-4 text-oliva-oscuro">
                    <h2 class="font-serif fw-bold">Nuestro Catálogo</h2>
                    <span class="font-sans-serif small text-muted">Mostrando 25 productos</span>
                </div>

              <div class="row g-4">
    
    <div class="col-md-6 col-xl-4">
        <div class="tarjeta-producto shadow-sm h-100 d-flex flex-column">
            <div class="contenedor-imagen">
                <span class="badge-holistico">Nuevo</span>
                <img src="{{ asset('img/fotos-productos/velaCanela.jpg') }}" alt="Vela de Canela" class="img-fluid w-100">
            </div>
            <div class="p-4 text-center d-flex flex-column flex-grow-1">
                <h5 class="font-serif fw-bold text-oliva-oscuro mb-2">Vela de Canela</h5>
                <p class="small text-muted mb-3 flex-grow-1">Calidez botánica. Vela especiada con notas de naranja, canela y anís estrellado. Hecha a mano para transformar y abrigar tu espacio.</p>
                <p class="text-dorado-nuevo fw-bold fs-5 mb-3">$16.700</p>
                <a href="#" class="btn btn-dorado-principal w-100 mt-auto">Añadir al Carrito</a>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-4">
        <div class="tarjeta-producto shadow-sm h-100 d-flex flex-column">
            <div class="contenedor-imagen">
                <img src="{{ asset('img/fotos-productos/velaEucalipto.jpg') }}" alt="Vela de Eucalipto" class="img-fluid w-100">
            </div>
            <div class="p-4 text-center d-flex flex-column flex-grow-1">
                <h5 class="font-serif fw-bold text-oliva-oscuro mb-2">Vela de Eucalipto</h5>
                <p class="small text-muted mb-3 flex-grow-1">Refugio natural. Notas botánicas de eucalipto y cedro en un diseño clásico ámbar. Aire limpio y frescura amaderada para acompañar tu día.</p>
                <p class="text-dorado-nuevo fw-bold fs-5 mb-3">$14.900</p>
                <a href="#" class="btn btn-dorado-principal w-100 mt-auto">Añadir al Carrito</a>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-4">
        <div class="tarjeta-producto shadow-sm h-100 d-flex flex-column">
            <div class="contenedor-imagen">
                <span class="badge-holistico bg-oliva">Más Vendido</span>
                <img src="{{ asset('img/fotos-productos/tarotRider.jpg') }}" alt="Tarot Rider" class="img-fluid w-100">
            </div>
            <div class="p-4 text-center d-flex flex-column flex-grow-1">
                <h5 class="font-serif fw-bold text-oliva-oscuro mb-2">Tarot Rider</h5>
                <p class="small text-muted mb-3 flex-grow-1">El clásico indiscutido. Tarot Rider-Waite. Simbología vintage, mensajes claros y la mejor puerta de entrada al mundo del tarot.</p>
                <p class="text-dorado-nuevo fw-bold fs-5 mb-3">$11.200</p>
                <a href="#" class="btn btn-dorado-principal w-100 mt-auto">Añadir al Carrito</a>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-4">
        <div class="tarjeta-producto shadow-sm h-100 d-flex flex-column">
            <div class="contenedor-imagen">
                <img src="{{ asset('img/fotos-productos/serpentina.jpg') }}" alt="Serpentina" class="img-fluid w-100">
            </div>
            <div class="p-4 text-center d-flex flex-column flex-grow-1">
                <h5 class="font-serif fw-bold text-oliva-oscuro mb-2">Serpentina</h5>
                <p class="small text-muted mb-3 flex-grow-1">Energía y arraigo. Piedra Serpentina natural. Tu aliada para desbloquear, sanar y volver a conectar con tu centro.</p>
                <p class="text-dorado-nuevo fw-bold fs-5 mb-3">$6.000</p>
                <a href="#" class="btn btn-dorado-principal w-100 mt-auto">Añadir al Carrito</a>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-4">
        <div class="tarjeta-producto shadow-sm h-100 d-flex flex-column">
            <div class="contenedor-imagen">
                <img src="{{ asset('img/fotos-productos/sahumerioRosasYOlibano.jpg') }}" alt="Sahumerio Rosas y Olíbano" class="img-fluid w-100">
            </div>
            <div class="p-4 text-center d-flex flex-column flex-grow-1">
                <h5 class="font-serif fw-bold text-oliva-oscuro mb-2">Sahumerio Rosas y Olíbano - Sagrada Madre</h5>
                <p class="small text-muted mb-3 flex-grow-1">Armonía y limpieza. Sahumerio natural de Rosas y Olíbano por Sagrada Madre. El equilibrio perfecto para purificar y endulzar la energía de tus espacios.</p>
                <p class="text-dorado-nuevo fw-bold fs-5 mb-3">$4.800</p>
                <a href="#" class="btn btn-dorado-principal w-100 mt-auto">Añadir al Carrito</a>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-4">
        <div class="tarjeta-producto shadow-sm h-100 d-flex flex-column">
            <div class="contenedor-imagen">
                <span class="badge-holistico bg-oliva">Ideal Regalo</span>
                <img src="{{ asset('img/fotos-productos/sahumerioPaloSantoRosas.jpg') }}" alt="Sahumerio Palo Santo y Rosas" class="img-fluid w-100">
            </div>
            <div class="p-4 text-center d-flex flex-column flex-grow-1">
                <h5 class="font-serif fw-bold text-oliva-oscuro mb-2">Sahumerio Palo Santo y Rosas - Sagrada Madre</h5>
                <p class="small text-muted mb-3 flex-grow-1">Limpieza dulce. Sahumerio artesanal de Palo Santo y Rosas. Humo sagrado para purificar tu espacio y abrir el corazón.</p>
                Frescura y renovación. Sahumerio artesanal de Palo Santo y Fresias. Humo sagrado para limpiar tu espacio y levantar la energía.
                <a href="#" class="btn btn-dorado-principal w-100 mt-auto">Añadir al Carrito</a>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="tarjeta-producto shadow-sm h-100 d-flex flex-column">
            <div class="contenedor-imagen">
                <img src="{{ asset('img/fotos-productos/sahumerioPaloSantoFresias.jpg') }}" alt="Sahumerio Palo Santo y Fresias" class="img-fluid w-100">
            </div>
            <div class="p-4 text-center d-flex flex-column flex-grow-1">
                <h5 class="font-serif fw-bold text-oliva-oscuro mb-2">Sahumerio Palo Santo y Fresias - Sagrada Madre</h5>
                <p class="small text-muted mb-3 flex-grow-1">Frescura y renovación. Sahumerio artesanal de Palo Santo y Fresias. Humo sagrado para limpiar tu espacio y levantar la energía.</p>
                <p class="text-dorado-nuevo fw-bold fs-5 mb-3">$5.400</p>
                <a href="#" class="btn btn-dorado-principal w-100 mt-auto">Añadir al Carrito</a>
            </div>
        </div>
    </div>


</div>


            </main>
        </div>
    </div>
</section>
@endsection