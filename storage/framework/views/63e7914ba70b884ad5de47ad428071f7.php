<style>
    /* 1. Efecto de zoom lento tipo película retro */
    .carousel-item .carousel-img {
        transition: transform 10s ease;
        transform: scale(1);
    }
    .carousel-item.active .carousel-img {
        transform: scale(1.05); /* La imagen se acerca muy suavemente */
    }

    /* 2. Degradado oscuro para un mood más profundo y que el texto se lea perfecto */
    .overlay-estetico {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to bottom, rgba(0,0,0,0.1) 0%, rgba(20, 25, 22, 0.7) 100%);
    }

    /* 3. Animación para que los textos floten hacia arriba */
    .texto-animado {
        padding-bottom: 2rem;
    }
    .texto-animado h5 {
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
        letter-spacing: 1px;
        opacity: 0;
        animation: subirSuave 1s ease-out 0.2s forwards;
    }
    .texto-animado p {
        font-style: italic;
        font-size: 1.2rem;
        opacity: 0;
        animation: subirSuave 1s ease-out 0.5s forwards;
    }

    @keyframes subirSuave {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>


<div id="mainCarousel" class="carousel slide carousel-fade shadow-sm" data-bs-ride="carousel" data-bs-interval="4000">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="2"></button>
    <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="3"></button>
  </div>

  <div class="carousel-inner">
    
    <div class="carousel-item active">
      <div class="overlay-estetico"></div>
      <img src="<?php echo e(asset('img/fotos-carrusel/tarot.png')); ?>" class="d-block w-100 carousel-img" style="object-fit: cover; height: 45vh;">
      <div class="carousel-caption d-block texto-animado">
        <h5>Claridad en cada arcano.</h5>
        <p>Una bruja moderna necesita herramientas poderosas.</p>
      </div>
    </div>

    <div class="carousel-item">
      <div class="overlay-estetico"></div>
      <img src="<?php echo e(asset('img/fotos-carrusel/cristales.png')); ?>" class="d-block w-100 carousel-img" style="object-fit: cover; height: 45vh;">
      <div class="carousel-caption d-block texto-animado">
        <h5>Energía en cada cristal.</h5>
        <p>Piedras naturales seleccionadas para armonizar tu hogar.</p>
      </div>
    </div>

    <div class="carousel-item">
      <div class="overlay-estetico"></div>
      <img src="<?php echo e(asset('img/fotos-carrusel/meditacion.png')); ?>" class="d-block w-100 carousel-img" style="object-fit: cover; height: 45vh;">
      <div class="carousel-caption d-block texto-animado">
        <h5>Tu momento de paz.</h5>
        <p>Encontrá accesorios diseñados para tu práctica diaria.</p>
      </div>
    </div>
    
    <div class="carousel-item">
      <div class="overlay-estetico"></div>
      <img src="<?php echo e(asset('img/fotos-carrusel/velas.png')); ?>" class="d-block w-100 carousel-img" style="object-fit: cover; height: 45vh;">
      <div class="carousel-caption d-block texto-animado">
        <h5>El fuego transmuta.</h5>
        <p>Velas intencionadas para renovar tu energía.</p>
      </div>
    </div>

  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div><?php /**PATH C:\Users\Usuario-1\Documents\Herd\grupo21\resources\views/partes/carrusel.blade.php ENDPATH**/ ?>