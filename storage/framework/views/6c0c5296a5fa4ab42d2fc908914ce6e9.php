<?php $__env->startSection('contenido'); ?>
<section class="py-5" style="background-color: var(--blanco-roto); min-height: 80vh;">
    <div class="container">

        <div class="text-center mb-5">
            <p class="hero-eyebrow">Panel administrativo</p>
            <h1 class="hero-titulo" style="color: var(--verde-oscuro);">
                Mensajes de <em>Clientes</em>
            </h1>
            <p class="texto-suave">
                Consultas recibidas desde el formulario de contacto.
            </p>
        </div>

        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <?php if($mensajes->count() > 0): ?>
            <div class="card shadow-sm" style="border: 1px solid var(--beige);">
                <div class="card-body p-0">

                    <table class="table table-hover mb-0 align-middle">
                        <thead style="background-color: var(--verde-oscuro); color: var(--crema);">
                            <tr>
                                <th class="p-3">Fecha</th>
                                <th class="p-3">Cliente</th>
                                <th class="p-3">Email</th>
                                <th class="p-3">Asunto</th>
                                <th class="p-3 text-center">Estado</th>
                                <th class="p-3 text-center">Acción</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $__currentLoopData = $mensajes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mensaje): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="<?php echo e($mensaje->leido ? '' : 'table-warning'); ?>">
                                    <td class="p-3">
                                        <?php echo e($mensaje->created_at->format('d/m/Y H:i')); ?>

                                    </td>

                                    <td class="p-3 fw-bold" style="color: var(--verde-oscuro);">
                                        <?php echo e($mensaje->nombre); ?>

                                    </td>

                                    <td class="p-3">
                                        <?php echo e($mensaje->email); ?>

                                    </td>

                                    <td class="p-3">
                                        <?php echo e($mensaje->asunto); ?>

                                    </td>

                                    <td class="p-3 text-center">
                                        <?php if($mensaje->leido): ?>
                                            <span class="badge bg-success">Leído</span>
                                        <?php else: ?>
                                            <span class="badge bg-warning text-dark">Nuevo</span>
                                        <?php endif; ?>
                                    </td>

                                    <td class="p-3 text-center">
                                        <a href="<?php echo e(route('admin.mensaje.show', $mensaje->id)); ?>"
                                           class="btn btn-sm"
                                           style="background-color: var(--beige); color: var(--verde-oscuro);">
                                            Ver mensaje
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>

                </div>
            </div>
        <?php else: ?>
            <div class="text-center py-5">
                <i class="bi bi-envelope-open"
                   style="font-size: 4rem; color: var(--beige);"></i>

                <h4 class="mt-3 text-muted">
                    No hay mensajes nuevos.
                </h4>
            </div>
        <?php endif; ?>

    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Usuario-1\Documents\Herd\grupo21\resources\views/backend/admin/mensajes.blade.php ENDPATH**/ ?>