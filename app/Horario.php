<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kjjdion\Laracrud\Traits\ColumnFillable;

class Horario extends Model
{
    use ColumnFillable;
    protected $fillable = [
        'docente_id',
        'competencia_id',
        'ambiente_id',
        'ficha_id',
        'hora_inicio',
        'hora_fin',
        'jornada',
        'dia'
    ];

    function docente(){
       return $this->belongsTo(Docente::class);
    }

    function competencia(){
       return $this->belongsTo(Competencia::class);
    }

    function ficha(){
       return $this->belongsTo(Ficha::class);
    }
}
