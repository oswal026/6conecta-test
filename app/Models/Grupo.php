<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{

    protected $table = 'grupos';

    protected $fillable = [
        'id', 'nombre', 'cache'
    ];

    public $timestamps = false;

    /**
     * Obtiene los conciertos en los que participa el grupo
     */
    public function conciertos()
    {
        return $this->belongsToMany(Concierto::class,'conciertos_grupos', 'id_grupo', 'id_concierto');
    }
}
