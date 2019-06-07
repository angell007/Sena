<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kjjdion\Laracrud\Traits\ColumnFillable;

class Secion extends Model
{
    use ColumnFillable;
    protected $fillable = [
        'docente_id',
        'competencia_id',
        'ambiente_id',
        // 'ficha_id',
        'hora_inicio',
        'hora_fin',
        'jornada',
        'dia'
    ];

    function docente(){
       return $this->belongsTo(Docente::class);
    }

    function ambiente(){
        return $this->belongsTo(Ambiente::class);
     }

    function competencia(){
       return $this->belongsTo(Competencia::class);
    }

    function ficha(){
       return $this->belongsTo(Ficha::class);
    }
}
