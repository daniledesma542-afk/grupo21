<?php $__env->startSection('contenido'); ?>
<div class="container mt-5 mb-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 style="font-family: 'Playfair Display', serif; color: var(--verde-oscuro);">
            Mi Catálogo
        </h2>

        <a href="<?php echo e(url('/admin/productos/crear')); ?>"
           class="btn text-white"
           style="background-color: var(--beige); color: var(--verde-oscuro) !important; font-weight: bold;">
            + Nuevo Producto
        </a>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="card shadow-sm" style="border: 1px solid rgba(212, 184, 150, 0.4);">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead style="background-color: var(--verde-oscuro); color: var(--crema);">
                    <tr>
                        <th class="p-3">Imagen</th>
                        <th class="p-3">Nombre</th>
                        <th class="p-3">Precio</th>
                        <th class="p-3">Stock</th>
                        <th class="p-3 text-center">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="p-3 align-middle">
                                <?php if($producto->imagen): ?>
                                    <img src="<?php echo e(asset($producto->imagen)); ?>"
                                         alt="<?php echo e($producto->nombre); ?>"
                                         style="width:70px; height:70px; object-fit:cover; border-radius:10px;">
                                <?php else: ?>
                                    <span class="text-muted">Sin foto</span>
                                <?php endif; ?>
                            </td>

                            <td class="p-3 align-middle">
                                <?php echo e($producto->nombre); ?>

                            </td>

                            <td class="p-3 align-middle">
                                $<?php echo e(number_format($producto->precio, 2, ',', '.')); ?>

                            </td>

                            <td class="p-3 align-middle">
                                <?php echo e($producto->stock); ?> un.
                            </td>

                            <td class="p-3 align-middle text-center">

                                
                                <a href="<?php echo e(url('/admin/productos/' . $producto->id . '/editar')); ?>"
                                   class="btn btn-sm me-2"
                                   style="background-color: var(--verde-medio); color:white;">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>

                                
                                <form action="<?php echo e(url('/admin/productos/' . $producto->id)); ?>"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('¿Seguro que querés eliminar este producto?');">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>

                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i> Eliminar
                                    </button>
                                </form>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5" class="text-center p-4 text-muted">
                                Todavía no cargaste ningún producto.
                                ¡Hacé clic en "Nuevo Producto" para empezar!
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>

            </table>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Usuario-1\Documents\Herd\grupo21\resources\views/backend/productos.blade.php ENDPATH**/ ?>