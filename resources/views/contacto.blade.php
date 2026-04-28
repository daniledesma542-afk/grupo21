@extends('plantilla')

@section('contenido')
<section class="seccion-contacto py-5">
    <div class="container py-5">

        <div class="row gx-lg-5">

            <!-- IZQUIERDA -->
            <div class="col-lg-5 mb-5 mb-lg-0 pe-lg-5">

                <span class="text-dorado text-uppercase fw-bold letter-spacing-2 mb-2 d-block">
                    Contacto
                </span>

                <h1 class="display-4 font-serif text-oliva mb-3 fw-bold">
                    Envíanos un mensaje
                </h1>

                <p class="texto-suave mb-4" style="line-height:1.7;">
                    Podés usar el formulario para comunicarte directamente con nuestro equipo.
                    Estamos acá para responder tus consultas y acompañarte.
                </p>

                <!-- INFO LEGAL -->
                <div class="card card-aesthetic p-4 mb-4 card-hover">

                    <h5 class="fw-bold mb-3">Información Legal</h5>

                    <ul class="list-unstyled texto-suave mb-0">
                        <li class="mb-2"><strong>Titular:</strong> Ledesma Daniela, Krynski Sirley</li>
                        <li class="mb-2"><strong>Razón Social:</strong> Ondas de Sanación S.A.</li>
                        <li class="mb-0"><strong>Domicilio:</strong> 9 de Julio 1234, Corrientes</li>
                    </ul>

                </div>

                <!-- CONTACTO -->
                <div class="card card-aesthetic p-4 card-hover">

                    <h5 class="fw-bold mb-3">Contacto Directo</h5>

                    <ul class="list-unstyled texto-suave mb-4">
                        <li class="mb-2"><strong>Teléfono:</strong> +54 9 379 4637214</li>
                        <li class="mb-0"><strong>Email:</strong> ondas.de.sanacion@gmail.com.ar</li>
                    </ul>

                    <div class="d-flex gap-3">
                        <a href="#" class="icono-social"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="icono-social"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="icono-social"><i class="bi bi-whatsapp"></i></a>
                    </div>

                </div>

            </div>

            <!-- DERECHA -->
            <div class="col-lg-7">

                <div class="card card-aesthetic p-4 p-md-5">

                    <form action="{{ route('contacto.enviar') }}" method="POST">
                         @csrf
                        @if ($errors->any())
                        <div class="alert alert-danger mb-4">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="row g-3 mb-3">

                            <div class="col-md-6">
                                <label class="form-label fw-bold text-oliva">Nombre</label>
                                <input type="text" name="nombre" value="{{ old('nombre') }}"
                                class="form-control form-control-custom" placeholder="Tu nombre">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold text-oliva">Apellido</label>
                               <input type="text" name="apellido" value="{{ old('apellido') }}"
                                class="form-control form-control-custom" placeholder="Tu apellido">
                            </div>

                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold text-oliva">Correo Electrónico</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                            class="form-control form-control-custom" placeholder="correo@email.com">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold text-oliva">Número de Teléfono</label>
                            <input type="tel" name="telefono" value="{{ old('telefono') }}"
                            class="form-control form-control-custom" placeholder="Código de área + número">
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold text-oliva">Dejanos tu consulta</label>
                            <textarea class="form-control form-control-custom" name="mensaje" rows="5" placeholder="Escribí acá tu mensaje...">{{ old('mensaje') }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primario w-100 py-3">
                            Enviar Mensaje
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>
</section>
@endsection