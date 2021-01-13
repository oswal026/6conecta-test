<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Concierto extends Model
{

    protected $table = 'conciertos';

    protected $fillable = [
        'id', 'id_promotor', 'id_recinto', 'nombre', 'numero_espectadores', 'fecha', 'rentabilidad'
    ];

    public $timestamps = false;

    /**
     * Obtiene el promotor de un concierto.
     */
    public function promotor()
    {
        return $this->belongsTo(Promotor::class);
    }

    /**
     * Obtiene el recinto de un concierto.
     */
    public function recinto()
    {
        return $this->belongsTo(Recinto::class);
    }

    /**
     * Obtiene los grupos que pertenecen al concierto
     */
    public function grupos()
    {
        return $this->belongsToMany(Grupo::class, 'conciertos_grupos', 'id_concierto', 'id_grupo')->as('conciertosgrupos')->withPivot('id');
    }

    /**
     * Obtiene los medios que pertenecen al concierto
     */
    public function medios()
    {
        return $this->belongsToMany(Medio::class, 'conciertos_medios', 'id_concierto', 'id_medio')->as('conciertosmedios')->withPivot('id');
    }
}
