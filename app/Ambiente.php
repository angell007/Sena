<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kjjdion\Laracrud\Traits\ColumnFillable;

class Ambiente extends Model
{
    use ColumnFillable;
    protected $fillable =[
        'numero',
        'nombre'
    ];
}
