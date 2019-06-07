<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisponibilidadsTable extends Migration
{
    public function up()
    {
        // create table
        Schema::create('disponibilidads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('dia');
            $table->string('hora_inicio');
            $table->string('hora_fin');
            $table->string('jornada');
            $table->string('ambiente_id');
            $table->string('secion_id');
            $table->string('him');
            $table->string('hfm');
            $table->timestamps();
        });
    }

    public function down()
    {
        // drop table
        Schema::dropIfExists('disponibilidads');
    }
}
