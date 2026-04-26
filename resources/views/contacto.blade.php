@extends('plantilla')

@section('contenido')
<section class="seccion-contacto py-5">
    <div class="container py-5">
        <div class="row gx-lg-5">
            
            <div class="col-lg-5 mb-5 mb-lg-0 pe-lg-5">
                <h1 class="display-4 font-serif text-oliva mb-3 fw-bold">Envianos un mensaje</h1>
                <p class="font-sans-serif text-muted mb-5" style="line-height: 1.6;">
                    Podés usar el formulario para comunicarte directamente con nuestro equipo. Estamos acá para responder tus consultas y acompañarte.
                </p>

                <div class="info-legal text-oliva">
                    <h5 class="font-serif fw-bold mb-3 border-bottom border-dorado pb-2 d-inline-block">Información Legal</h5>
                    <ul class="list-unstyled font-sans-serif mt-2 mb-4">
                        <li class="mb-2"><strong>Titular:</strong> Ledesma Daniela, Krynski Sirley</li>
                        <li class="mb-2"><strong>Razón Social:</strong> Ondas de Sanación S.A.</li>
                        <li class="mb-2"><strong>Domicilio:</strong> </li>
                    </ul>

                    <h5 class="font-serif fw-bold mb-3 border-bottom border-dorado pb-2 d-inline-block">Contacto Directo</h5>
                    <ul class="list-unstyled font-sans-serif mt-2">
                        <li class="mb-2"><strong>Teléfono:</strong> +54 9 379 4637214</li>
                        <li class="mb-2"><strong>Email:</strong> ondas.de.sanacion@gmail.com.ar</li>
                    </ul>

                    <div class="d-flex gap-4 mt-4">
                        <a href="#" class="text-oliva fs-4 transition-hover"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="text-oliva fs-4 transition-hover"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-oliva fs-4 transition-hover"><i class="bi bi-whatsapp"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <form action="#" method="POST" class="formulario-estetico">
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label font-serif fw-bold text-oliva">Nombre</label>
                            <input type="text" class="form-control form-control-custom" placeholder="Tu nombre">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label font-serif fw-bold text-oliva">Apellido</label>
                            <input type="text" class="form-control form-control-custom" placeholder="Tu apellido">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label font-serif fw-bold text-oliva">Correo Electrónico</label>
                        <input type="email" class="form-control form-control-custom" placeholder="tu@email.com">
                    </div>

                    <div class="mb-3">
                        <label class="form-label font-serif fw-bold text-oliva">Número de Teléfono</label>
                        <input type="tel" class="form-control form-control-custom" placeholder="Código de área + número">
                    </div>

                    <div class="mb-4">
                        <label class="form-label font-serif fw-bold text-oliva">Dejanos tu consulta</label>
                        <textarea class="form-control form-control-custom" rows="5" placeholder="Escribí acá tu mensaje..."></textarea>
                    </div>

                    <button type="submit" class="btn btn-oliva-full w-100 py-3 font-sans-serif text-uppercase fw-bold letter-spacing-2">Enviar Mensaje</button>
                </form>
            </div>

        </div>
    </div>
</section>
@endsection