<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;

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

Route::get('/terminos_usos', function () {
    return view('terminos_usos');
})->name('terminos');

Route::post('/contacto/enviar', [ContactoController::class, 'enviar'])
    ->name('contacto.enviar');