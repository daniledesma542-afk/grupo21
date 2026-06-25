@extends('plantilla')

@section('contenido')
<section class="py-5" style="background-color: var(--blanco-roto); min-height: 80vh;">
    <div class="container">

        <div class="mb-4">
            <a href="{{ route('admin.mensajes') }}"
               class="btn"
               style="border: 1px solid var(--verde-oscuro); color: var(--verde-oscuro); border-radius: 50px; padding: 10px 25px;">
                <i class="bi bi-arrow-left"></i> Volver a mensajes
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card-aesthetic p-4">

            <div class="d-flex justify-content-between align-items-start mb-4">
                <div>
                    <p class="hero-eyebrow">Consulta recibida</p>

                    <h1 class="hero-titulo" style="color: var(--verde-oscuro);">
                        {{ $mensaje->nombre }}
                    </h1>

                    <p class="texto-suave mb-1">
                        <strong>Email:</strong> {{ $mensaje->email }}
                    </p>

                    <p class="texto-suave mb-1">
                        <strong>Asunto:</strong> {{ $mensaje->asunto }}
                    </p>

                    <p class="texto-suave mb-0">
                        <strong>Fecha:</strong> {{ $mensaje->created_at->format('d/m/Y H:i') }}
                    </p>
                </div>

                <div>
                    @if($mensaje->leido)
                        <span class="badge bg-success px-3 py-2">Leído</span>
                    @else
                        <span class="badge bg-warning text-dark px-3 py-2">Nuevo</span>
                    @endif
                </div>
            </div>

            <hr>

            <div class="mb-4">
                <h4 style="font-family: 'Playfair Display', serif; color: var(--verde-oscuro);">
                    Mensaje
                </h4>

                <div class="p-3"
                     style="background-color:#f7f5ef; border-radius: 12px; border: 1px solid var(--beige);">
                    <p class="mb-0" style="white-space: pre-line;">
                        {{ $mensaje->mensaje }}
                    </p>
                </div>
            </div>

            @if(!$mensaje->leido)
                <form method="POST"
                      action="{{ route('admin.mensaje.leido', $mensaje->id) }}"
                      class="mb-4">
                    @csrf
                    @method('PUT')

                    <button type="submit"
                            class="btn"
                            style="background-color: var(--verde-medio); color:white;">
                        Marcar como leído
                    </button>
                </form>
            @endif

            <hr>

            <div class="mt-4">
                <h4 style="font-family: 'Playfair Display', serif; color: var(--verde-oscuro);">
                    Respuesta del administrador
                </h4>

                @if($mensaje->respuesta)
                    <div class="p-3 mb-3"
                         style="background-color:#f7f5ef; border-left: 4px solid var(--verde-medio); border-radius: 12px;">
                        <p class="mb-0" style="white-space: pre-line;">
                            {{ $mensaje->respuesta }}
                        </p>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.mensaje.responder', $mensaje->id) }}">
                    @csrf

                    <textarea
                        name="respuesta"
                        class="form-control mb-3"
                        rows="4"
                        placeholder="Escribí una respuesta para dejar registrada..."
                        required>{{ old('respuesta') }}</textarea>

                    <button type="submit" class="btn-primario">
                        Guardar respuesta
                    </button>
                </form>
            </div>

        </div>

    </div>
</section>
@endsection