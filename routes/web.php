<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('inicio');
});
Route::get('/comercializacion', function () {
    return view('comercializacion');
});

Route::get('/productos', function () {
    return view('productos');
});

Route::get('/contacto', function () {
    return view('contacto');
});

Route::get('/terminos', function () {
    return view('terminos');
});

Route::get('/quienes', function () {
    return view('quienes');
});