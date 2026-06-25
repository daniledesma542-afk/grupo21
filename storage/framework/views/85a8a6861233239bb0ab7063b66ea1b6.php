<?php $__env->startSection('contenido'); ?>
<section class="py-5" style="background-color: var(--blanco-roto); min-height: 85vh;">
    <div class="container">

        <div class="text-center mb-5">
            <p class="hero-eyebrow">Panel administrativo</p>
            <h1 class="hero-titulo" style="color: var(--verde-oscuro);">
                Administración de <em>Ondas de Sanación</em>
            </h1>
        </div>

        <div class="row g-4">

            <div class="col-lg-4">
                <div class="card-aesthetic h-100 p-4 text-center card-hover">
                    <div class="mb-3">
                        <i class="bi bi-person-circle" style="font-size: 4rem; color: var(--verde-medio);"></i>
                    </div>
                    <h4 style="font-family: 'Playfair Display', serif;">
                        <?php echo e(auth()->user()->nombre); ?>

                    </h4>
                    <p class="texto-suave mb-2">
                        <?php echo e(auth()->user()->email); ?>

                    </p>
                    <span class="badge px-3 py-2" style="background-color: var(--verde-medio);">
                        <?php echo e(auth()->user()->rol->nombre); ?>

                    </span>
                </div>
            </div>

            <!-- USUARIOS -->
            <div class="col-lg-4">
                <div class="card-aesthetic h-100 p-4 text-center card-hover">
                    <i class="bi bi-people icono-card mb-3" style="font-size: 3rem; color: var(--verde-medio);"></i>
                    <h4 style="font-family: 'Playfair Display', serif;">Usuarios</h4>
                    <p class="texto-suave">Visualizá a los clientes registrados.</p>
                    <a href="<?php echo e(route('admin.usuarios')); ?>" class="btn-primario mt-3">Ver usuarios</a>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card-aesthetic h-100 p-4 text-center card-hover">
                    <i class="bi bi-box-seam icono-card mb-3" style="font-size: 3rem; color: var(--verde-medio);"></i>
                    <h4 style="font-family: 'Playfair Display', serif;">Productos</h4>
                    <p class="texto-suave">Cargá, editá y administrá el catálogo.</p>
                    <a href="/admin/productos" class="btn-primario mt-3">Gestionar</a>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card-aesthetic h-100 p-4 text-center card-hover">
                    <i class="bi bi-bag-check icono-card mb-3" style="font-size: 3rem; color: var(--verde-medio);"></i>
                    <h4 style="font-family: 'Playfair Display', serif;">Pedidos</h4>
                    <p class="texto-suave">Consultá ventas y actualizá estados.</p>
                    <a href="<?php echo e(route('admin.pedidos')); ?>" class="btn-primario mt-3">Ver pedidos</a>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card-aesthetic h-100 p-4 text-center card-hover">
                    <i class="bi bi-envelope-at icono-card mb-3" style="font-size: 3rem; color: var(--verde-medio);"></i>
                    <h4 style="font-family: 'Playfair Display', serif;">Consultas</h4>
                    
                    <?php
                        $nuevos = \App\Models\Mensaje::where('leido', false)->count();
                    ?>

                    <p class="texto-suave">
                        Gestioná los mensajes de contacto.
                    </p>

                    <a href="<?php echo e(route('admin.mensajes')); ?>" class="btn-primario mt-3 position-relative">
                        Ver mensajes
                        <?php if($nuevos > 0): ?>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                <?php echo e($nuevos); ?>

                            </span>
                        <?php endif; ?>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Usuario\Herd\grupo21\resources\views/backend/admin/dashboard.blade.php ENDPATH**/ ?>