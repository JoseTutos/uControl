<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bodega extends Model
{
    protected $table = 'bodegas';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'ubicacion',
        'capacidad',
        'estado',
    ];

    public function movimientos()
    {
        return $this->hasMany(Movimiento::class, 'bodega_id');
    }

    public function existencias()
    {
        return $this->hasMany(Existencia::class, 'bodega_id');
    }
}
