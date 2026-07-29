<?php $__env->startSection('contenido'); ?>
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

                    <form action="/admin/productos" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <div class="mb-4">
                            <label for="nombre" class="form-label fw-semibold">
                                Nombre del producto
                            </label>
                            <input type="text"
                                   class="form-control"
                                   id="nombre"
                                   name="nombre"
                                   required
                                   placeholder="Ej: Tarot de Marsella">
                        </div>

                        <div class="mb-4">
                            <label for="descripcion" class="form-label fw-semibold">
                                Descripción
                            </label>
                            <textarea class="form-control"
                                      id="descripcion"
                                      name="descripcion"
                                      rows="4"
                                      placeholder="Detalles del producto..."></textarea>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label for="precio" class="form-label fw-semibold">
                                    Precio ($)
                                </label>
                                <input type="number"
                                       step="0.01"
                                       class="form-control"
                                       id="precio"
                                       name="precio"
                                       required
                                       placeholder="0.00">
                            </div>

                            <div class="col-md-6">
                                <label for="stock" class="form-label fw-semibold">
                                    Stock
                                </label>
                                <input type="number"
                                       class="form-control"
                                       id="stock"
                                       name="stock"
                                       required
                                       placeholder="Ej: 10">
                            </div>
                        </div>

                        <div class="mb-5">
                            <label for="imagen" class="form-label fw-semibold">
                                Foto del producto
                            </label>
                            <input type="file"
                                   class="form-control"
                                   id="imagen"
                                   name="imagen"
                                   accept="image/*"
                                   required>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Usuario\Herd\grupo21\resources\views/backend/crear_productos.blade.php ENDPATH**/ ?>