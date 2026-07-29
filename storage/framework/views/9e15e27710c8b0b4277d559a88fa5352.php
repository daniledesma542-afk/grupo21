<?php $__env->startSection('contenido'); ?>
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <div class="card shadow border-0" style="background-color: #f7f5ef;">
                <div class="card-body p-5">
                    <i class="bi bi-balloon-heart" style="font-size: 5rem; color: var(--verde-oscuro);"></i>
                    <h1 class="mt-4 mb-3" style="font-family: 'Playfair Display', serif; color: var(--verde-oscuro);">¡Gracias por tu compra!</h1>
                    <p class="fs-5 text-muted">Tu pedido fue confirmado exitosamente. Te enviaremos un mail con los detalles del envío.</p>
                    
                    <hr style="border-color: var(--beige); margin: 30px 0;">
                    
                    <h5 class="fw-bold mb-3">Resumen de tu pedido:</h5>
                    <ul class="list-group mb-4 text-start shadow-sm">
                        <?php $__currentLoopData = session('items'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?php echo e($item['nombre']); ?> (x<?php echo e($item['cantidad']); ?>)
                                <span>$<?php echo e(number_format($item['subtotal'], 2, ',', '.')); ?></span>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center fw-bold" style="background-color: var(--verde-oscuro); color: var(--crema);">
                            TOTAL A ABONAR
                            <span>$<?php echo e(number_format(session('total'), 2, ',', '.')); ?></span>
                        </li>
                    </ul>

                    <div class="d-flex justify-content-center gap-3">
                        <a href="<?php echo e(url('/productos')); ?>" class="btn" style="background-color: var(--beige); color: var(--verde-oscuro); font-weight: bold;">
                             Volver al Catálogo
                        </a>
    
                        <a href="<?php echo e(route('ticket.descargar')); ?>" class="btn" style="border: 2px solid var(--verde-oscuro); color: var(--verde-oscuro); font-weight: bold;">
                           <i class="bi bi-file-earmark-pdf"></i> Descargar Ticket
                        </a>
                    </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Usuario-1\Documents\Herd\grupo21\resources\views/backend/usuarios/compra-confirmada.blade.php ENDPATH**/ ?>