@extends('plantilla')

@section('contenido')
<section class="py-5" style="background-color: var(--blanco-roto); min-height: 85vh;">
    <div class="container">
        <div class="text-center mb-5">
            <p class="hero-eyebrow">Panel administrativo</p>
            <h1 class="hero-titulo" style="color: var(--verde-oscuro);">
                Editar <em>producto</em>
            </h1>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card-aesthetic p-5 shadow-sm">

                   <form action="/admin/productos/{{ $producto->id }}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Nombre *</label>
                            <input type="text"
                                   class="form-control @error('nombre') is-invalid @enderror"
                                   name="nombre"
                                   value="{{ old('nombre', $producto->nombre) }}"
                                   required>
                            @error('nombre')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Descripción</label>
                            <textarea class="form-control @error('descripcion') is-invalid @enderror"
                                      name="descripcion"
                                      rows="4">{{ old('descripcion', $producto->descripcion) }}</textarea>
                            @error('descripcion')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="col-md-6">
    <label class="form-label fw-semibold">Precio *</label>
    {{-- Cambiamos type="number" por type="text" y borramos el step --}}
    <input type="text"
           class="form-control @error('precio') is-invalid @enderror"
           name="precio"
           value="{{ old('precio', $producto->precio) }}"
           required
           placeholder="Ej: 1500.50">
    @error('precio')
        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
    @enderror
</div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Stock *</label>
                                <input type="number"
                                       class="form-control @error('stock') is-invalid @enderror"
                                       name="stock"
                                       value="{{ old('stock', $producto->stock) }}"
                                       required>
                                @error('stock')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        @if($producto->imagen)
                            <div class="mb-4 text-center">
                                <p class="fw-semibold">Imagen actual:</p>
                                <img src="{{ asset($producto->imagen) }}"
                                     style="width:150px; border-radius:12px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                            </div>
                        @endif

                        <div class="mb-4">
                            <label for="categoria_id" class="form-label fw-semibold">
                                Categoría *
                            </label>

                            <select class="form-select @error('categoria_id') is-invalid @enderror"
                                    id="categoria_id"
                                    name="categoria_id"
                                    required>
                                <option value="">Seleccione una categoría</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}"
                                        {{ old('categoria_id', $producto->categoria_id) == $categoria->id ? 'selected' : '' }}>
                                        {{ $categoria->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('categoria_id')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Cambiar imagen (opcional)</label>
                            <input type="file"
                                   class="form-control @error('imagen') is-invalid @enderror"
                                   name="imagen"
                                   accept="image/*">
                            @error('imagen')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="d-flex gap-3 mt-5">
                            <button type="submit"
                                    class="btn flex-fill text-white"
                                    style="background-color: var(--verde-medio); border:none; padding: 12px;">
                                Guardar cambios
                            </button>

                            <a href="/admin/productos"
                               class="btn flex-fill"
                               style="background-color: var(--beige); color: var(--verde-oscuro); padding: 12px; text-decoration: none; text-align: center;">
                                Cancelar
                            </a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection