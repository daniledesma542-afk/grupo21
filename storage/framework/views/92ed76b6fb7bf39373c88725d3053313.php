<section class="py-5" style="background-color:#f7f5ef;">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold font-serif text-oliva-oscuro">
                Productos destacados
            </h2>
        </div>

        <?php if(isset($productosDestacados) && $productosDestacados->count() > 0): ?>

            <div id="carouselDestacados" class="carousel slide" data-bs-ride="carousel">

                <div class="carousel-inner">

                    <?php $__currentLoopData = $productosDestacados->chunk(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grupoIndex => $grupo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="carousel-item <?php echo e($grupoIndex === 0 ? 'active' : ''); ?>">
                            <div class="row g-4">

                                <?php $__currentLoopData = $grupo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-6 col-md-3">
                                        <div class="tarjeta-producto shadow-sm h-100 d-flex flex-column">

                                            <a href="<?php echo e(route('producto.detalle', $producto->id)); ?>"
                                               class="text-decoration-none"
                                               style="color: inherit;">
                                                <img src="<?php echo e(asset($producto->imagen)); ?>"
                                                     alt="<?php echo e($producto->nombre); ?>"
                                                     class="img-fluid"
                                                     style="width:100%; height:220px; object-fit:cover;">

                                                <div class="p-3 text-center d-flex flex-column flex-grow-1">
                                                    <h6 class="fw-bold">
                                                        <?php echo e($producto->nombre); ?>

                                                    </h6>

                                                    <p class="fw-bold text-dorado-nuevo">
                                                        $<?php echo e(number_format($producto->precio, 2, ',', '.')); ?>

                                                    </p>
                                                </div>
                                            </a>

                                            <div class="px-3 pb-3 mt-auto">
                                                <?php if(auth()->guard()->check()): ?>
                                                    <?php if(auth()->user()->rol->nombre === 'admin'): ?>
                                                        <button class="btn w-100" disabled
                                                                style="background:#d9d9d9; color:#666; cursor:not-allowed;">
                                                            Vista de administrador
                                                        </button>
                                                    <?php else: ?>
                                                        <form action="<?php echo e(route('carrito.agregar')); ?>" method="POST">
                                                            <?php echo csrf_field(); ?>
                                                            <input type="hidden" name="producto_id" value="<?php echo e($producto->id); ?>">
                                                            <input type="hidden" name="cantidad" value="1">

                                                            <button type="submit" class="btn btn-dorado-principal w-100">
                                                                Añadir al carrito
                                                            </button>
                                                        </form>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <a href="<?php echo e(route('login')); ?>" class="btn btn-dorado-principal w-100">
                                                        Iniciar sesión
                                                    </a>
                                                <?php endif; ?>
                                            </div>

                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>

                <?php if($productosDestacados->count() > 4): ?>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselDestacados" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bg-dark rounded-circle p-3"></span>
                    </button>

                    <button class="carousel-control-next" type="button" data-bs-target="#carouselDestacados" data-bs-slide="next">
                        <span class="carousel-control-next-icon bg-dark rounded-circle p-3"></span>
                    </button>
                <?php endif; ?>

            </div>

        <?php else: ?>
            <div class="text-center py-4">
                <p class="text-muted">
                    Todavía no hay productos destacados disponibles.
                </p>
            </div>
        <?php endif; ?>

        <div class="text-center mt-5">
            <a href="<?php echo e(route('productos.index')); ?>" class="btn btn-dorado-principal px-5 py-3">
                Ver catálogo completo
            </a>
        </div>

    </div>
</section><?php /**PATH C:\Users\Usuario\Herd\grupo21\resources\views/partes/destacados.blade.php ENDPATH**/ ?>