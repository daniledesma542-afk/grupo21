<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\PedidoAdminController;
use App\Http\Controllers\MensajeAdminController;
use App\Http\Controllers\VentaController;

// --- Nuevos Controladores Modulares del Admin ---
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\Admin\PedidoController;

/*
|--------------------------------------------------------------------------
| Declaracion de rutas
|--------------------------------------------------------------------------
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

Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/productos/{id}', [ProductoController::class, 'show'])->name('producto.detalle');

Route::get('/contacto', function () { return view('contacto'); });
Route::get('/comercializacion', function () { return view('comercializacion'); });
Route::get('/terminos-usos', function () { return view('terminos-usos'); })->name('terminos');

Route::post('/contacto/enviar', [ContactoController::class, 'enviar'])->name('contacto.enviar');

// --- RUTAS DE AUTENTICACIÓN ---
Route::get('/registro', [AuthController::class, 'formularioRegistro']);
Route::get('/login', [AuthController::class, 'formularioLogin'])->name('login');
Route::post('/registro', [AuthController::class, 'registrar'])->name('registrar');
Route::post('/login', [AuthController::class, 'autenticar']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| Rutas del Administrador
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'rol:admin'])->group(function () {
    
    // 1. Dashboard
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');

    // 2. Gestión de Usuarios
    Route::get('/admin/usuarios', [UsuarioController::class, 'index'])->name('admin.usuarios');
    Route::delete('/admin/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('admin.usuarios.eliminar');

    // 3. Gestión de Pedidos / Ventas
    Route::get('/admin/pedidos', [PedidoAdminController::class, 'index'])->name('admin.pedidos');
    Route::get('/admin/pedidos/{id}', [PedidoAdminController::class, 'show'])->name('admin.pedidos.show');
    Route::put('/admin/pedidos/{id}/estado', [PedidoController::class, 'update'])->name('admin.pedidos.estado');

    // 4. Gestión de Productos
    Route::get('/admin/productos', [ProductoController::class, 'adminIndex'])->name('admin.productos.index');
    Route::get('/admin/productos/crear', [ProductoController::class, 'create']);
    Route::post('/admin/productos', [ProductoController::class, 'store']);
    Route::get('/admin/productos/{id}/editar', [ProductoController::class, 'edit']);
    Route::put('/admin/productos/{id}', [ProductoController::class, 'update']);
    Route::delete('/admin/productos/{id}', [ProductoController::class, 'destroy']);

    // 5. Gestión de Mensajes de Contacto
    Route::get('/admin/mensajes', [MensajeAdminController::class, 'index'])->name('admin.mensajes');
    Route::put('/admin/mensajes/{id}/leido', [MensajeAdminController::class, 'marcarLeido'])->name('admin.mensaje.leido');
    Route::post('/admin/mensajes/{id}/responder', [MensajeAdminController::class, 'responder'])->name('admin.mensaje.responder');
    Route::get('/admin/mensajes/{id}', [MensajeAdminController::class, 'show'])->name('admin.mensaje.show');
    
});


/*
|--------------------------------------------------------------------------
| Rutas de Clientes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'rol:cliente'])->group(function () {
    
    // Panel y Pedidos
    Route::get('/cliente', [ClienteController::class, 'panel']);
    Route::get('/cliente/pedidos', [ClienteController::class, 'pedidos']);
    Route::get('/cliente/pedidos/{id}', [ClienteController::class, 'detallePedido'])->name('cliente.pedido.detalle');
    Route::get('/cliente/pedidos/{id}/ticket', [ClienteController::class, 'descargarTicketHistorial'])->name('cliente.pedido.ticket');
    
    // Carrito de Compras
    Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito');
    Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])->name('carrito.agregar');
    Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
    Route::post('/carrito/confirmar', [VentaController::class, 'confirmar'])->name('carrito.confirmar');
    Route::put('/carrito/actualizar/{id}', [CarritoController::class, 'actualizarCantidad'])->name('carrito.actualizar');
    Route::delete('/carrito/vaciar', [VentaController::class, 'vaciar'])->name('carrito.vaciar');

    // Confirmación y Ticket
    Route::get('/compra-confirmada', function () {
        if (!session('total')) { return redirect('/'); }
        return view('backend.usuarios.compra-confirmada');
    })->name('compra.confirmada');

    Route::get('/descargar-ticket', [VentaController::class, 'descargarTicket'])->name('ticket.descargar');

});