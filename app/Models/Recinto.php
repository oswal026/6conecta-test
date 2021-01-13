<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recinto extends Model
{

    protected $table = 'recintos';

    protected $fillable = [
        'id', 'nombre', 'coste_alquiler', 'precio_entrada'
    ];

    public $timestamps = false;

    /**
     * Obtiene los conciertos de un recinto.
     */
    public function conciertos()
    {
        return $this->hasMany(Concierto::class);
    }
}
