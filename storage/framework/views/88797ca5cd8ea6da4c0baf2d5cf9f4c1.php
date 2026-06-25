<?php
    $cantidadCarrito = 0;

    if(auth()->check() && auth()->user()->rol->nombre !== 'admin') {
        $cantidadCarrito = \App\Models\VentaDetalle::whereHas('venta', function ($query) {
            $query->where('user_id', auth()->id())
                  ->where('estado', 'carrito');
        })->sum('cantidad');
    }
?>

<nav class="navbar navbar-expand-lg navbar-dark"
     style="background-color: var(--verde-oscuro); border-bottom: 1px solid rgba(212, 184, 150, 0.2);">
  <div class="container">
    
    <a class="navbar-brand"
       href="<?php echo e(url('/')); ?>"
       style="font-family: 'Playfair Display', serif; color: var(--crema); font-size: 1.4rem; letter-spacing: 0.05em;">
        Ondas de <span style="color: var(--beige); font-style: italic;">Sanación</span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav" aria-controls="navbarNav"
            aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-center">

        
        <li class="nav-item">
            <a class="nav-link"
               style="color: var(--crema); font-family:'Lato',sans-serif; text-transform:uppercase; font-size:0.72rem; letter-spacing:0.12em; padding:0.5rem 0.65rem;"
               href="<?php echo e(url('/')); ?>">
                Inicio
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link"
               style="color: var(--crema); font-family:'Lato',sans-serif; text-transform:uppercase; font-size:0.72rem; letter-spacing:0.12em; padding:0.5rem 0.65rem;"
               href="<?php echo e(url('/quienes')); ?>">
                Quiénes
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link"
               style="color: var(--crema); font-family:'Lato',sans-serif; text-transform:uppercase; font-size:0.72rem; letter-spacing:0.12em; padding:0.5rem 0.65rem;"
               href="<?php echo e(url('/productos')); ?>">
                Productos
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link"
               style="color: var(--crema); font-family:'Lato',sans-serif; text-transform:uppercase; font-size:0.72rem; letter-spacing:0.12em; padding:0.5rem 0.65rem;"
               href="<?php echo e(url('/comercializacion')); ?>">
                Comercialización
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link"
               style="color: var(--crema); font-family:'Lato',sans-serif; text-transform:uppercase; font-size:0.72rem; letter-spacing:0.12em; padding:0.5rem 0.65rem;"
               href="<?php echo e(url('/contacto')); ?>">
                Contacto
            </a>
        </li>

        
        <?php if(auth()->guard()->guest()): ?>
            <li class="nav-item">
                <a class="nav-link"
                   style="color: var(--crema); padding:0.5rem 0.65rem;"
                   href="<?php echo e(route('login')); ?>">
                    Login
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link"
                   style="color: var(--crema); padding:0.5rem 0.65rem;"
                   href="<?php echo e(url('/registro')); ?>">
                    Registro
                </a>
            </li>
        <?php endif; ?>

        
        <?php if(auth()->guard()->check()): ?>
            <?php if(auth()->user()->rol->nombre === 'admin'): ?>
                <li class="nav-item">
                    <a class="nav-link"
                       style="color: var(--crema); padding:0.5rem 0.65rem;"
                       href="<?php echo e(url('/admin')); ?>">
                        Panel Admin
                    </a>
                </li>
            <?php else: ?>
                
                <li class="nav-item ms-lg-2">
                    <a class="nav-link"
                       href="<?php echo e(url('/cliente')); ?>"
                       title="Mi cuenta"
                       style="color: var(--crema); font-size:1.15rem; padding:0.5rem 0.55rem;">
                        <i class="bi bi-person-circle"></i>
                    </a>
                </li>

                
                <li class="nav-item ms-lg-1">
                    <a class="nav-link position-relative"
                       href="<?php echo e(url('/carrito')); ?>"
                       title="Carrito"
                       style="color: var(--crema); font-size:1.15rem; padding:0.5rem 0.55rem;">

                        <i class="bi bi-bag"></i>

                        <?php if($cantidadCarrito > 0): ?>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill"
                                  style="background-color: var(--beige); color: var(--verde-oscuro); font-size:0.55rem; padding:0.35em 0.5em;">
                                <?php echo e($cantidadCarrito); ?>

                            </span>
                        <?php endif; ?>
                    </a>
                </li>
            <?php endif; ?>

            
            <li class="nav-item">
                <form action="<?php echo e(route('logout')); ?>" method="POST" class="d-inline m-0 p-0">
                    <?php echo csrf_field(); ?>
                    <button type="submit"
                            class="nav-link border-0 bg-transparent"
                            style="color: var(--crema); font-family:'Lato',sans-serif; text-transform:uppercase; font-size:0.72rem; letter-spacing:0.12em; padding:0.5rem 0.65rem;">
                        Cerrar Sesión
                    </button>
                </form>
            </li>
        <?php endif; ?>

      </ul>
    </div>
  </div>
</nav><?php /**PATH C:\Users\Usuario\Herd\grupo21\resources\views/partes/navbar.blade.php ENDPATH**/ ?>