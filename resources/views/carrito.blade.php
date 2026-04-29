@extends('plantilla')

@section('contenido')
<section class="py-5" style="min-height:80vh; background:var(--blanco-roto);">
<div class="container py-5">

<div class="row justify-content-center">
<div class="col-lg-8">

<div class="card card-aesthetic p-5 text-center card-hover">

<i class="bi bi-bag mb-4" style="font-size:4rem; color:var(--beige);"></i>

<span class="text-uppercase fw-bold d-block mb-2"
style="letter-spacing:2px; color:var(--beige);">
Carrito de Compras
</span>

<h1 class="fw-bold mb-3" style="color:var(--verde-oscuro);">
Estamos trabajando en esta sección
</h1>

<p class="texto-suave fs-5 mb-4" style="line-height:1.8;">
Muy pronto vas a poder agregar productos, pagar online y recibir tu pedido de forma rápida y segura.
</p>

<p class="texto-suave mb-4">
Gracias por acompañarnos en este crecimiento ✨
</p>

<div class="d-flex flex-column flex-md-row gap-3 justify-content-center">

<a href="{{ url('/productos') }}" class="btn btn-primario px-4">
Volver a productos
</a>

<a href="{{ url('/contacto') }}" class="btn px-4"
style="background:var(--verde-oscuro); color:white; border-radius:12px;">
Contactanos
</a>

</div>

</div>

</div>
</div>

</div>
</section>
@endsection