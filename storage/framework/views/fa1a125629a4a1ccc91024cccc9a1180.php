

<?php $__env->startSection('contenido'); ?>
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

                    <form action="/admin/productos/<?php echo e($producto->id); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="mb-4">
                            <label class="form-label">Nombre</label>
                            <input type="text"
                                   class="form-control"
                                   name="nombre"
                                   value="<?php echo e($producto->nombre); ?>"
                                   required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Descripción</label>
                            <textarea class="form-control"
                                      name="descripcion"
                                      rows="4"><?php echo e($producto->descripcion); ?></textarea>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Precio</label>
                                <input type="number"
                                       step="0.01"
                                       class="form-control"
                                       name="precio"
                                       value="<?php echo e($producto->precio); ?>"
                                       required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Stock</label>
                                <input type="number"
                                       class="form-control"
                                       name="stock"
                                       value="<?php echo e($producto->stock); ?>"
                                       required>
                            </div>
                        </div>

                        <?php if($producto->imagen): ?>
                            <div class="mb-4 text-center">
                                <p>Imagen actual:</p>
                                <img src="<?php echo e(asset($producto->imagen)); ?>"
                                     style="width:150px; border-radius:12px;">
                            </div>
                        <?php endif; ?>
                            <div class="mb-4">
                                <label for="categoria_id" class="form-label fw-semibold">
                                    Categoría
                                </label>

                                <select class="form-select"
                                        id="categoria_id"
                                        name="categoria_id"
                                        required>

                                    <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($categoria->id); ?>"
                                            <?php echo e($producto->categoria_id == $categoria->id ? 'selected' : ''); ?>>
                                            <?php echo e($categoria->nombre); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Cambiar imagen (opcional)</label>
                            <input type="file"
                                   class="form-control"
                                   name="imagen"
                                   accept="image/*">
                        </div>

                        <div class="d-flex gap-3">
                            <button type="submit"
                                    class="btn flex-fill text-white"
                                    style="background-color: var(--verde-medio);">
                                Guardar cambios
                            </button>

                            <a href="/admin/productos"
                               class="btn flex-fill"
                               style="background-color: var(--beige); color: var(--verde-oscuro);">
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
<?php echo $__env->make('plantilla', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Usuario\Herd\grupo21\resources\views/backend/editar_productos.blade.php ENDPATH**/ ?>