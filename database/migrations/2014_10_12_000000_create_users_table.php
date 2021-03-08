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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellidop');
            $table->string('apellidom');
            $table->string('telefono');
            $table->string('email')->unique(); 
            $table->string('password');
            $table->string('foto')->nullable();
            $table->timestamp('email_verificado')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreignId('rol_id')->after('foto');
            $table->foreignId('departamento_id')->after('foto');
            $table->foreign('rol_id')
                    ->references('id')->on('rols')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('departamento_id')
                    ->references('id')->on('departamentos')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            
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
