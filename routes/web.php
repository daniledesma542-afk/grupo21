<?php

use Illuminate\Support\Facades\Route;

// Ruta para la página principal
Route::get('/', function () {
    return view('inicio');
});

// Ruta para Quiénes Somos (crearás la vista despues)
Route::get('/quienes-somos', function () {
    return view('quienes-somos');
});

// Ruta para el Catálogo
Route::get('/catalogo', function () {
    return view('catalogo');
});

// Ruta para el Contacto (Guía 4)
Route::get('/contacto', function () {
    return view('contacto');
});

Route::get('/carrito', function () {
    return view('carrito');
});