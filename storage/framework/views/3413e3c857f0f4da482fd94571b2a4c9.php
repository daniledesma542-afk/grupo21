<?php $__env->startSection('contenido'); ?>

<section class="auth-section py-5">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-6">

                <div class="auth-card p-4 p-md-5">

                    <div class="text-center mb-4">

                        <h2 class="auth-title">
                            Crear Cuenta
                        </h2>

                        <p class="auth-subtitle">
                            Registrate para acceder a todos nuestros productos y servicios.
                        </p>

                    </div>

                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form action="/registro" method="POST">

                        <?php echo csrf_field(); ?>

                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                Nombre y Apellido
                            </label>

                            <input
                                type="text"
                                name="name"
                                class="form-control form-control-nueva"
                                value="<?php echo e(old('name')); ?>"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                Correo electrónico
                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-control form-control-nueva"
                                value="<?php echo e(old('email')); ?>"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                Contraseña
                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-control form-control-nueva"
                                required>

                        </div>

                        <div class="mb-4">

                            <label class="form-label fw-bold">
                                Confirmar contraseña
                            </label>

                            <input
                                type="password"
                                name="password_confirmation"
                                class="form-control form-control-nueva"
                                required>

                        </div>

                        <div class="text-center">

                            <button type="submit" class="btn-primario">
                                Registrarse
                            </button>

                        </div>

                    </form>

                    <hr>

                    <p class="text-center mb-0">

                        ¿Ya tenés cuenta?

                        <a href="/login" class="auth-link">
                            Iniciar sesión
                        </a>

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Usuario\Herd\grupo21\resources\views/backend/usuarios/registro.blade.php ENDPATH**/ ?>