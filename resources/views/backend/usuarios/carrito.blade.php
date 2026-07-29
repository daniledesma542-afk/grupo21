@extends('plantilla')

@section('contenido')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-11">

            <h2 class="mb-4 text-center"
                style="font-family: 'Playfair Display', serif; color: var(--verde-oscuro);">
                Tu Carrito de Sanación
            </h2>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if(isset($items) && $items->count() > 0)

                <div class="card shadow-sm" style="border: 1px solid var(--beige);">
                    <div class="card-body p-0">
                        <table class="table mb-0 align-middle">
                            <thead style="background-color: var(--verde-oscuro); color: var(--crema);">
                                <tr>
                                    <th class="p-3">Producto</th>
                                    <th class="p-3 text-center">Cantidad</th>
                                    <th class="p-3">Precio Unitario</th>
                                    <th class="p-3">Subtotal</th>
                                    <th class="p-3 text-center">Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($items as $item)
                                    <tr>
                                        <td class="p-3 fw-bold" style="color: var(--verde-oscuro);">
                                            {{ optional($item->producto)->nombre ?? 'Producto no disponible' }}

                                            @if($item->producto)
                                                <div class="small text-muted">
                                                    Stock disponible: {{ $item->producto->stock }}
                                                </div>
                                            @endif
                                        </td>

                                        <td class="p-3 text-center" style="min-width: 160px;">
                                            <form method="POST"
                                                  action="{{ route('carrito.actualizar', $item->id) }}"
                                                  class="d-flex justify-content-center gap-2">
                                                @csrf
                                                @method('PUT')

                                                <input type="number"
                                                       name="cantidad"
                                                       value="{{ $item->cantidad }}"
                                                       min="1"
                                                       max="{{ optional($item->producto)->stock ?? 1 }}"
                                                       class="form-control text-center"
                                                       style="width: 80px;">

                                                <button type="submit"
                                                        class="btn btn-sm"
                                                        style="background-color: var(--verde-medio); color:white;">
                                                    Actualizar
                                                </button>
                                            </form>
                                        </td>

                                        <td class="p-3">
                                            ${{ number_format($item->precio_unitario, 2, ',', '.') }}
                                        </td>

                                        <td class="p-3 fw-bold">
                                            ${{ number_format($item->subtotal, 2, ',', '.') }}
                                        </td>

                                        <td class="p-3 text-center">
                                            <form method="POST"
                                                  action="{{ route('carrito.eliminar', $item->id) }}"
                                                  class="d-inline"
                                                  onsubmit="return confirm('¿Eliminar este producto del carrito?');">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="btn btn-sm btn-outline-danger"
                                                        title="Eliminar del carrito">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                            <tfoot style="background-color: #f8f9fa;">
                                <tr>
                                    <td colspan="3" class="text-end p-3 fw-bold fs-5">
                                        TOTAL:
                                    </td>
                                    <td colspan="2"
                                        class="p-3 fw-bold fs-5"
                                        style="color: var(--verde-oscuro);">
                                        ${{ number_format($carrito->total, 2, ',', '.') }}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mt-4">

                    <div class="d-flex gap-3">
                        <a href="{{ route('productos.index') }}"
                           class="btn"
                           style="border: 1px solid var(--verde-oscuro); color: var(--verde-oscuro); border-radius: 50px; padding: 10px 25px; font-family: 'Playfair Display', serif;">
                            <i class="bi bi-arrow-left"></i> Seguir comprando
                        </a>

                        <form action="{{ route('carrito.vaciar') }}"
                              method="POST"
                              onsubmit="return confirm('¿Seguro que querés vaciar todo el carrito?');">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-outline-danger"
                                    style="border-radius: 50px; padding: 10px 25px; font-family: 'Playfair Display', serif;">
                                Vaciar carrito
                            </button>
                        </form>
                    </div>

                    <form action="{{ route('carrito.confirmar') }}" method="POST">
                        @csrf

                        <button type="submit"
                                class="btn"
                                style="background-color: var(--verde-oscuro); color: white; border-radius: 50px; padding: 10px 25px; font-family: 'Playfair Display', serif;">
                            Confirmar Compra <i class="bi bi-check-circle"></i>
                        </button>
                    </form>

                </div>

            @else
                <div class="text-center py-5">
                    <i class="bi bi-bag-x"
                       style="font-size: 4rem; color: var(--beige);"></i>

                    <h4 class="mt-3 text-muted">
                        Tu carrito está vacío
                    </h4>

                    <a href="{{ route('productos.index') }}"
                       class="btn mt-3 text-dark"
                       style="background-color: var(--beige);">
                        Volver a la tienda
                    </a>
                </div>
            @endif

        </div>
    </div>
</div>
@endsection