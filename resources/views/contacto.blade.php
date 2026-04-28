@extends('plantilla')

@section('contenido')
<section class="seccion-contacto-nueva py-5">
    <div class="container py-5">
        <div class="row gx-lg-5">

            <div class="col-lg-5 mb-5 mb-lg-0 pe-lg-4 text-oliva-oscuro">
                
                <h1 class="display-3 font-serif mb-3 fw-bold">Envíanos un <br>mensaje</h1>
                
                <p class="font-sans-serif mb-5" style="line-height:1.7; font-size: 1.05rem;">
                    Podés usar el formulario para comunicarte directamente con nuestro equipo.
                    Estamos acá para responder tus consultas y acompañarte.
                </p>

                <div class="tarjeta-contacto p-4 mb-4 shadow-sm">
                    <h4 class="font-serif fw-bold mb-3">Información Legal</h4>
                    <ul class="list-unstyled font-sans-serif mb-0" style="font-size: 0.95rem; line-height: 2;">
                        <li><strong class="fw-bold">Titular:</strong> Ledesma Daniela, Krynski Sirley</li>
                        <li><strong class="fw-bold">Razón Social:</strong> Ondas de Sanación S.A.</li>
                        <li><strong class="fw-bold">Domicilio:</strong> 9 de Julio 1234, Corrientes</li>
                    </ul>
                </div>

                <div class="tarjeta-contacto p-4 shadow-sm">
                    <h4 class="font-serif fw-bold mb-3">Contacto Directo</h4>
                    <ul class="list-unstyled font-sans-serif mb-4" style="font-size: 0.95rem; line-height: 2;">
                        <li><strong class="fw-bold">Teléfono:</strong> +54 9 379 4637214</li>
                        <li><strong class="fw-bold">Email:</strong> ondas.de.sanacion@gmail.com.ar</li>
                    </ul>
                    
                    <div class="d-flex gap-3">
                        <a href="#" class="icono-social-nuevo fs-5"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="icono-social-nuevo fs-5"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="icono-social-nuevo fs-5"><i class="bi bi-whatsapp"></i></a>
                    </div>
                </div>

            </div>

            <div class="col-lg-7">
                <div class="tarjeta-formulario-verde p-4 p-md-5 shadow-sm h-100">
                    <form action="{{ route('contacto.enviar') }}" method="POST">
                         @csrf
                         
                        @if ($errors->any())
                        <div class="alert alert-danger font-sans-serif mb-4" style="border-radius: 12px;">
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label font-sans-serif fw-bold text-crema small">Nombre</label>
                                <input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control form-control-nueva" placeholder="Tu nombre">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label font-sans-serif fw-bold text-crema small">Apellido</label>
                               <input type="text" name="apellido" value="{{ old('apellido') }}" class="form-control form-control-nueva" placeholder="Tu apellido">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label font-sans-serif fw-bold text-crema small">Correo Electrónico</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-nueva" placeholder="correo@email.com">
                        </div>

                        <div class="mb-4">
                            <label class="form-label font-sans-serif fw-bold text-crema small">Número de Teléfono</label>
                            <input type="tel" name="telefono" value="{{ old('telefono') }}" class="form-control form-control-nueva" placeholder="Código de área + número">
                        </div>

                        <div class="mb-4">
                            <label class="form-label font-sans-serif fw-bold text-crema small">Dejanos tu consulta</label>
                            <textarea class="form-control form-control-nueva" name="mensaje" rows="5" placeholder="Escribí acá tu mensaje...">{{ old('mensaje') }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-dorado-principal w-100 py-3 mt-2 font-sans-serif text-uppercase fw-bold letter-spacing-2">
                            Enviar Mensaje
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection