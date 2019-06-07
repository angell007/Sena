<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompetenciasTable extends Migration
{
    public function up()
    {
        // create table
        Schema::create('competencias', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('name');
            $table->longText('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        // drop table
        Schema::dropIfExists('competencias');
    }
}
