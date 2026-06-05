<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarritoController;

/*
Declaracion de rutas
*/

Route::get('/', function () {
    return view('principal');
});

Route::get('/quienes', function () {
    return view('quienes_somos');
});

Route::get('/productos', function () {
    return view('productos');
});

Route::get('/contacto', function () {
    return view('contacto');
});

Route::get('/comercializacion', function () {
    return view('comercializacion');
});

Route::get('/carrito', function () {
    return view('carrito');
})->name('carrito');

Route::get('/terminos-usos', function () {
    return view('terminos-usos');
})->name('terminos');

Route::post('/contacto/enviar', [ContactoController::class, 'enviar'])
->name('contacto.enviar');

Route::get('/probar-crud', [ProductoController::class, 'probarCRUD']);

Route::get('/registro', [AuthController::class, 'formularioRegistro']);
Route::get('/login', [AuthController::class, 'formularioLogin'])->name('login');
Route::post('/registro', [AuthController::class, 'registrar'])->name('registrar');
Route::post('/login', [AuthController::class, 'autenticar']);

// Ruta para cerrar sesión
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas protegidas SOLO para Administradores
Route::middleware(['auth', 'rol:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard']);
    
    // Ver la lista de productos
    Route::get('/admin/productos', [ProductoController::class, 'index']);
    
    // Ver el formulario que armaste recién
    Route::get('/admin/productos/crear', function () {
        return view('backend.crear_productos');
    });
    
    // Guardar el producto nuevo
    Route::post('/admin/productos', [ProductoController::class, 'store']);
});

// Rutas protegidas SOLO para Clientes
Route::middleware(['auth', 'rol:cliente'])->group(function () {
    Route::get('/cliente', [ClienteController::class, 'panel']);
});

Route::delete('/admin/productos/{id}', [ProductoController::class, 'destroy']);Route::delete('/admin/productos/{id}', [ProductoController::class, 'destroy']);

Route::get('/admin/productos', [ProductoController::class, 'index']);

// Rutas del Carrito de Compras (Protegidas)
Route::middleware(['auth'])->group(function () {
    
    // Mostrar el carrito
    Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito');
    
    // Agregar un producto
    Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])->name('carrito.agregar');
    
    // Eliminar un producto
    Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
    
    // Confirmar la compra
    Route::post('/carrito/confirmar', [CarritoController::class, 'confirmar'])->name('carrito.confirmar');
    
    // Vista de compra confirmada (protegida: redirige si no hay total en la sesión)
    Route::get('/compra-confirmada', function () {
        if (!session('total')) {
            return redirect('/'); // Redirige al inicio si intentan entrar haciendo trampa
        }
        return view('backend.usuarios.compra-confirmada');
    })->name('compra.confirmada');

});