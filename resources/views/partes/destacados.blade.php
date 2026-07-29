<section class="py-5" style="background-color:#f7f5ef;">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold font-serif text-oliva-oscuro">
                Productos destacados
            </h2>
        </div>

        @if(isset($productosDestacados) && $productosDestacados->count() > 0)

            <div id="carouselDestacados" class="carousel slide" data-bs-ride="carousel">

                <div class="carousel-inner">

                    @foreach($productosDestacados->chunk(4) as $grupoIndex => $grupo)
                        <div class="carousel-item {{ $grupoIndex === 0 ? 'active' : '' }}">
                            <div class="row g-4">

                                @foreach($grupo as $producto)
                                    <div class="col-6 col-md-3">
                                        <div class="tarjeta-producto shadow-sm h-100 d-flex flex-column">

                                            <a href="{{ route('producto.detalle', $producto->id) }}"
                                               class="text-decoration-none"
                                               style="color: inherit;">
                                                <img src="{{ asset($producto->imagen) }}"
                                                     alt="{{ $producto->nombre }}"
                                                     class="img-fluid"
                                                     style="width:100%; height:220px; object-fit:cover;">

                                                <div class="p-3 text-center d-flex flex-column flex-grow-1">
                                                    <h6 class="fw-bold">
                                                        {{ $producto->nombre }}
                                                    </h6>

                                                    <p class="fw-bold text-dorado-nuevo">
                                                        ${{ number_format($producto->precio, 2, ',', '.') }}
                                                    </p>
                                                </div>
                                            </a>

                                            <div class="px-3 pb-3 mt-auto">
                                                @auth
                                                    @if(auth()->user()->rol->nombre === 'admin')
                                                        <button class="btn w-100" disabled
                                                                style="background:#d9d9d9; color:#666; cursor:not-allowed;">
                                                            Vista de administrador
                                                        </button>
                                                    @else
                                                        <form action="{{ route('carrito.agregar') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                                                            <input type="hidden" name="cantidad" value="1">

                                                            <button type="submit" class="btn btn-dorado-principal w-100">
                                                                Añadir al carrito
                                                            </button>
                                                        </form>
                                                    @endif
                                                @else
                                                    <a href="{{ route('login') }}" class="btn btn-dorado-principal w-100">
                                                        Iniciar sesión
                                                    </a>
                                                @endauth
                                            </div>

                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    @endforeach

                </div>

                @if($productosDestacados->count() > 4)
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselDestacados" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bg-dark rounded-circle p-3"></span>
                    </button>

                    <button class="carousel-control-next" type="button" data-bs-target="#carouselDestacados" data-bs-slide="next">
                        <span class="carousel-control-next-icon bg-dark rounded-circle p-3"></span>
                    </button>
                @endif

            </div>

        @else
            <div class="text-center py-4">
                <p class="text-muted">
                    Todavía no hay productos destacados disponibles.
                </p>
            </div>
        @endif

        <div class="text-center mt-5">
            <a href="{{ route('productos.index') }}" class="btn btn-dorado-principal px-5 py-3">
                Ver catálogo completo
            </a>
        </div>

    </div>
</section>