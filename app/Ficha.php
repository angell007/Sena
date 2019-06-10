<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kjjdion\Laracrud\Traits\ColumnFillable;

class Ficha extends Model
{
    use ColumnFillable;
    function modalidad(){
        return $this->belongsTo(Modalidad::class);
     }

     function docecentes(){
        return $this->hasMany(Docente::class);
     }

     function horarios(){
        return $this->hasMany(Horario::class);
     }

     protected $fillable = [
       'nombre',
       'modalidad_id',
       'jornada',
       'trimestre_formacion',
       'horas',
       'ref'

     ];
}
