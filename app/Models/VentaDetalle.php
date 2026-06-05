<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VentaDetalle extends Model
{
    // 1. Le decimos a qué tabla de la base de datos pertenece
    protected $table = 'ventas_detalle';

    // 2. Le decimos qué campos se pueden llenar
    protected $fillable = [
        'venta_id', 'producto_id', 'cantidad', 'precio_unitario', 'subtotal',
    ];

    // 3. Relación: Este renglón pertenece a una venta general (la cabecera)
    public function venta()
    {
        return $this->belongsTo(VentaCabecera::class, 'venta_id');
    }

    // 4. Relación: Este renglón es sobre un producto específico de tu tienda
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}