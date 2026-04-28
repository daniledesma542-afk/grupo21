@extends('plantilla')

@section('contenido')

<div class="container py-5">

    <div class="card card-aesthetic p-5 text-center">

        <h1 class="text-oliva mb-4">
            ¡Mensaje Enviado!
        </h1>

        <p class="texto-suave fs-5 mb-4">
            Hola <strong>{{ $nombre }}</strong>, gracias por comunicarte con
            <strong>Ondas de Sanación</strong>.
            Recibimos tu mensaje correctamente y en breve estaremos respondiéndote.
        </p>

        <a href="/contacto" class="btn btn-primario">
            Volver al contacto
        </a>

    </div>

</div>

@endsection