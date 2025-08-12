<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedores';

    public function movimientos()
    {
        return $this->hasMany(Movimiento::class, 'proveedor_id');
    }
}
