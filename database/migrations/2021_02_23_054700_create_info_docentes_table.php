<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_docentes', function (Blueprint $table) {
            $table->id();
            $table->string('docentePrincipal');
            $table->string('emailPrincipal');
            $table->string('telefonoPrincipal');

            $table->string('docenteAcom')->nullable();
            $table->string('emailAcom')->nullable();
            $table->string('telefonoAcom')->nullable();

            $table->string('docenteSuplente')->nullable();
            $table->string('emailSuplente')->nullable();
            $table->string('telefonoSuplente')->nullable();

            $table->foreignId('solicitud_id');

            $table->foreign('solicitud_id')
                ->references('id')->on('solicituds')
                ->onUpdate('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info_docentes');
    }
}
