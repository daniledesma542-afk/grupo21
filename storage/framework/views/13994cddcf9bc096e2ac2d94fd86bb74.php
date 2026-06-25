<?php $__env->startSection('contenido'); ?>
<div class="container mt-5 mb-5">
    
    
    <div class="mb-4">
        <a href="<?php echo e(route('productos')); ?>" class="text-decoration-none" style="color: var(--verde-oscuro); font-weight: bold;">
            <i class="bi bi-arrow-left"></i> Volver al catálogo
        </a>
    </div>

    <div class="card shadow-sm border-0" style="background-color: #f7f5ef;">
        <div class="row g-0 align-items-center">
            
            
            <div class="col-md-6 text-center p-4">
                <?php if($producto->imagen): ?>
                    <img src="<?php echo e(asset($producto->imagen)); ?>" class="img-fluid rounded" alt="<?php echo e($producto->nombre); ?>" style="max-height: 450px; object-fit: cover;">
                <?php else: ?>
                    <img src="<?php echo e(asset('img/placeholder.jpg')); ?>" class="img-fluid rounded" alt="Sin imagen">
                <?php endif; ?>
            </div>

            
            <div class="col-md-6 p-5">
                
                
                <span class="badge mb-2" style="background-color: var(--verde-medio); color: var(--crema);">
                    <?php echo e($producto->categoria->nombre ?? 'Producto'); ?>

                </span>

                <h1 style="font-family: 'Playfair Display', serif; color: var(--verde-oscuro); font-weight: bold;">
                    <?php echo e($producto->nombre); ?>

                </h1>
                
                <h3 class="mb-4" style="color: var(--verde-oscuro);">
                    $<?php echo e(number_format($producto->precio, 2, ',', '.')); ?>

                </h3>

                <p class="fs-5 text-muted mb-4">
                    <?php echo e($producto->descripcion ?? 'Este producto no tiene una descripción detallada por el momento.'); ?>

                </p>

                <hr style="border-color: var(--beige);">

                <div class="d-flex align-items-center mt-4">
                    <p class="mb-0 me-4">
                        <strong>Stock disponible:</strong> 
                        <span class="<?php echo e($producto->stock > 0 ? 'text-success' : 'text-danger'); ?>">
                            <?php echo e($producto->stock); ?> unidades
                        </span>
                    </p>
                </div>

                
                <div class="mt-4">
                    <?php if(auth()->guard()->check()): ?>
                        <?php if(auth()->user()->rol->nombre === 'admin'): ?>

                            <button class="btn mt-2 w-100" disabled
                                    style="background:#d9d9d9; color:#666; cursor:not-allowed;">
                                Vista de administrador
                            </button>

                        <?php else: ?>

                            <?php if($producto->stock > 0): ?>
                                <form action="<?php echo e(route('carrito.agregar')); ?>" method="POST" class="d-flex align-items-center gap-3">
                                    <?php echo csrf_field(); ?>

                                    <input type="hidden" name="producto_id" value="<?php echo e($producto->id); ?>">

                                    <div style="width: 100px;">
                                        <input type="number"
                                            name="cantidad"
                                            class="form-control text-center"
                                            value="1"
                                            min="1"
                                            max="<?php echo e($producto->stock); ?>">
                                    </div>

                                    <button type="submit" class="btn"
                                            style="background-color: var(--verde-oscuro); color: var(--crema); font-weight: bold; padding: 10px 30px;">
                                        <i class="bi bi-cart-plus"></i> Agregar al Carrito
                                    </button>
                                </form>
                            <?php else: ?>
                                <button class="btn btn-secondary w-100 p-3" disabled>
                                    <i class="bi bi-x-circle"></i> Sin Stock
                                </button>
                            <?php endif; ?>

                        <?php endif; ?>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>" class="btn w-100"
                        style="background-color: var(--verde-oscuro); color: var(--crema); font-weight: bold; padding: 10px 30px;">
                            Iniciar sesión para comprar
                        </a>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Usuario\Herd\grupo21\resources\views/detalle_producto.blade.php ENDPATH**/ ?>