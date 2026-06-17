

<?php $__env->startSection('contenido'); ?>
<section class="py-5" style="background-color: var(--blanco-roto); min-height: 85vh;">
<div class="container">

    <div class="text-center mb-5">
        <h1 class="hero-titulo">
            Pedido <em>#<?php echo e($pedido->id); ?></em>
        </h1>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="card-aesthetic p-4 mb-4">

        <div class="row mb-4">
            <div class="col-md-4">
                <strong>Cliente:</strong><br>
                <?php echo e($pedido->usuario->nombre); ?>

            </div>

            <div class="col-md-4">
                <strong>Email:</strong><br>
                <?php echo e($pedido->usuario->email); ?>

            </div>

            <div class="col-md-4">
                <strong>Estado actual:</strong><br>
                <?php echo e(ucfirst(str_replace('_', ' ', $pedido->estado))); ?>

            </div>
        </div>

        <hr>

        <h4>Actualizar estado</h4>

        <form method="POST" action="<?php echo e(route('admin.pedidos.estado', $pedido->id)); ?>" class="mb-4">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="row align-items-end">
                <div class="col-md-8">
                    <label class="form-label">Nuevo estado</label>
                    <select name="estado" class="form-select">
                        <option value="pendiente_pago" <?php echo e($pedido->estado == 'pendiente_pago' ? 'selected' : ''); ?>>
                            Pendiente de pago
                        </option>

                        <option value="pagado" <?php echo e($pedido->estado == 'pagado' ? 'selected' : ''); ?>>
                            Pagado
                        </option>

                        <option value="enviado" <?php echo e($pedido->estado == 'enviado' ? 'selected' : ''); ?>>
                            Enviado
                        </option>

                        <option value="entregado" <?php echo e($pedido->estado == 'entregado' ? 'selected' : ''); ?>>
                            Entregado
                        </option>

                        <option value="cancelado" <?php echo e($pedido->estado == 'cancelado' ? 'selected' : ''); ?>>
                            Cancelado
                        </option>
                    </select>
                </div>

                <div class="col-md-4">
                    <button type="submit" class="btn w-100"
                            style="background-color: var(--verde-oscuro); color: white;">
                        Actualizar estado
                    </button>
                </div>
            </div>
        </form>

        <hr>

        <h4>Productos</h4>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Subtotal</th>
                </tr>
            </thead>

            <tbody>
                <?php $__currentLoopData = $pedido->detalles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detalle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($detalle->producto->nombre); ?></td>
                        <td><?php echo e($detalle->cantidad); ?></td>
                        <td>$<?php echo e(number_format($detalle->precio_unitario, 2, ',', '.')); ?></td>
                        <td>$<?php echo e(number_format($detalle->subtotal, 2, ',', '.')); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <div class="text-end mt-4">
            <h4>Total: $<?php echo e(number_format($pedido->total, 2, ',', '.')); ?></h4>
        </div>

    </div>
</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Usuario\Herd\grupo21\resources\views/backend/admin/detalle-pedido.blade.php ENDPATH**/ ?>