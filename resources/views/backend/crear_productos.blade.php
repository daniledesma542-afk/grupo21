@extends('plantilla')

@section('contenido')
<section class="py-5" style="background-color: var(--blanco-roto); min-height: 85vh;">
    <div class="container">

        <div class="text-center mb-5">
            <p class="hero-eyebrow">Panel administrativo</p>
            <h1 class="hero-titulo" style="color: var(--verde-oscuro);">
                Cargar nuevo <em>producto</em>
            </h1>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card-aesthetic p-5 shadow-sm">

                    <form action="/admin/productos" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf

                        <div class="mb-4">
                            <label for="nombre" class="form-label fw-semibold">
                                Nombre del producto *
                            </label>
                            <input type="text"
                                   class="form-control @error('nombre') is-invalid @enderror"
                                   id="nombre"
                                   name="nombre"
                                   value="{{ old('nombre') }}"
                                   required
                                   placeholder="Ej: Tarot de Marsella">
                            @error('nombre')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="descripcion" class="form-label fw-semibold">
                                Descripción
                            </label>
                            <textarea class="form-control @error('descripcion') is-invalid @enderror"
                                      id="descripcion"
                                      name="descripcion"
                                      rows="4"
                                      placeholder="Detalles del producto...">{{ old('descripcion') }}</textarea>
                            @error('descripcion')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                           <label for="precio" class="form-label fw-semibold">
                                 Precio ($) *
                            </label>
                          {{-- Cambiamos type="number" por type="text" y borramos el step --}}
                         <input type="text"
                             class="form-control @error('precio') is-invalid @enderror"
                                   id="precio"
                                   name="precio"
                                   value="{{ old('precio') }}"
                                 required
                                  placeholder="Ej: 1500.50">
                             @error('precio')
                               <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                             @enderror
                           </div>

                            <div class="col-md-6">
                                <label for="stock" class="form-label fw-semibold">
                                    Stock *
                                </label>
                                <input type="number"
                                       class="form-control @error('stock') is-invalid @enderror"
                                       id="stock"
                                       name="stock"
                                       value="{{ old('stock') }}"
                                       required
                                       placeholder="Ej: 10">
                                @error('stock')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="categoria_id" class="form-label fw-semibold">
                                Categoría *
                            </label>
                            <select class="form-select @error('categoria_id') is-invalid @enderror"
                                    id="categoria_id"
                                    name="categoria_id"
                                    required>
                                <option value="" {{ old('categoria_id') == '' ? 'selected' : '' }}>Seleccione una categoría</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                                        {{ $categoria->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('categoria_id')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label for="imagen" class="form-label fw-semibold">
                                Foto del producto *
                            </label>
                            <input type="file"
                                   class="form-control @error('imagen') is-invalid @enderror"
                                   id="imagen"
                                   name="imagen"
                                   accept="image/*"
                                   required>
                            @error('imagen')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="d-flex gap-3">
                            <button type="submit"
                                    class="btn flex-fill text-white"
                                    style="background-color: var(--verde-medio); border:none; padding: 12px;">
                                Guardar producto
                            </button>

                            <a href="/admin"
                               class="btn flex-fill"
                               style="background-color: var(--beige); color: var(--verde-oscuro); padding: 12px;">
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