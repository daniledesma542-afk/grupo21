<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\PedidoAdminController;
use App\Http\Controllers\MensajeAdminController;

/*
Declaracion de rutas
*/

Route::get('/', function () {
    $productosDestacados = \App\Models\Producto::whereNull('deleted_at')
        ->whereNotNull('imagen')
        ->where('stock', '>', 0)
        ->latest()
        ->take(8)
        ->get();

    return view('principal', compact('productosDestacados'));
});
Route::get('/quienes', function () { return view('quienes_somos'); });

Route::get('/productos', [ProductoController::class, 'index'])->name('productos');
Route::get('/productos/{id}', [ProductoController::class, 'show'])->name('producto.detalle');

Route::get('/contacto', function () { return view('contacto'); });
Route::get('/comercializacion', function () { return view('comercializacion'); });
Route::get('/terminos-usos', function () { return view('terminos-usos'); })->name('terminos');

Route::post('/contacto/enviar', [ContactoController::class, 'enviar'])->name('contacto.enviar');

Route::get('/registro', [AuthController::class, 'formularioRegistro']);
Route::get('/login', [AuthController::class, 'formularioLogin'])->name('login');
Route::post('/registro', [AuthController::class, 'registrar'])->name('registrar');
Route::post('/login', [AuthController::class, 'autenticar']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// --- RUTAS DE ADMINISTRADOR ---
Route::middleware(['auth', 'rol:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard']);
    Route::get('/admin/productos', [ProductoController::class, 'adminIndex'])->name('admin.productos.index');
    Route::get('/admin/productos/crear', [ProductoController::class, 'create']);
    Route::post('/admin/productos', [ProductoController::class, 'store']);
    Route::get('/admin/productos/{id}/editar', [ProductoController::class, 'edit']);
    Route::put('/admin/productos/{id}', [ProductoController::class, 'update']);
    Route::delete('/admin/productos/{id}', [ProductoController::class, 'destroy']);

    Route::get('/admin/pedidos', [PedidoAdminController::class, 'index'])->name('admin.pedidos');
    Route::get('/admin/pedidos/{id}', [PedidoAdminController::class, 'show'])->name('admin.pedidos.show');
    Route::put('/admin/pedidos/{id}/estado', [AdminController::class, 'actualizarEstado'])->name('admin.pedidos.estado');

    Route::get('/admin/mensajes', [MensajeAdminController::class, 'index'])->name('admin.mensajes');
    Route::put('/admin/mensajes/{id}/leido', [MensajeAdminController::class, 'marcarLeido'])->name('admin.mensaje.leido');
    Route::post('/admin/mensajes/{id}/responder', [MensajeAdminController::class, 'responder'])->name('admin.mensaje.responder');
    Route::get('/admin/mensajes/{id}', [MensajeAdminController::class, 'show'])
    ->name('admin.mensaje.show');
    
    // Ruta de usuarios movida aquí (corregido)
    Route::get('/admin/usuarios', [AdminController::class, 'usuarios'])->name('admin.usuarios');
});

// --- RUTAS DE CLIENTES ---
Route::middleware(['auth', 'rol:cliente'])->group(function () {
    Route::get('/cliente', [ClienteController::class, 'panel']);
    Route::get('/cliente/pedidos', [ClienteController::class, 'pedidos']);
    Route::get('/cliente/pedidos/{id}', [ClienteController::class, 'detallePedido'])->name('cliente.pedido.detalle');
    Route::get('/cliente/pedidos/{id}/ticket', [ClienteController::class, 'descargarTicketHistorial'])->name('cliente.pedido.ticket');
    
    // Rutas del Carrito
    Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito');
    Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])->name('carrito.agregar');
    Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
    Route::post('/carrito/confirmar', [CarritoController::class, 'confirmar'])->name('carrito.confirmar');
    Route::put('/carrito/actualizar/{id}', [CarritoController::class, 'actualizarCantidad'])
    ->name('carrito.actualizar');
    Route::delete('/carrito/vaciar', [CarritoController::class, 'vaciar'])
    ->name('carrito.vaciar');
    
    Route::get('/compra-confirmada', function () {
        if (!session('total')) { return redirect('/'); }
        return view('backend.usuarios.compra-confirmada');
    })->name('compra.confirmada');

    Route::get('/descargar-ticket', [CarritoController::class, 'descargarTicket'])->name('ticket.descargar');
});