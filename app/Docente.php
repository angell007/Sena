<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kjjdion\Laracrud\Traits\ColumnFillable;

class Docente extends Model
{
    use ColumnFillable;
    protected $fillable = [
        'documento',
        'nombre',
        'apellido',
        'tipo_id'
    ];

    function tipo(){
        return $this->belongsTo(Tipo::Class);
    }

    function getTipo($id){
        $tipo = Tipo::findOrfail($id);
        return $tipo;
    }
}
