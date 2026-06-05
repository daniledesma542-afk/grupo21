@extends('plantilla')

@section('contenido')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-0">Cargar Nuevo Producto</h4>
                </div>
                <div class="card-body">
                    <form action="/admin/productos" method="POST" enctype="multipart/form-data">
                        @csrf 

                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre del Producto</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required placeholder="Ej: Tarot de Marsella">
                        </div>

                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Detalles del producto..."></textarea>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="precio" class="form-label">Precio ($)</label>
                                <input type="number" step="0.01" class="form-control" id="precio" name="precio" required placeholder="0.00">
                            </div>
                            <div class="col-md-6">
                                <label for="stock" class="form-label">Cantidad en Stock</label>
                                <input type="number" class="form-control" id="stock" name="stock" required placeholder="Ej: 10">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="imagen" class="form-label">Foto del Producto</label>
                            <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" required>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success btn-lg">Guardar Producto</button>
                            <a href="/admin" class="btn btn-secondary">Cancelar y volver</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection