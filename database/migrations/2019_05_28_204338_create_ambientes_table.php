<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmbientesTable extends Migration
{
    public function up()
    {
        // create table
        Schema::create('ambientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero')->unique();
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down()
    {
        // drop table
        Schema::dropIfExists('ambientes');
    }
}
