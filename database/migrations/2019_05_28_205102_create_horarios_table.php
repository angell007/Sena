<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorariosTable extends Migration
{
    public function up()
    {
        // create table
        Schema::create('horarios', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('docente_id');
            $table->unsignedInteger('competencia_id');
            $table->unsignedInteger('ficha_id');
            $table->string('hora_inicio');
            $table->string('hora_fin');
            $table->string('jornada');
            $table->string('dia');
            $table->timestamps();
        });
    }

    public function down()
    {
        // drop table
        Schema::dropIfExists('horarios');
    }
}
