<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocentesTable extends Migration
{
    public function up()
    {
        // create table
        Schema::create('docentes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('documento')->unique();
            $table->string('name');
            $table->string('apellido');
            $table->string('tipo_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        // drop table
        Schema::dropIfExists('docentes');
    }
}
