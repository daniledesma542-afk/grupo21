@extends('plantilla')

@section('contenido')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2 class="mb-4 text-center" style="font-family: 'Playfair Display', serif; color: var(--verde-oscuro);">Tu Carrito de Sanación</h2>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @if(isset($items) && $items->count() > 0)
                <div class="card shadow-sm" style="border: 1px solid var(--beige);">
                    <div class="card-body p-0">
                        <table class="table mb-0">
                            <thead style="background-color: var(--verde-oscuro); color: var(--crema);">
                                <tr>
                                    <th class="p-3">Producto</th>
                                    <th class="p-3 text-center">Cantidad</th>
                                    <th class="p-3">Precio Un.</th>
                                    <th class="p-3">Subtotal</th>
                                    <th class="p-3 text-center">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                    <tr>
                                        <td class="p-3 align-middle fw-bold" style="color: var(--verde-oscuro);">{{ $item->producto->nombre }}</td>
                                        <td class="p-3 align-middle text-center">{{ $item->cantidad }}</td>
                                        <td class="p-3 align-middle">${{ number_format($item->precio_unitario, 2, ',', '.') }}</td>
                                        <td class="p-3 align-middle">${{ number_format($item->subtotal, 2, ',', '.') }}</td>
                                        <td class="p-3 align-middle text-center">
                                            <form method="POST" action="{{ route('carrito.eliminar', $item->id) }}" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Eliminar del carrito"><i class="bi bi-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot style="background-color: #f8f9fa;">
                                <tr>
                                    <td colspan="3" class="text-end p-3 fw-bold fs-5">TOTAL:</td>
                                    <td colspan="2" class="p-3 fw-bold fs-5" style="color: var(--verde-oscuro);">${{ number_format($carrito->total, 2, ',', '.') }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <form method="POST" action="{{ route('carrito.confirmar') }}">
                        @csrf
                        <button type="submit" class="btn px-4 py-2 fs-5" style="background-color: var(--verde-oscuro); color: var(--crema);">
                            Confirmar Compra <i class="bi bi-check-circle ms-2"></i>
                        </button>
                    </form>
                </div>
            @else
                <div class="text-center py-5">
                    <i class="bi bi-bag-x" style="font-size: 4rem; color: var(--beige);"></i>
                    <h4 class="mt-3 text-muted">Tu carrito está vacío</h4>
                    <a href="{{ url('/productos') }}" class="btn mt-3 text-dark" style="background-color: var(--beige);">Volver a la tienda</a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection