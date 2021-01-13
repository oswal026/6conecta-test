<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConciertoMedio extends Model
{

    protected $table = 'conciertos_medios';

    protected $fillable = [
        'id', 'id_medio', 'id_concierto'
    ];

    public $timestamps = false;
}
