@extends('plantilla')

@section('contenido')

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

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="/login" method="POST">

                        @csrf

                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                Correo electrónico
                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-control form-control-nueva"
                                value="{{ old('email') }}"
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

@endsection