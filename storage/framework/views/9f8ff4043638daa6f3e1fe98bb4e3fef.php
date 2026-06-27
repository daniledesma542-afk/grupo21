<?php $__env->startSection('contenido'); ?>
<div class="container my-5">

    <!-- TITULO -->
    <div class="text-center mb-5">
        <h1 class="fw-bold">Comercialización</h1>
        <p class="text-muted">
            Comprá de forma simple, consciente y segura ✨
        </p>
    </div>

    <!-- HERO / COMO COMPRAR (REDUCIDO Y CENTRADO) -->
    <div class="row justify-content-center mb-5">
        <div class="col-lg-8">
            <div class="card card-aesthetic overflow-hidden">
                <div class="card card-aesthetic card-hover overflow-hidden">
                <div class="row g-0 ">

                    <!-- IMAGEN -->
                    <div class="col-md-5">
                        <img src="<?php echo e(asset('img/fotos-cuadradas/fotovelaycafe.jpg')); ?>" 
                             class="img-fluid w-100 h-100 object-fit-cover" 
                             alt="Compra online">
                    </div>

                    <!-- TEXTO -->
                    <div class="col-md-7">
                        <div class="card-body p-4">

                            <h4 class="fw-bold mb-3">¿Cómo comprar online?</h4>

                            <div class="paso">
                                <i class="bi bi-cart"></i>
                                <span>Elegí tu producto</span>
                            </div>

                            <div class="paso">
                                <i class="bi bi-person-check"></i>
                                <span>Completá tus datos</span>
                            </div>

                            <div class="paso">
                                <i class="bi bi-credit-card"></i>
                                <span>Realizá el pago</span>
                            </div>

                            <div class="paso">
                                <i class="bi bi-truck"></i>
                                <span>Recibí tu pedido en tu hogar</span>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- CARDS PRINCIPALES -->
    <div class="row g-4 text-center">

        <!-- ENTREGA -->
        <div class="col-md-4">
            <div class="card card-aesthetic card-hover h-100 p-4">

                <i class="bi bi-box-seam icono-card"></i>

                <h5 class="fw-bold mt-3">Tipos de entrega</h5>

                <p class="small">
                    Entrega a domicilio, retiro en punto acordado o entrega personalizada según tu ubicación.
                </p>

            </div>
        </div>

        <!-- ENVIO -->
        <div class="col-md-4">
            <div class="card card-aesthetic card-hover h-100 p-4">

                <i class="bi bi-truck icono-card"></i>

                <h5 class="fw-bold mt-3">Formas de envío</h5>

                <p class="small">
                    Envíos a todo el país mediante correo o entregas locales.
                </p>

                <p class="small fw-semibold">
                    ⏳ 3 a 7 días hábiles
                </p>

            </div>
        </div>

        <!-- PAGO -->
        <div class="col-md-4">
            <div class="card card-aesthetic card-hover h-100 p-4">

                <i class="bi bi-credit-card icono-card"></i>

                <h5 class="fw-bold mt-3">Métodos de pago</h5>

                <p class="small">
                    Mercado Pago, transferencia bancaria o efectivo según disponibilidad.
                </p>

            </div>
        </div>

    </div>

    <!-- CONFIANZA -->
    <div class="mt-5 text-center">
        <p class="texto-suave">
            Estamos para acompañarte en cada paso de tu compra 🤍
        </p>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Usuario-1\Documents\Herd\grupo21\resources\views/comercializacion.blade.php ENDPATH**/ ?>