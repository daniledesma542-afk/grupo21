<?php $__env->startSection('contenido'); ?>

<div class="container py-5">

    <div class="card card-aesthetic p-5 text-center">

        <h1 class="text-oliva mb-4">
            ¡Mensaje Enviado!
        </h1>

        <p class="texto-suave fs-5 mb-4">
            Hola <strong><?php echo e($nombre); ?></strong>, gracias por comunicarte con
            <strong>Ondas de Sanación</strong>.
            Recibimos tu mensaje correctamente y en breve estaremos respondiéndote.
        </p>

        <a href="/contacto" class="btn btn-primario">
            Volver al contacto
        </a>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Usuario-1\Documents\Herd\grupo21\resources\views/exito.blade.php ENDPATH**/ ?>