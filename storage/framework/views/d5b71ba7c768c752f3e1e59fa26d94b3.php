

<?php $__env->startSection('contenido'); ?>
<section class="py-5" style="background-color: var(--blanco-roto); min-height: 85vh;">
    <div class="container">

        <div class="text-center mb-5">
            <p class="hero-eyebrow">Administración</p>
            <h1 class="hero-titulo">
                Gestión de <em>Pedidos</em>
            </h1>
        </div>
        <div class="card-aesthetic p-4 mb-4">
    <form method="GET" action="<?php echo e(route('admin.pedidos')); ?>">
        <div class="row g-3 align-items-end">

            <div class="col-md-4">
                <label class="form-label">Cliente</label>
                <input type="text"
                       name="cliente"
                       class="form-control"
                       value="<?php echo e(request('cliente')); ?>"
                       placeholder="Buscar por nombre">
            </div>

                <div class="col-md-3">
                    <label class="form-label">Estado</label>
                    <select name="estado" class="form-control">
                        <option value="">Todos</option>
                        <option value="pendiente_pago" <?php echo e(request('estado') == 'pendiente_pago' ? 'selected' : ''); ?>>
                            Pendiente pago
                        </option>
                        <option value="pagado" <?php echo e(request('estado') == 'pagado' ? 'selected' : ''); ?>>
                            Pagado
                        </option>
                        <option value="cancelado" <?php echo e(request('estado') == 'cancelado' ? 'selected' : ''); ?>>
                            Cancelado
                        </option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Fecha</label>
                    <input type="date"
                        name="fecha"
                        class="form-control"
                        value="<?php echo e(request('fecha')); ?>">
                </div>

                     <div class="col-md-2">
                        <button type="submit" class="btn-primario w-100 mb-2">
                            Filtrar
                        </button>

                        <a href="<?php echo e(route('admin.pedidos')); ?>"
                        class="btn btn-secondary w-100">
                            Limpiar
                        </a>
                    </div>

            </div>
        </form>
    </div>
        <?php if($pedidos->count() > 0): ?>

            <?php $__currentLoopData = $pedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card-aesthetic p-4 mb-4 card-hover">
                    <div class="row align-items-center">

                        <div class="col-md-2">
                            <small class="text-muted">Pedido</small>
                            <h5>#<?php echo e($pedido->id); ?></h5>
                        </div>

                        <div class="col-md-3">
                            <small class="text-muted">Cliente</small>
                            <div><?php echo e($pedido->usuario->nombre); ?></div>
                        </div>

                        <div class="col-md-2">
                            <small class="text-muted">Fecha</small>
                            <div>
                                <?php echo e($pedido->fecha_venta ? $pedido->fecha_venta->format('d/m/Y') : '-'); ?>

                            </div>
                        </div>

                        <div class="col-md-2">
                            <small class="text-muted">Total</small>
                            <div>
                                $<?php echo e(number_format($pedido->total, 2, ',', '.')); ?>

                            </div>
                        </div>

                        <div class="col-md-3 text-end">
                            <span class="badge px-3 py-2"
                                  style="background-color: var(--verde-medio); color:white;">
                                <?php echo e(ucfirst($pedido->estado)); ?>

                            </span>
                        </div>
                        <div class="mt-3 text-end">
                            <a href="<?php echo e(route('admin.pedidos.show', $pedido->id)); ?>"
                            class="btn btn-sm"
                            style="background-color: var(--beige); color: var(--verde-oscuro);">
                                Ver detalle
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php else: ?>
            <div class="text-center py-5">
                <h4>No hay pedidos todavía</h4>
            </div>
        <?php endif; ?>

    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Usuario\Herd\grupo21\resources\views/backend/admin/pedidos.blade.php ENDPATH**/ ?>