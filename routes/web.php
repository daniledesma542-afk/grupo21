<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/carrito', function () {
    return view('carrito');
});

Route::get('/terminos_usos', function () {
    return view('terminos_usos');
});

Route::get('/comercializacion', function () {
    return view('comercializacion');
});

use App\Http\Controllers\ContactoController;

Route::post('/contacto/enviar', [ContactoController::class, 'enviar'])->name('contacto.enviar');