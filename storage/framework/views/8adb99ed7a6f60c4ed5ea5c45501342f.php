<?php $__env->startSection('contenido'); ?>
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <h2 class="mb-4 text-center"
                style="font-family: 'Playfair Display', serif; color: var(--verde-oscuro);">
                Tu Carrito de Sanación
            </h2>

            <?php if(session('success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <?php if(session('error')): ?>
                <div class="alert alert-danger">
                    <?php echo e(session('error')); ?>

                </div>
            <?php endif; ?>

            <?php if(isset($items) && $items->count() > 0): ?>

                <div class="card shadow-sm" style="border: 1px solid var(--beige);">
                    <div class="card-body p-0">
                        <table class="table mb-0">
                            <thead style="background-color: var(--verde-oscuro); color: var(--crema);">
                                <tr>
                                    <th class="p-3">Producto</th>
                                    <th class="p-3 text-center">Cantidad</th>
                                    <th class="p-3">Precio Unitario</th>
                                    <th class="p-3">Subtotal</th>
                                    <th class="p-3 text-center">Acción</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="p-3 align-middle fw-bold" style="color: var(--verde-oscuro);">
                                            <?php echo e(optional($item->producto)->nombre ?? 'PRODUCTO NULL'); ?>

                                        </td>

                                        <td class="p-3 align-middle text-center">
                                            <?php echo e($item->cantidad); ?>

                                        </td>

                                        <td class="p-3 align-middle">
                                            $<?php echo e(number_format($item->precio_unitario, 2, ',', '.')); ?>

                                        </td>

                                        <td class="p-3 align-middle">
                                            $<?php echo e(number_format($item->subtotal, 2, ',', '.')); ?>

                                        </td>

                                        <td class="p-3 align-middle text-center">
                                            <form method="POST"
                                                  action="<?php echo e(route('carrito.eliminar', $item->id)); ?>"
                                                  class="d-inline">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>

                                                <button type="submit"
                                                        class="btn btn-sm btn-outline-danger"
                                                        title="Eliminar del carrito">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>

                            <tfoot style="background-color: #f8f9fa;">
                                <tr>
                                    <td colspan="3" class="text-end p-3 fw-bold fs-5">
                                        TOTAL:
                                    </td>
                                    <td colspan="2"
                                        class="p-3 fw-bold fs-5"
                                        style="color: var(--verde-oscuro);">
                                        $<?php echo e(number_format($carrito->total, 2, ',', '.')); ?>

                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                
              <div class="d-flex justify-content-end gap-3 mt-4">
    
                     <a href="<?php echo e(route('productos')); ?>" class="btn" 
                        style="border: 1px solid var(--verde-oscuro); color: var(--verde-oscuro); border-radius: 50px; padding: 10px 25px; font-family: 'Playfair Display', serif; text-decoration: none; transition: 0.3s;">
                        <i class="bi bi-arrow-left"></i> Seguir comprando
                    </a>

                    <form action="<?php echo e(route('carrito.confirmar')); ?>" method="POST">
                       <?php echo csrf_field(); ?>
                       <button type="submit" class="btn" 
                               style="background-color: var(--verde-oscuro); color: white; border-radius: 50px; padding: 10px 25px; font-family: 'Playfair Display', serif; transition: 0.3s;">
                          Confirmar Compra <i class="bi bi-check-circle"></i>
                       </button>
                    </form>

                </div>
            <?php else: ?>
                <div class="text-center py-5">
                    <i class="bi bi-bag-x"
                       style="font-size: 4rem; color: var(--beige);"></i>

                    <h4 class="mt-3 text-muted">
                        Tu carrito está vacío
                    </h4>

                    <a href="<?php echo e(url('/productos')); ?>"
                       class="btn mt-3 text-dark"
                       style="background-color: var(--beige);">
                        Volver a la tienda
                    </a>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Usuario\Herd\grupo21\resources\views/backend/usuarios/carrito.blade.php ENDPATH**/ ?>