<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medio extends Model
{

    protected $table = 'medios';

    protected $fillable = [
        'id', 'nombre'
    ];

    public $timestamps = false;

    /**
     * Obtiene los conciertos que han sido publicitados por el medio
     */
    public function conciertos()
    {
        return $this->belongsToMany(Concierto::class, 'conciertos_medios', 'id_medio', 'id_concierto');
    }
}
