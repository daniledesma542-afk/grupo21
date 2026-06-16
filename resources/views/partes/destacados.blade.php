<section class="py-5" style="background-color:#f7f5ef;">
    <div class="container">

        <!-- TITULO -->
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold font-serif text-oliva-oscuro">
                Productos destacados
            </h2>
        </div>

        <!-- CARRUSEL -->
        <div id="carouselDestacados" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-inner">

                <!-- SLIDE 1 -->
                <div class="carousel-item active">
                    <div class="row g-4">

                        <!-- Producto -->
                        <div class="col-6 col-md-3">
                            <div class="tarjeta-producto shadow-sm h-100 d-flex flex-column">
                                <img src="{{ asset('img/fotos-productos/1781475826_velaCanela.jpg') }}" class="img-fluid">
                                <div class="p-3 text-center d-flex flex-column flex-grow-1">
                                    <h6 class="fw-bold">Vela Canela</h6>
                                    <p class="fw-bold text-dorado-nuevo">$16.700</p>
                                    <a href="{{ route('carrito') }}" class="btn btn-dorado-principal mt-auto">
                                        Añadir al carrito
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-md-3">
                            <div class="tarjeta-producto shadow-sm h-100 d-flex flex-column">
                                <img src="{{ asset('img/fotos-productos/velaEucalipto.jpg') }}" class="img-fluid">
                                <div class="p-3 text-center d-flex flex-column flex-grow-1">
                                    <h6 class="fw-bold">Vela Eucalipto</h6>
                                    <p class="fw-bold text-dorado-nuevo">$14.900</p>
                                    <a href="{{ route('carrito') }}" class="btn btn-dorado-principal mt-auto">
                                        Añadir al carrito
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-md-3">
                            <div class="tarjeta-producto shadow-sm h-100 d-flex flex-column">
                                <img src="{{ asset('img/fotos-productos/178147518_tarotRider.jpg') }}" class="img-fluid">
                                <div class="p-3 text-center d-flex flex-column flex-grow-1">
                                    <h6 class="fw-bold">Tarot Rider</h6>
                                    <p class="fw-bold text-dorado-nuevo">$11.200</p>
                                    <a href="{{ route('carrito') }}" class="btn btn-dorado-principal mt-auto">
                                        Añadir al carrito
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-md-3">
                            <div class="tarjeta-producto shadow-sm h-100 d-flex flex-column">
                                <img src="{{ asset('img/fotos-productos/1781476478_amatista.jpg') }}" class="img-fluid">
                                <div class="p-3 text-center d-flex flex-column flex-grow-1">
                                    <h6 class="fw-bold">Amatista</h6>
                                    <p class="fw-bold text-dorado-nuevo">$3.100</p>
                                    <a href="{{ route('carrito') }}" class="btn btn-dorado-principal mt-auto">
                                        Añadir al carrito
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- SLIDE 2 -->
                <div class="carousel-item">
                    <div class="row g-4">

                        <div class="col-6 col-md-3">
                            <div class="tarjeta-producto shadow-sm h-100 d-flex flex-column">
                                <img src="{{ asset('img/fotos-productos/1781476265_kitAuraSuave.png') }}" class="img-fluid">
                                <div class="p-3 text-center d-flex flex-column flex-grow-1">
                                    <h6 class="fw-bold">Kit Aura Suave</h6>
                                    <p class="fw-bold text-dorado-nuevo">$29.000</p>
                                    <a href="{{ route('carrito') }}" class="btn btn-dorado-principal mt-auto">
                                        Añadir al carrito
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-md-3">
                            <div class="tarjeta-producto shadow-sm h-100 d-flex flex-column">
                                <img src="{{ asset('img/fotos-productos/1781476384_jaspe.jpg') }}" class="img-fluid">
                                <div class="p-3 text-center d-flex flex-column flex-grow-1">
                                    <h6 class="fw-bold">Piedra Jaspe</h6>
                                    <p class="fw-bold text-dorado-nuevo">$2.700</p>
                                    <a href="{{ route('carrito') }}" class="btn btn-dorado-principal mt-auto">
                                        Añadir al carrito
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-md-3">
                            <div class="tarjeta-producto shadow-sm h-100 d-flex flex-column">
                                <img src="{{ asset('img/fotos-productos/1781476565_aceiteRosas.jpg') }}" class="img-fluid">
                                <div class="p-3 text-center d-flex flex-column flex-grow-1">
                                    <h6 class="fw-bold">Aceite Rosas</h6>
                                    <p class="fw-bold text-dorado-nuevo">$2.860</p>
                                    <a href="{{ route('carrito') }}" class="btn btn-dorado-principal mt-auto">
                                        Añadir al carrito
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-md-3">
                            <div class="tarjeta-producto shadow-sm h-100 d-flex flex-column">
                                <img src="{{ asset('img/fotos-productos/1781476738_oraculoDDiosas.jpg') }}" class="img-fluid">
                                <div class="p-3 text-center d-flex flex-column flex-grow-1">
                                    <h6 class="fw-bold">Oráculo Diosas</h6>
                                    <p class="fw-bold text-dorado-nuevo">$15.000</p>
                                    <a href="{{ route('carrito') }}" class="btn btn-dorado-principal mt-auto">
                                        Añadir al carrito
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <!-- FLECHAS -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselDestacados" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-dark rounded-circle p-3"></span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#carouselDestacados" data-bs-slide="next">
                <span class="carousel-control-next-icon bg-dark rounded-circle p-3"></span>
            </button>

        </div>

        <div class="text-center mt-5">
            <a href="{{ url('/productos') }}" class="btn btn-dorado-principal px-5 py-3">
                Ver catálogo completo
            </a>
        </div>

    </div>
</section>