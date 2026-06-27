<?php $__env->startSection('contenido'); ?>

<section class="py-5" style="background-color: var(--blanco-roto); min-height: 80vh;">
    <div class="container">

        <!-- Bienvenida -->
        <div class="text-center mb-5">
            <h1 class="hero-titulo">
                Bienvenida, <em><?php echo e(auth()->user()->nombre); ?></em>
            </h1>

            <p class="texto-suave">
                Gestioná tus compras y explorá nuestros productos holísticos.
            </p>
        </div>

        <div class="row">

            <!-- PERFIL -->
            <div class="col-lg-4 mb-4">
                <div class="card-aesthetic p-4 text-center h-100">

                    <div class="mb-3">
                        <i class="bi bi-person-circle"
                           style="font-size: 5rem; color: var(--verde-medio);"></i>
                    </div>

                    <h3 style="font-family: 'Playfair Display', serif;">
                        <?php echo e(auth()->user()->nombre); ?>

                    </h3>

                    <p class="texto-suave mb-3">
                        <?php echo e(auth()->user()->email); ?>

                    </p>

                    <span class="badge bg-oliva fs-6">
                        Cliente
                    </span>

                </div>
            </div>

            <!-- OPCIONES -->
            <div class="col-lg-8">
                <div class="row">
                    
                    <!-- PEDIDOS -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card-aesthetic card-hover h-100 p-4 text-center">

                            <div class="mb-3">
                                <i class="bi bi-box-seam icono-card"></i>
                            </div>

                            <h4 class="mb-3">Mis Pedidos</h4>

                            <p class="texto-suave">
                                Consultá el historial y estado de tus compras.
                            </p>

                            <a href="/cliente/pedidos" class="btn-primario mt-3">
                                Ver pedidos
                            </a>

                        </div>
                    </div>
                    <!-- CARRITO -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card-aesthetic card-hover h-100 p-4 text-center">

                            <div class="mb-3">
                                <i class="bi bi-cart3 icono-card"></i>
                            </div>

                            <h4 class="mb-3">Mi Carrito</h4>

                            <p class="texto-suave">
                                Revisá los productos listos para comprar.
                            </p>

                            <a href="/carrito" class="btn-primario mt-3">
                                Ver carrito
                            </a>

                        </div>
                    </div>

                    <!-- PRODUCTOS -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card-aesthetic card-hover h-100 p-4 text-center">

                            <div class="mb-3">
                                <i class="bi bi-flower1 icono-card"></i>
                            </div>

                            <h4 class="mb-3">Productos</h4>

                            <p class="texto-suave">
                                Explorá nuestro catálogo holístico.
                            </p>

                            <a href="/productos" class="btn-primario mt-3">
                                Ver productos
                            </a>

                        </div>
                    </div>

                </div>

                <!-- CERRAR SESIÓN -->
                <div class="text-center mt-4">
                    <form action="<?php echo e(route('logout')); ?>" method="POST">
                        <?php echo csrf_field(); ?>

                        <button type="submit" class="btn"
                        style="background-color: var(--verde-oscuro);
                               color: var(--crema);
                               border: 1px solid var(--beige);">
                            Cerrar sesión
                        </button>
                    </form>
                </div>

            </div>

        </div>

    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Usuario-1\Documents\Herd\grupo21\resources\views/backend/usuarios/cliente.blade.php ENDPATH**/ ?>