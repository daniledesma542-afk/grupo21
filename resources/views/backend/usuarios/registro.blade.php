@extends('plantilla')

@section('contenido')
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

                    {{-- Agregamos novalidate para usar las validaciones de Laravel --}}
                    <form action="/registro" method="POST" novalidate>
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Nombre y Apellido
                            </label>
                            <input type="text"
                                   name="name"
                                   class="form-control form-control-nueva @error('name') is-invalid @enderror"
                                   value="{{ old('name') }}"
                                   required>
                            @error('name')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Correo electrónico
                            </label>
                            <input type="email"
                                   name="email"
                                   class="form-control form-control-nueva @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}"
                                   required>
                            @error('email')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Contraseña
                            </label>
                            <input type="password"
                                   name="password"
                                   class="form-control form-control-nueva @error('password') is-invalid @enderror"
                                   required>
                            @error('password')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">
                                Confirmar contraseña
                            </label>
                            <input type="password"
                                   name="password_confirmation"
                                   class="form-control form-control-nueva @error('password_confirmation') is-invalid @enderror"
                                   required>
                            @error('password_confirmation')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
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
@endsection