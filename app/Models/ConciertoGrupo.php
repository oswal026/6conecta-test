<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConciertoGrupo extends Model
{

    protected $table = 'conciertos_grupos';

    protected $fillable = [
        'id', 'id_grupo', 'id_concierto'
    ];

    public $timestamps = false;

}
