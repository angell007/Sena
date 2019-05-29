<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kjjdion\Laracrud\Traits\ColumnFillable;

class Competencia extends Model
{
    use ColumnFillable;
    protected $fillable = [
        'name',
        'descripcion'
    ];
}
