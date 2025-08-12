<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = [
        'nombre',
        'nit',
        'direccion',
        'telefono',
        'email',
        'nombre_contacto',
        'estado',
    ];

    public $timestamps = false;

    public function movimientos()
    {
        return $this->hasMany(Movimiento::class, 'cliente_id');
    }
}
