<?php $__env->startSection('contenido'); ?>

<section class="auth-section py-5">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-5">

                <div class="auth-card p-4 p-md-5">

                    <div class="text-center mb-4">

                        <h2 class="auth-title">
                            Iniciar Sesión
                        </h2>

                        <p class="auth-subtitle">
                            Accedé a tu cuenta para continuar.
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

                    <form action="/login" method="POST">

                        <?php echo csrf_field(); ?>

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

                        <div class="mb-4">

                            <label class="form-label fw-bold">
                                Contraseña
                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-control form-control-nueva"
                                required>

                        </div>

                        <div class="text-center">

                            <button type="submit" class="btn-primario">
                                Iniciar sesión
                            </button>

                        </div>

                    </form>

                    <hr>

                    <p class="text-center mb-0">

                        ¿No tenés cuenta?

                        <a href="/registro" class="auth-link">
                            Registrate
                        </a>

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Usuario-1\Documents\Herd\grupo21\resources\views/backend/usuarios/login.blade.php ENDPATH**/ ?>