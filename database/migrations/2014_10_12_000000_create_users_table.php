<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellidop');
            $table->string('apellidom');
            $table->string('telefono');
            $table->string('email')->unique();
            $table->timestamp('email_verificado')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('rol_id')->nullable();
            $table->foreign('rol_id')
                    ->references('id')->on('rols')
                    ->onDelete('set null');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
