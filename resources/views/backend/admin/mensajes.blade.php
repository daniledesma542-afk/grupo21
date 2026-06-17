@extends('plantilla')

@section('contenido')
<section class="py-5" style="background-color: var(--blanco-roto); min-height: 80vh;">
    <div class="container">
        <h2 class="text-center mb-5" style="color: var(--verde-oscuro);">Mensajes de Clientes</h2>

        @if($mensajes->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead style="background-color: var(--verde-oscuro); color: var(--blanco-roto);">
                        <tr>
                            <th>Fecha</th>
                            <th>Nombre / Email</th>
                            <th>Asunto</th>
                            <th>Mensaje</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mensajes as $mensaje)
                            <tr class="{{ $mensaje->leido ? '' : 'table-warning' }}">
                                <td>{{ $mensaje->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <strong>{{ $mensaje->nombre }}</strong><br>
                                    <small>{{ $mensaje->email }}</small>
                                </td>
                                <td>{{ $mensaje->asunto }}</td>
                                <td>{{ Str::limit($mensaje->mensaje, 50) }}</td>
                                <td>
                                    @if($mensaje->leido)
                                        <span class="badge bg-success">Leído</span>
                                    @else
                                        <span class="badge bg-warning text-dark">Nuevo</span>
                                    @endif
                                </td>
                                <td>
                                    @if(!$mensaje->leido)
                                        <form action="{{ route('admin.mensaje.leido', $mensaje->id) }}" method="POST" class="d-inline">
                                            @csrf @method('PUT')
                                            <button type="submit" class="btn btn-sm btn-outline-success">Marcar leído</button>
                                        </form>
                                    @endif
                                    
                                    {{-- Botón de respuesta --}}
                                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalRespuesta{{$mensaje->id}}">
                                        Responder
                                    </button>
                                </td>
                            </tr>

                            {{-- Modal para responder --}}
                            <div class="modal fade" id="modalRespuesta{{$mensaje->id}}" tabindex="-1">
                                <div class="modal-dialog">
                                    <form action="{{ route('admin.mensaje.responder', $mensaje->id) }}" method="POST" class="modal-content">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title">Responder a {{ $mensaje->nombre }}</h5>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Mensaje recibido:</strong> {{ $mensaje->mensaje }}</p>
                                            <textarea name="respuesta" class="form-control" rows="4" required placeholder="Escribí tu respuesta aquí..."></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Enviar respuesta</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-5">
                <p>No hay mensajes nuevos.</p>
            </div>
        @endif
    </div>
</section>
@endsection