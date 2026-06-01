@extends('plantilla')

@section('contenido')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm" style="border: 1px solid var(--beige);">
                <div class="card-header text-white" style="background-color: var(--verde-oscuro);">
                    <h4 class="mb-0" style="font-family: 'Playfair Display', serif;">Cargar Nuevo Producto</h4>
                </div>
                <div class="card-body">
                    
                    <form action="{{ route('productos.store') }}" method="POST">
                        @csrf 
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nombre del producto</label>
                            <input type="text" name="nombre" class="form-control" required placeholder="Ej: Mazo Tarot Rider Waite">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Descripción</label>
                            <textarea name="descripcion" class="form-control" rows="3" placeholder="Detalles de la vela, cristal o mazo..."></textarea>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Precio ($)</label>
                                <input type="number" step="0.01" name="precio" class="form-control" required placeholder="Ej: 15000">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Stock disponible</label>
                                <input type="number" name="stock" class="form-control" required placeholder="Ej: 10">
                            </div>
                        </div>
                        
                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn text-white" style="background-color: var(--verde-oscuro);">Guardar Producto</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection