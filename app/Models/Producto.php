<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';

    protected $fillable = [
        'nombre',
        'codigo_producto',
        'descripcion',
        'unidad_medida',
        'valor_unitario',
        'iva',
        'observaciones',
        'categoria_id',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function movimientos()
    {
        return $this->hasMany(Movimiento::class, 'producto_id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
