@extends('plantilla')

@section('contenido')
<section class="py-5" style="background-color: var(--blanco-roto); min-height: 80vh;">
    <div class="container">
        
        {{-- Botón para volver al Panel --}}
        <div class="mb-4">
            <a href="/admin" class="text-decoration-none" style="color: var(--verde-oscuro); font-weight: bold;">
                <i class="bi bi-arrow-left"></i> Volver al Dashboard
            </a>
        </div>

        <h2 class="text-center mb-5" style="color: var(--verde-oscuro); font-family: 'Playfair Display', serif;">
            Usuarios Registrados
        </h2>

        @if($usuarios->count() > 0)
            <div class="card-aesthetic shadow-sm p-4" style="background-color: white; border-radius: 15px;">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead style="background-color: var(--verde-oscuro); color: var(--crema);">
                            <tr>
                                <th>ID</th>
                                <th>Nombre Completo</th>
                                <th>Correo Electrónico</th>
                                <th>Rol</th>
                                <th>Fecha de Registro</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($usuarios as $usuario)
                                <tr>
                                    <td>#{{ $usuario->id }}</td>
                                    <td class="fw-bold" style="color: var(--verde-oscuro);">{{ $usuario->nombre }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>
                                        <span class="badge px-3 py-2" 
                                              style="background-color: {{ $usuario->rol->nombre == 'admin' ? 'var(--verde-oscuro)' : 'var(--verde-medio)' }}; border-radius: 20px;">
                                            {{ ucfirst($usuario->rol->nombre) }}
                                        </span>
                                    </td>
                                    <td>{{ $usuario->created_at->format('d/m/Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="text-center py-5">
                <i class="bi bi-people" style="font-size: 4rem; color: var(--verde-medio);"></i>
                <h4 class="mt-3 text-muted">Aún no hay usuarios registrados.</h4>
            </div>
        @endif
        
    </div>
</section>
@endsection