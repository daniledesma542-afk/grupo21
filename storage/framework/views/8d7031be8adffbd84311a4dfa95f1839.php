<?php $__env->startSection('contenido'); ?>
<section class="py-5" style="background-color: var(--blanco-roto); min-height: 80vh;">
    <div class="container">

        
        <div class="text-center mb-5">
            <p class="hero-eyebrow">Nuestro catálogo</p>
            <h1 class="hero-titulo" style="color: var(--verde-oscuro);">Productos de <em>Sanación</em></h1>
            <p class="texto-suave">Elegí el producto que resuene con vos y comenzá tu camino de transformación.</p>
        </div>

        
        <div class="text-center mb-5">
            <div class="dropdown">
                <button class="btn btn-filtro-principal dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo e(request('categoria_id') ? \App\Models\Categoria::find(request('categoria_id'))->nombre : 'Filtrar por Categoría'); ?>

                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?php echo e(route('productos')); ?>">Todos</a></li>
                    <?php $__currentLoopData = \App\Models\Categoria::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a class="dropdown-item" href="<?php echo e(route('productos', ['categoria_id' => $cat->id])); ?>"><?php echo e($cat->nombre); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>

        
        <style>
            .btn-filtro-principal {
                background-color: transparent;
                border: 1px solid var(--verde-oscuro);
                color: var(--verde-oscuro);
                padding: 10px 40px;
                border-radius: 50px;
                font-family: 'Playfair Display', serif;
                transition: 0.3s;
            }
            .btn-filtro-principal:hover {
                background-color: var(--verde-oscuro);
                color: white;
            }
            .dropdown-menu {
                border-radius: 15px;
                box-shadow: 0 4px 15px rgba(0,0,0,0.1);
                border: none;
                margin-top: 10px;
            }
            .dropdown-item {
                font-family: 'Playfair Display', serif;
                color: var(--verde-oscuro);
                padding: 10px 20px;
            }
            .dropdown-item:hover {
                background-color: var(--verde-medio);
                color: white;
            }
        </style>

        
        <div class="row g-4">
            <?php $__empty_1 = true; $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card-aesthetic h-100 card-hover p-3">
                        
                        
                        <div class="text-center mb-3">
                            <a href="<?php echo e(route('producto.detalle', $producto->id)); ?>">
                                <?php if($producto->imagen): ?>
                                    <img src="<?php echo e(asset($producto->imagen)); ?>" alt="<?php echo e($producto->nombre); ?>" 
                                         style="width: 100%; height: 280px; object-fit: cover; border-radius: 16px; transition: 0.3s;"
                                         onmouseover="this.style.opacity='0.8'" onmouseout="this.style.opacity='1'">
                                <?php else: ?>
                                    <div class="d-flex justify-content-center align-items-center" style="height:280px; background:#eee; border-radius:16px;">
                                        <span class="text-muted">Sin imagen</span>
                                    </div>
                                <?php endif; ?>
                            </a>
                        </div>

                        <div class="text-center">
                            
                            
                            <a href="<?php echo e(route('producto.detalle', $producto->id)); ?>" class="text-decoration-none" style="color: inherit;">
                                <h4 style="font-family:'Playfair Display', serif; transition: 0.3s;" 
                                    onmouseover="this.style.color='var(--verde-medio)'" onmouseout="this.style.color='inherit'">
                                    <?php echo e($producto->nombre); ?>

                                </h4>
                            </a>
                            
                            <p class="texto-suave mb-3"><?php echo e($producto->descripcion); ?></p>
                            <h5 style="color: var(--verde-medio); font-weight: bold;">
                                $<?php echo e(number_format($producto->precio, 2, ',', '.')); ?>

                            </h5>

                            <?php if(auth()->guard()->check()): ?>
                                <?php if($producto->stock > 0): ?>
                                    <form action="<?php echo e(route('carrito.agregar')); ?>" method="POST">
                                       <?php echo csrf_field(); ?>
                                       <input type="hidden" name="producto_id" value="<?php echo e($producto->id); ?>">
                                       <input type="hidden" name="cantidad" value="1">
                                       <button type="submit" class="btn-primario mt-2 w-100">
                                          Agregar al carrito
                                        </button>
                                    </form>
                                <?php else: ?>
                                    <button class="btn mt-2 w-100" disabled style="background:#ccc; color:#666;">Sin stock</button>
                                <?php endif; ?>
                            <?php else: ?>
                                <a href="/login" class="btn-primario mt-2 d-inline-block w-100 text-center">Iniciar sesión</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-12 text-center py-5">
                    <h4>No hay productos en esta categoría todavía</h4>
                    <p class="texto-suave">Pronto habrá novedades ✨</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Usuario-1\Documents\Herd\grupo21\resources\views/productos.blade.php ENDPATH**/ ?>