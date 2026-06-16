@extends('plantilla')

@section('contenido')
<div class="container py-5">
    <h2 class="font-serif text-oliva-oscuro mb-4">Gestión de Ventas</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive shadow-sm rounded bg-white p-3">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>N° Pedido</th>
                    <th>Fecha</th>
                    <th>ID Cliente</th>
                    <th>Total</th>
                    <th>Estado Actual</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ventas as $venta)
                <tr>
                    <td class="fw-bold">#{{ $venta->id }}</td>
                    <td>{{ \Carbon\Carbon::parse($venta->fecha_venta)->format('d/m/Y H:i') }}</td>
                    <td>{{ $venta->user_id }}</td>
                    <td class="text-dorado-nuevo fw-bold">${{ number_format($venta->total, 2, ',', '.') }}</td>
                    <td>
                        <span class="badge 
                            @if($venta->estado == 'confirmado') bg-warning text-dark 
                            @elseif($venta->estado == 'en preparacion') bg-info text-dark 
                            @elseif($venta->estado == 'enviado') bg-primary 
                            @elseif($venta->estado == 'recibido') bg-success 
                            @endif">
                            {{ strtoupper($venta->estado) }}
                        </span>
                    </td>
                    <td>
                        <!-- Formulario para cambiar el estado -->
                        <form action="{{ route('admin.ventas.estado', $venta->id) }}" method="POST" class="d-flex">
                            @csrf
                            <select name="estado" class="form-select form-select-sm me-2" required>
                                <option value="confirmado" {{ $venta->estado == 'confirmado' ? 'selected' : '' }}>Confirmado (Nueva)</option>
                                <option value="en preparacion" {{ $venta->estado == 'en preparacion' ? 'selected' : '' }}>En Preparación</option>
                                <option value="enviado" {{ $venta->estado == 'enviado' ? 'selected' : '' }}>Enviado</option>
                                <option value="recibido" {{ $venta->estado == 'recibido' ? 'selected' : '' }}>Recibido</option>
                            </select>
                            <button type="submit" class="btn btn-sm btn-dorado-principal">Actualizar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                
                @if($ventas->isEmpty())
                <tr>
                    <td colspan="6" class="text-center py-4 text-muted">Aún no hay ventas registradas.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection