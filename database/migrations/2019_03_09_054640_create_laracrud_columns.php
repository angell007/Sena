<?php

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaracrudColumns extends Migration
{
    public function up()
    {
        // add columns to users table
        Schema::table('users', function (Blueprint $table) {
            $table->string('role');
        });

        // create default admin user
        User::create([
            'name' => 'Admin',
            'email' => 'senahorarios@sena.com',
            'password' => Hash::make('sena_bca'),
            'role' => 'Admin',
        ]);
    }

    public function down()
    {
        // remove columns from users table
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });

        // delete default admin user
        User::where('email', 'senahorarios@senacom')->delete();
    }
}
