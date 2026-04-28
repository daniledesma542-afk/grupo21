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
                        <li><a href="#">Sahumerios y Resinas</a></li>
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
                    <span class="font-sans-serif small text-muted">Mostrando 9 productos</span>
                </div>

                <div class="row g-4">
                    <div class="col-md-6 col-xl-4">
                        <div class="tarjeta-producto shadow-sm">
                            <div class="contenedor-imagen">
                                <span class="badge-holistico">Nuevo</span>
                                <img src="https://via.placeholder.com/400x400" alt="Vela Soja" class="img-fluid">
                            </div>
                            <div class="p-4 text-center">
                                <h5 class="font-serif fw-bold text-oliva-oscuro mb-2">Vela de Soja "Calma"</h5>
                                <p class="text-dorado-nuevo fw-bold fs-5 mb-3">$2.500</p>
                                <a href="#" class="btn btn-dorado-principal w-100">Ver Detalles</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-4">
                        <div class="tarjeta-producto shadow-sm">
                            <div class="contenedor-imagen">
                                <img src="https://via.placeholder.com/400x400" alt="Cuarzo Rosa" class="img-fluid">
                            </div>
                            <div class="p-4 text-center">
                                <h5 class="font-serif fw-bold text-oliva-oscuro mb-2">Punta de Cuarzo Rosa</h5>
                                <p class="text-dorado-nuevo fw-bold fs-5 mb-3">$3.200</p>
                                <a href="#" class="btn btn-dorado-principal w-100">Ver Detalles</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-4">
                        <div class="tarjeta-producto shadow-sm">
                            <div class="contenedor-imagen">
                                <span class="badge-holistico bg-oliva">Oferta</span>
                                <img src="https://via.placeholder.com/400x400" alt="Aceite Lavanda" class="img-fluid">
                            </div>
                            <div class="p-4 text-center">
                                <h5 class="font-serif fw-bold text-oliva-oscuro mb-2">Aceite de Lavanda</h5>
                                <p class="text-dorado-nuevo fw-bold fs-5 mb-3">$1.800</p>
                                <a href="#" class="btn btn-dorado-principal w-100">Ver Detalles</a>
                            </div>
                        </div>
                    </div>
                    
                    </div>
            </main>

        </div>
    </div>
</section>
@endsection