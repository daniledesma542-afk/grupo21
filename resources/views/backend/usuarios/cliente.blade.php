@extends('plantilla')

@section('contenido')

<section class="py-5" style="background-color: var(--blanco-roto); min-height: 80vh;">
    <div class="container">

        <!-- Bienvenida -->
        <div class="text-center mb-5">
            <h1 class="hero-titulo">
                Bienvenida, <em>{{ auth()->user()->nombre }}</em>
            </h1>

            <p class="texto-suave">
                Gestioná tus compras y explorá nuestros productos holísticos.
            </p>
        </div>

        <div class="row">

            <!-- PERFIL -->
            <div class="col-lg-4 mb-4">

                <div class="card-aesthetic p-4 text-center h-100">

                    <div class="mb-3">
                        <i class="bi bi-person-circle"
                           style="font-size: 5rem; color: var(--verde-medio);"></i>
                    </div>

                    <h3 style="font-family: 'Playfair Display', serif;">
                        {{ auth()->user()->nombre }}
                    </h3>

                    <p class="texto-suave mb-3">
                        {{ auth()->user()->email }}
                    </p>

                    <span class="badge bg-oliva fs-6">
                        Cliente
                    </span>

                </div>

            </div>

            <!-- OPCIONES -->
            <div class="col-lg-8">

                <div class="row">

                    <!-- CARRITO -->
                    <div class="col-md-6 mb-4">

                        <div class="card-aesthetic card-hover h-100 p-4 text-center">

                            <div class="mb-3">
                                <i class="bi bi-cart3 icono-card"></i>
                            </div>

                            <h4 class="mb-3">
                                Mi Carrito
                            </h4>

                            <p class="texto-suave">
                                Revisá los productos que agregaste para tu próxima compra.
                            </p>

                            <a href="/carrito" class="btn-primario mt-3">
                                Ver carrito
                            </a>

                        </div>

                    </div>

                    <!-- PRODUCTOS -->
                    <div class="col-md-6 mb-4">

                        <div class="card-aesthetic card-hover h-100 p-4 text-center">

                            <div class="mb-3">
                                <i class="bi bi-flower1 icono-card"></i>
                            </div>

                            <h4 class="mb-3">
                                Productos
                            </h4>

                            <p class="texto-suave">
                                Descubrí nuestro catálogo de artículos para tu bienestar.
                            </p>

                            <a href="/productos" class="btn-primario mt-3">
                                Ver productos
                            </a>

                        </div>

                    </div>

                </div>

                <!-- CERRAR SESIÓN -->
                <div class="text-center mt-4">

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf

                        <button type="submit" class="btn"
                        style="background-color: var(--verde-oscuro);
                            color: var(--crema);
                            border: 1px solid var(--beige);">
                         Cerrar sesión
                    </button>
                    </form>

                </div>

            </div>

        </div>

    </div>
</section>

@endsection