<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichasTable extends Migration
{
    public function up()
    {
        // create table
        Schema::create('fichas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string("modalidad_id");
            $table->string("jornada");
            $table->string("trimestre_formacion");
            $table->string("horas");
            $table->string("ref")->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        // drop table
        Schema::dropIfExists('fichas');
    }
}
