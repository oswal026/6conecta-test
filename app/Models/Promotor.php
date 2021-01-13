<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotor extends Model
{

    protected $table = 'promotores';

    protected $fillable = [
        'id', 'nombre'
    ];

    public $timestamps = false;

    /**
     * Obtiene los conciertos de un promotor.
     */
    public function conciertos()
    {
        return $this->hasMany(Concierto::class);
    }
}
