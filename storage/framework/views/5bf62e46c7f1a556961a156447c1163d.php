<?php $__env->startSection('contenido'); ?>
<section class="py-5" style="background-color: var(--blanco-roto); min-height: 80vh;">
    <div class="container">

        
        <div class="text-center mb-5">
            <h1 class="hero-titulo">
                Mis <em>Pedidos</em>
            </h1>

            <p class="texto-suave">
                Consultá el historial de tus compras.
            </p>
        </div>

        <?php if($pedidos->count() > 0): ?>

            <?php $__currentLoopData = $pedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card-aesthetic card-hover p-4 mb-4">

                    <div class="row align-items-center text-center text-md-start">

                        
                        <div class="col-md-3 mb-3 mb-md-0">
                            <small class="text-muted d-block">Pedido</small>
                            <h5 class="mb-0" style="color: var(--verde-oscuro);">
                                #<?php echo e($pedido->id); ?>

                            </h5>
                        </div>

                        
                        <div class="col-md-3 mb-3 mb-md-0">
                            <small class="text-muted d-block">Fecha</small>
                            <span style="color: var(--verde-oscuro);">
                                <?php echo e($pedido->fecha_venta->format('d/m/Y H:i')); ?>

                            </span>
                        </div>

                        
                        <div class="col-md-3 mb-3 mb-md-0">
                            <small class="text-muted d-block">Total</small>
                            <strong style="font-size: 1.1rem; color: var(--verde-medio);">
                                $<?php echo e(number_format($pedido->total, 2, ',', '.')); ?>

                            </strong>
                        </div>

                        
                        <div class="col-md-3">
                            <small class="text-muted d-block mb-2">Estado</small>
                            <span class="badge px-3 py-2"
                                  style="background-color: var(--verde-medio); color: var(--crema); border-radius: 20px;">
                                <?php switch($pedido->estado):
                                    case ('pendiente_pago'): ?>
                                        Pendiente de Pago
                                        <?php break; ?>

                                    <?php case ('pagado'): ?>
                                        Pagado
                                        <?php break; ?>

                                    <?php case ('preparando'): ?>
                                        Preparando
                                        <?php break; ?>

                                    <?php case ('enviado'): ?>
                                        Enviado
                                        <?php break; ?>

                                    <?php case ('entregado'): ?>
                                        Entregado
                                        <?php break; ?>

                                    <?php case ('cancelado'): ?>
                                        Cancelado
                                        <?php break; ?>
                                <?php endswitch; ?>
                            </span>
                        </div>
                            
                           
                        <div class="text-end mt-3 d-flex justify-content-end gap-2">
                            <a href="<?php echo e(route('cliente.pedido.ticket', $pedido->id)); ?>" 
                               class="btn btn-sm d-flex align-items-center gap-1" 
                               style="border: 2px solid var(--verde-oscuro); color: var(--verde-oscuro); background-color: transparent; font-weight: 500;">
                                <i class="bi bi-file-earmark-pdf"></i> Ticket
                            </a>

                            <a href="<?php echo e(route('cliente.pedido.detalle', $pedido->id)); ?>"
                               class="btn btn-sm d-flex align-items-center"
                               style="background-color: var(--beige); color: var(--verde-oscuro); font-weight: 500;">
                                Ver detalle
                            </a>
                        </div>
                    </div>

                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php else: ?>
            <div class="text-center py-5">
                <i class="bi bi-box-seam"
                   style="font-size: 4rem; color: var(--beige);"></i>

                <h4 class="mt-3 text-muted">
                    Todavía no realizaste compras
                </h4>

                <p class="texto-suave">
                    Cuando hagas tu primera compra, aparecerá aquí.
                </p>

                <a href="/productos" class="btn-primario mt-3">
                    Ir al catálogo
                </a>
            </div>
        <?php endif; ?>

    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Usuario\Herd\grupo21\resources\views/backend/usuarios/pedidos.blade.php ENDPATH**/ ?>