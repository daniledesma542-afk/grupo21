<?php $__env->startSection('contenido'); ?>

<section class="py-5" style="background-color:#f7f5ef;">
    <div class="container py-5">

        <!-- Encabezado -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-10 text-center">
                <span class="text-dorado-nuevo fs-5 d-block mb-3" style="letter-spacing:2px;">
                    Ondas de <em>Sanación</em>
                </span>

                <h1 class="display-4 fw-bold text-oliva-oscuro position-relative d-inline-block">
                    Aviso Legal
                    <span class="position-absolute start-50 translate-middle-x rounded-pill"
                          style="bottom:-10px; width:80px; height:4px; background:#cba87c;">
                    </span>
                </h1>

                <p class="mt-4 text-muted">
                    Términos de uso, políticas de privacidad y condiciones generales de compra.
                </p>
            </div>
        </div>

        <!-- Contenido -->
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <!-- Card -->
                <div class="bg-white shadow-sm rounded-4 p-4 p-md-5 mb-4">

                    <h3 class="text-oliva-oscuro mb-3">1. Uso del Sitio Web</h3>
                    <p class="text-muted style="text-align: justify;">
                        El acceso y uso de este sitio web implica la aceptación de las presentes condiciones.
                        El usuario se compromete a utilizar la página de forma responsable, sin realizar
                        actividades que puedan afectar el funcionamiento del sitio o vulnerar derechos de terceros.
                    </p>

                    <hr>

                    <h3 class="text-oliva-oscuro mb-3">2. Servicios Ofrecidos</h3>
                    <p class="text-muted style="text-align: justify;">
                        A través de este sitio se comercializan productos holísticos, espirituales,
                        de bienestar personal y artículos relacionados con armonización energética.
                        La información publicada busca orientar al cliente y puede actualizarse sin previo aviso.
                    </p>

                    <hr>

                    <h3 class="text-oliva-oscuro mb-3">3. Políticas de Privacidad</h3>
                    <p class="text-muted style="text-align: justify;">
                        Respetamos la privacidad de nuestros usuarios. Los datos personales brindados
                        mediante formularios de contacto o compras serán utilizados únicamente para:
                    </p>

                    <ul class="text-muted style="text-align: justify;">
                        <li>Procesar pedidos y consultas.</li>
                        <li>Coordinar entregas o envíos.</li>
                        <li>Brindar atención postventa.</li>
                        <li>Enviar novedades si el usuario lo autoriza.</li>
                    </ul>

                    <p class="text-muted" style="text-align: justify;">
                        No compartimos información personal con terceros ajenos a la operación comercial.
                    </p>

                    <hr>

                    <h3 class="text-oliva-oscuro mb-3">4. Compras y Formas de Pago</h3>
                    <p class="text-muted" style="text-align: justify;">
                        Las compras están sujetas a disponibilidad de stock.
                        Los precios publicados pueden modificarse sin previo aviso.
                        Los medios de pago habilitados serán informados al momento de la compra.
                    </p>

                    <hr>

                    <h3 class="text-oliva-oscuro mb-3">5. Envíos y Entregas</h3>
                    <p class="text-muted" style="text-align: justify;">
                        Realizamos entregas mediante retiro acordado o servicios de mensajería/correo.
                        Los tiempos estimados pueden variar según ubicación y disponibilidad logística.
                    </p>

                    <ul class="text-muted" style="text-align: justify;">
                        <li>Entregas locales: entre 24 y 72 hs hábiles.</li>
                        <li>Envíos nacionales: según operador logístico seleccionado.</li>
                        <li>Demoras extraordinarias serán notificadas al cliente.</li>
                    </ul>

                    <hr>

                    <h3 class="text-oliva-oscuro mb-3">6. Garantías y Cambios</h3>
                    <p class="text-muted" style="text-align: justify;">
                        Si el producto llega dañado o presenta fallas de origen, el cliente podrá solicitar
                        cambio o revisión dentro de las 48 hs posteriores a la recepción, enviando evidencia
                        fotográfica y número de pedido.
                    </p>

                    <p class="text-muted" style="text-align: justify;">
                        No aplican cambios por mal uso, desgaste natural o daños posteriores a la entrega.
                    </p>

                    <hr>

                    <h3 class="text-oliva-oscuro mb-3">7. Soporte Postventa</h3>
                    <p class="text-muted" style="text-align: justify;">
                        Brindamos asistencia luego de la compra para consultas sobre uso,
                        seguimiento de pedidos y resolución de inconvenientes.
                    </p>

                    <hr>

                    <h3 class="text-oliva-oscuro mb-3">8. Propiedad Intelectual</h3>
                    <p class="text-muted" style="text-align: justify;">
                        El diseño del sitio, imágenes, textos, logotipo y contenido son propiedad
                        de Ondas de Sanación, salvo indicación contraria.
                        Queda prohibida su reproducción sin autorización.
                    </p>

                    <hr>

                    <h3 class="text-oliva-oscuro mb-3">9. Modificaciones</h3>
                    <p class="text-muted" style="text-align: justify;">
                        Nos reservamos el derecho de actualizar estos términos y condiciones en cualquier momento.
                        Las modificaciones entrarán en vigencia desde su publicación en esta página.
                    </p>

                    <hr>

                    <h3 class="text-oliva-oscuro mb-3">10. Contacto</h3>
                    <p class="text-muted mb-0">
                        Para consultas relacionadas con compras, privacidad o uso del sitio,
                        podés comunicarte desde nuestra sección de contacto.
                    </p>

                </div>

                <!-- Botón -->
                <div class="text-center mt-4">
                    <a href="<?php echo e(url('/contacto')); ?>" class="btn btn-dorado-principal px-5 py-3">
                        Contactanos
                    </a>
                </div>

            </div>
        </div>

    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Usuario\Herd\grupo21\resources\views/terminos-usos.blade.php ENDPATH**/ ?>