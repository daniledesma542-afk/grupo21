<style>
  .carousel-img {
    height: 200px !important; 
    object-fit: cover !important;
  }
</style>

<div id="mainCarousel" class="carousel slide carousel-fade shadow-sm" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="0" class="active" aria-current="true"></button>
    <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="2"></button>
    <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="3"></button>
  </div>

  <div class="carousel-inner">
    
    <div class="carousel-item active">
      <img src="{{ asset('img/fotos-carrusel/tarot.png') }}" class="d-block w-100 carousel-img" alt="Cartas de Tarot">
      <div class="carousel-caption d-none d-md-block">
        <h5 class="display-6">Claridad en cada arcano.</h5>
        <p>Una bruja moderna necesita herramientas poderosas.</p>
      </div>
    </div>

    <div class="carousel-item">
      <img src="{{ asset('img/fotos-carrusel/cristales.png') }}" class="d-block w-100 carousel-img" alt="Cristales">
      <div class="carousel-caption d-none d-md-block">
        <h5 class="display-6">Energía en cada cristal</h5>
        <p>Piedras naturales seleccionadas para armonizar tu hogar.</p>
      </div>
    </div>

    <div class="carousel-item">
      <img src="{{ asset('img/fotos-carrusel/meditacion.png') }}" class="d-block w-100 carousel-img" alt="Meditación">
      <div class="carousel-caption d-none d-md-block">
        <h5 class="display-6">Tu momento de paz</h5>
        <p>Encontrá accesorios diseñados para tu práctica diaria.</p>
      </div>
    </div>
    
    <div class="carousel-item">
      <img src="{{ asset('img/fotos-carrusel/velas.png') }}" class="d-block w-100 carousel-img" alt="Velas Aromáticas">
      <div class="carousel-caption d-none d-md-block">
        <h5 class="display-6">El fuego transmuta.</h5>
        <p>Velas intencionadas para acompañar tus momentos de introspección y renovar tu energía.</p>
      </div>
    </div>

  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Anterior</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Siguiente</span>
  </button>
</div>