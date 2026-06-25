<?php $__env->startSection('contenido'); ?>
<section class="py-5" style="background-color: var(--blanco-roto); min-height: 80vh;">
    <div class="container">
        
        <div class="mb-4">
            <a href="/admin" class="text-decoration-none" style="color: var(--verde-oscuro); font-weight: bold;">
                <i class="bi bi-arrow-left"></i> Volver al Dashboard
            </a>
        </div>

        <h2 class="text-center mb-5" style="color: var(--verde-oscuro); font-family: 'Playfair Display', serif;">
            Usuarios Registrados
        </h2>

        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <?php if(session('error')): ?>
            <div class="alert alert-danger">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>

        <?php if($usuarios->count() > 0): ?>
            <div class="card-aesthetic shadow-sm p-4" style="background-color: white; border-radius: 15px;">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead style="background-color: var(--verde-oscuro); color: var(--crema);">
                            <tr>
                                <th>ID</th>
                                <th>Nombre Completo</th>
                                <th>Correo Electrónico</th>
                                <th>Rol</th>
                                <th>Fecha de Registro</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>#<?php echo e($usuario->id); ?></td>

                                    <td class="fw-bold" style="color: var(--verde-oscuro);">
                                        <?php echo e($usuario->nombre); ?>


                                        <?php if($usuario->id === auth()->id()): ?>
                                            <span class="badge bg-secondary ms-2">
                                                Cuenta actual
                                            </span>
                                        <?php endif; ?>
                                    </td>

                                    <td><?php echo e($usuario->email); ?></td>

                                    <td>
                                        <span class="badge px-3 py-2" 
                                              style="background-color: <?php echo e($usuario->rol->nombre == 'admin' ? 'var(--verde-oscuro)' : 'var(--verde-medio)'); ?>; border-radius: 20px;">
                                            <?php echo e(ucfirst($usuario->rol->nombre)); ?>

                                        </span>
                                    </td>

                                    <td><?php echo e($usuario->created_at->format('d/m/Y')); ?></td>

                                    <td class="text-center">
                                        <?php if($usuario->id === auth()->id()): ?>
                                            <button class="btn btn-sm btn-secondary" disabled>
                                                No disponible
                                            </button>
                                        <?php else: ?>
                                            <form method="POST"
                                                  action="<?php echo e(route('admin.usuarios.eliminar', $usuario->id)); ?>"
                                                  class="d-inline"
                                                  onsubmit="return confirm('¿Seguro que querés eliminar este usuario?');">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>

                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    Eliminar
                                                </button>
                                            </form>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php else: ?>
            <div class="text-center py-5">
                <i class="bi bi-people" style="font-size: 4rem; color: var(--verde-medio);"></i>
                <h4 class="mt-3 text-muted">Aún no hay usuarios registrados.</h4>
            </div>
        <?php endif; ?>
        
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Usuario\Herd\grupo21\resources\views/backend/admin/usuarios.blade.php ENDPATH**/ ?>