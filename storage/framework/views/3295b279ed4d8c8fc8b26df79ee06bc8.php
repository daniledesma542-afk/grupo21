<?php $__env->startSection('contenido'); ?>
<section class="py-5" style="background-color: var(--blanco-roto); min-height: 80vh;">
    <div class="container">

        <div class="text-center mb-5">
            <h1 class="hero-titulo">
                Detalle del <em>Pedido</em>
            </h1>

            <p class="texto-suave">
                Pedido #<?php echo e($pedido->id); ?>

            </p>
        </div>

        <div class="card-aesthetic p-4 mb-4">

            <div class="row mb-4">
                <div class="col-md-4">
                    <strong>Fecha:</strong><br>
                    <?php echo e($pedido->fecha_venta->format('d/m/Y H:i')); ?>

                </div>

                <div class="col-md-4">
                    <strong>Estado:</strong><br>
                    <span class="badge px-3 py-2"
                          style="background-color: var(--verde-medio); color: white;">
                        <?php echo e(ucfirst($pedido->estado)); ?>

                    </span>
                </div>

                <div class="col-md-4">
                    <strong>Total:</strong><br>
                    $<?php echo e(number_format($pedido->total, 2, ',', '.')); ?>

                </div>
            </div>

            <hr>

            <h4 class="mb-4">Productos</h4>

            <table class="table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
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
                <a href="/cliente/pedidos" class="btn-primario">
                    Volver a pedidos
                </a>
            </div>

        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Usuario-1\Documents\Herd\grupo21\resources\views/backend/usuarios/detalle_pedido.blade.php ENDPATH**/ ?>