<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Existencia extends Model
{
    protected $fillable = [
        'producto_id',
        'cliente_id',
        'bodega_id',
        'cantidad_actual',
        'espacio_ocupado',
        'stock_minimo',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function bodega()
    {
        return $this->belongsTo(Bodega::class);
    }
}
