<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContenidosTable extends Migration
{
    public function up()
    {
        // create table
        Schema::create('contenidos', function (Blueprint $table) {
            $table->increments('id');
            $table->string("ficha_id");
            $table->string("docente_id");
            $table->text('competencia_id');
            // $table->text("resultado_de_aprendizaje");
            $table->string("horas");
            $table->timestamps();
        });
    }

    public function down()
    {
        // drop table
        Schema::dropIfExists('contenidos');
    }
}
