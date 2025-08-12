<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    use HasFactory;

    protected $table = 'salidas';

    protected $fillable = [
        'existencia_id',
        'cantidad',
        'usuario_id',
        'fecha_salida',
        'observaciones',
    ];

    public function existencia()
    {
        return $this->belongsTo(Existencia::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
