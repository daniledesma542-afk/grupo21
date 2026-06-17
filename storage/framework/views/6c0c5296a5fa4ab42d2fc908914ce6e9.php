

<?php $__env->startSection('contenido'); ?>
<section class="py-5" style="background-color: var(--blanco-roto); min-height: 80vh;">
    <div class="container">
        <h2 class="text-center mb-5" style="color: var(--verde-oscuro);">Mensajes de Clientes</h2>

        <?php if($mensajes->count() > 0): ?>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead style="background-color: var(--verde-oscuro); color: var(--blanco-roto);">
                        <tr>
                            <th>Fecha</th>
                            <th>Nombre / Email</th>
                            <th>Asunto</th>
                            <th>Mensaje</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $mensajes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mensaje): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="<?php echo e($mensaje->leido ? '' : 'table-warning'); ?>">
                                <td><?php echo e($mensaje->created_at->format('d/m/Y H:i')); ?></td>
                                <td>
                                    <strong><?php echo e($mensaje->nombre); ?></strong><br>
                                    <small><?php echo e($mensaje->email); ?></small>
                                </td>
                                <td><?php echo e($mensaje->asunto); ?></td>
                                <td><?php echo e(Str::limit($mensaje->mensaje, 50)); ?></td>
                                <td>
                                    <?php if($mensaje->leido): ?>
                                        <span class="badge bg-success">Leído</span>
                                    <?php else: ?>
                                        <span class="badge bg-warning text-dark">Nuevo</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if(!$mensaje->leido): ?>
                                        <form action="<?php echo e(route('admin.mensaje.leido', $mensaje->id)); ?>" method="POST" class="d-inline">
                                            <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                                            <button type="submit" class="btn btn-sm btn-outline-success">Marcar leído</button>
                                        </form>
                                    <?php endif; ?>
                                    
                                    
                                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalRespuesta<?php echo e($mensaje->id); ?>">
                                        Responder
                                    </button>
                                </td>
                            </tr>

                            
                            <div class="modal fade" id="modalRespuesta<?php echo e($mensaje->id); ?>" tabindex="-1">
                                <div class="modal-dialog">
                                    <form action="<?php echo e(route('admin.mensaje.responder', $mensaje->id)); ?>" method="POST" class="modal-content">
                                        <?php echo csrf_field(); ?>
                                        <div class="modal-header">
                                            <h5 class="modal-title">Responder a <?php echo e($mensaje->nombre); ?></h5>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Mensaje recibido:</strong> <?php echo e($mensaje->mensaje); ?></p>
                                            <textarea name="respuesta" class="form-control" rows="4" required placeholder="Escribí tu respuesta aquí..."></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Enviar respuesta</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="text-center py-5">
                <p>No hay mensajes nuevos.</p>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Usuario-1\Documents\Herd\grupo21\resources\views/backend/admin/mensajes.blade.php ENDPATH**/ ?>