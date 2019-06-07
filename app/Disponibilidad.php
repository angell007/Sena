<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disponibilidad extends Model
{
    protected $guarded = [];


        public function ambiente(){
            return $this->belongsTo(Ambiente::class);
        }

        public function secion(){
            return $this->belongsTo(Secion::class);
        }



}
