<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kjjdion\Laracrud\Traits\ColumnFillable;

class Contenido extends Model
{
    use ColumnFillable;
    protected $fillable = [
        'docente_id',
        'competencia_id',
        'ficha_id',
        'horas'

        
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
