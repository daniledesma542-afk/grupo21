@extends('plantilla')

@section('contenido')
<section class="py-5" style="background-color: var(--blanco-roto); min-height: 85vh;">
    <div class="container">

        <div class="text-center mb-5">
            <p class="hero-eyebrow">Panel administrativo</p>
            <h1 class="hero-titulo" style="color: var(--verde-oscuro);">
                Administración de <em>Ondas de Sanación</em>
            </h1>
        </div>

        <div class="row g-4">

            <!-- PERFIL ADMIN -->
            <div class="col-lg-4">
                <div class="card-aesthetic h-100 p-4 text-center card-hover">
                    <div class="mb-3">
                        <i class="bi bi-person-circle" style="font-size: 4rem; color: var(--verde-medio);"></i>
                    </div>

                    <h4 style="font-family: 'Playfair Display', serif;">
                        {{ auth()->user()->nombre }}
                    </h4>

                    <p class="texto-suave mb-2">
                        {{ auth()->user()->email }}
                    </p>

                    <span class="badge px-3 py-2"
                          style="background-color: var(--verde-medio);">
                        {{ auth()->user()->rol->nombre }}
                    </span>
                </div>
            </div>

            <!-- PRODUCTOS -->
            <div class="col-lg-4">
                <div class="card-aesthetic h-100 p-4 text-center card-hover">
                    <i class="bi bi-box-seam icono-card mb-3"></i>

                    <h4 style="font-family: 'Playfair Display', serif;">
                        Productos
                    </h4>

                    <p class="texto-suave">
                        Cargá, editá y administrá el catálogo.
                    </p>

                    <a href="/admin/productos" class="btn-primario mt-3">
                        Gestionar
                    </a>
                </div>
            </div>

            <!-- PEDIDOS -->
            <div class="col-lg-4">
                <div class="card-aesthetic h-100 p-4 text-center card-hover">
                    <i class="bi bi-bag-check icono-card mb-3"></i>

                    <h4 style="font-family: 'Playfair Display', serif;">
                        Pedidos
                    </h4>

                    <p class="texto-suave">
                        Consultá ventas y actualizá estados.
                    </p>

                    <a href="{{ route('admin.pedidos') }}" class="btn-primario mt-3">
                        Ver pedidos
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection