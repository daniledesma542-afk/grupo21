<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto; // Importamos el modelo

class ProductoController extends Controller
{
    public function probarCRUD()
    {
        // 1. Armamos un array con todos tus productos
        $listaProductos = [
            ['nombre' => 'Vela de Canela', 'descripcion' => 'Calidez botánica. Vela especiada con notas de naranja, canela y anís estrellado. Hecha a mano.', 'precio' => 16700, 'stock' => 15],
            ['nombre' => 'Vela de Eucalipto', 'descripcion' => 'Refugio natural. Notas botánicas de eucalipto y cedro en un diseño clásico ámbar.', 'precio' => 14900, 'stock' => 15],
            ['nombre' => 'Tarot Rider', 'descripcion' => 'El clásico indiscutido. Tarot Rider Waite. Simbología vintage y la mejor puerta de entrada al tarot.', 'precio' => 11200, 'stock' => 10],
            ['nombre' => 'Serpentina', 'descripcion' => 'Energía y arraigo. Piedra Serpentina natural. Tu aliada para desbloquear, sanar y volver a tu centro.', 'precio' => 6000, 'stock' => 20],
            ['nombre' => 'Sahumerio Rosas y Olíbano', 'descripcion' => 'Armonía y limpieza por Sagrada Madre. El equilibrio perfecto para purificar y endulzar la energía.', 'precio' => 4800, 'stock' => 30],
            ['nombre' => 'Palo Santo y Rosas', 'descripcion' => 'Limpieza dulce. Sahumerio artesanal. Humo sagrado para purificar tu espacio y abrir el corazón.', 'precio' => 3700, 'stock' => 30],
            ['nombre' => 'Palo Santo y Fresias', 'descripcion' => 'Frescura y renovación. Humo sagrado por Sagrada Madre para limpiar tu espacio y levantar la energía.', 'precio' => 5400, 'stock' => 30],
            ['nombre' => 'Kit Aura Suave', 'descripcion' => 'Equilibra tu energía. Kit con productos para crear un ambiente armonioso y revitalizante.', 'precio' => 29000, 'stock' => 5],
            ['nombre' => 'Kit Arcilla', 'descripcion' => 'Pausa terrenal. Kit de limpieza energética con piezas de arcilla, salvia y palo santo.', 'precio' => 31000, 'stock' => 5],
            ['nombre' => 'Piedra Jaspe', 'descripcion' => 'Piedra de la tierra. Poderosa para la limpieza energética y el equilibrio. Ideal para rituales.', 'precio' => 2700, 'stock' => 20],
            ['nombre' => 'Cuarzo Aura Angel', 'descripcion' => 'Luz y suavidad lunar. Cristales opalescentes pulidos para conectar con tu intuición y calma.', 'precio' => 2400, 'stock' => 20],
            ['nombre' => 'Amatista', 'descripcion' => 'Piedra transmutadora. Poderosa para la limpieza energética y el equilibrio. Ideal para meditar.', 'precio' => 3100, 'stock' => 20],
            ['nombre' => 'Aceite de Rosas', 'descripcion' => 'Aceite esencial de rosas para hidratación y rejuvenecimiento. Ideal para rutinas de cuidado personal.', 'precio' => 2860, 'stock' => 15],
            ['nombre' => 'Aceite de Naranja', 'descripcion' => 'Alegría cítrica. Aceite esencial puro de naranja dulce. Vitalidad, frescura y energía positiva en cada gota.', 'precio' => 3000, 'stock' => 15],
            ['nombre' => 'Oráculo de la Intuición', 'descripcion' => 'Inspiración diaria. Oráculo de bolsillo con mensajes claros y arte vibrante para despertar tu intuición.', 'precio' => 12500, 'stock' => 10],
            ['nombre' => 'Oráculo de las Diosas', 'descripcion' => 'Poder femenino. Oráculo de bolsillo con símbolos sagrados y mensajes inspiradores para guiar tu camino.', 'precio' => 15000, 'stock' => 10],
            ['nombre' => 'Aceite de Manzanilla', 'descripcion' => 'Calma y confort. Aceite esencial puro de manzanilla para aliviar el estrés y promover el sueño profundo.', 'precio' => 2000, 'stock' => 15],
            ['nombre' => 'Sahumador', 'descripcion' => 'Purificación y equilibrio. Sahumador de calidad para crear un ambiente espiritual armonioso.', 'precio' => 4300, 'stock' => 20],
            ['nombre' => 'Budas Estatuas', 'descripcion' => 'Inspiración y paz. Budas de cerámica para cultivar la meditación y la serenidad.', 'precio' => 12400, 'stock' => 8],
            ['nombre' => 'Hornito Nube', 'descripcion' => 'Calidad y estilo. Hornito de diseño moderno para disfrutar de tu aroma favorito.', 'precio' => 7800, 'stock' => 10],
        ];

        // Vaciamos la tabla primero por si recargás la página sin querer, así no se te duplican.
        Producto::truncate();

        // 2. CREAR: Recorremos la lista y creamos cada producto en la base de datos
        foreach ($listaProductos as $item) {
            Producto::create($item);
        }

        // 3. LEER: Traemos todos los productos desde la base de datos
        $todos = Producto::all();

        // 4. Mostramos el resultado en el navegador
        return response()->json([
            'mensaje' => '¡Productos cargados con éxito!',
            'total_productos' => $todos->count(),
            'catalogo' => $todos
        ]);
    }
}