<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRol
{
    public function handle(Request $request, Closure $next, $rol): Response
    {
        // 1. Verificamos si el usuario inició sesión
        if (!Auth::check()) {
            return redirect('/login');
        }

        // 2. Verificamos si el nombre de su rol coincide con el que pide la ruta
        if (Auth::user()->rol->nombre === $rol) {
            return $next($request); // Lo deja pasar
        }

        // 3. Si no es su rol (ej: un cliente queriendo entrar al admin), lo pateamos al inicio
        return redirect('/');
    }
}