<?php $__env->startSection('contenido'); ?>
<section class="seccion-editorial py-5">
    <div class="container py-5">

        <div class="row align-items-center gx-5">

            <!-- TEXTO -->
            <div class="col-lg-6 mb-5 mb-lg-0">

                <span class="text-dorado text-uppercase fw-bold letter-spacing-2 mb-2 d-block">
                    Nuestro Propósito
                </span>

                <h1 class="display-4 text-oliva mb-4 font-serif">
                    Quiénes <span class="fst-italic">somos</span>
                </h1>
                
                <div class="card card-aesthetic p-4 mb-4">
                    <p class="mb-0 texto-suave">
                        Somos un equipo apasionado por el bienestar integral. 
                        Creamos este espacio para transmitirte <strong>confianza y seguridad</strong>.
                        Creemos que podes sanar tu cuerpo y tu mente con productos naturales, de calidad y con información clara.
                    </p>
                </div>

                <p class="texto-suave mb-4">
                    Entendemos que buscar el equilibrio es un proceso personal. 
                    Cada producto está pensado para acompañarte con claridad y calma.
                </p>

                <div class="d-flex gap-4 mt-4 text-oliva">
                    <div>
                        <h5 class="fw-bold mb-1">Confianza</h5>
                        <span class="small texto-suave">En cada producto</span>
                    </div>
                    <div class="border-start border-2 ps-4" style="border-color: var(--beige);">
                        <h5 class="fw-bold mb-1">Seguridad</h5>
                        <span class="small texto-suave">En tu proceso</span>
                    </div>
                </div>

            </div>

            <!-- IMAGEN + CARDS -->
            <div class="col-lg-6">

                <!-- FRASE -->
                <div class="card card-aesthetic p-4 text-center mb-4">
                    <i class="bi bi-quote fs-2 mb-2" style="color: var(--beige);"></i>
                    <p class="fst-italic fw-bold mb-0">
                        "Acompañándote con empatía y transparencia en cada paso."
                    </p>
                </div>

                                    <!-- PERSONAS -->
                    <div class="row g-3">

                        <!-- SIRLEY -->
                        <div class="col-12">
                            <div class="card card-aesthetic card-hover persona-card mb-3">
                                <div class="row g-0 align-items-center">

                                    <div class="col-md-4 text-center p-3">
                                        <img src="<?php echo e(asset('img/fotos-cuadradas/sirley.jpeg')); ?>" 
                                            class="rounded-circle foto-persona-redonda"
                                            alt="Sirley">
                                    </div>

                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title fw-bold mb-1">Sirley - Redes Sociales y Atención al Cliente</h5>
                                            <p class="card-text texto-suave mb-0">
                                                Me encargo de las redes sociales, de mostrarles todas las novedades y de crear ideas 
                                                para que nuestra tienda siga creciendo. También estoy del otro lado para responder consultas, 
                                                ayudarlos en lo que necesiten y acompañarlos en cada compra.
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- DANIELA -->
                        <div class="col-12">
                            <div class="card card-aesthetic card-hover persona-card mb-3">
                                <div class="row g-0 align-items-center">

                                    <div class="col-md-4 text-center p-3">
                                        <img src="<?php echo e(asset('img/fotos-cuadradas/daniela.jpg')); ?>" 
                                            class="rounded-circle foto-persona-redonda" 
                                            alt="Daniela">
                                    </div>

                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title fw-bold mb-1">Daniela - Operaciones y Contenido</h5>
                                            <p class="card-text texto-suave mb-0">
                                                Me encargo de buscar y coordinar con proveedores, sacar fotos y 
                                                preparar el contenido para que puedan ver cada producto de la mejor manera. 
                                                También armo los pedidos con dedicación y estoy disponible para ayudarlos y responder cualquier consulta.
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                </div>

            </div>

        </div>

    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Usuario\Herd\grupo21\resources\views/quienes_somos.blade.php ENDPATH**/ ?>