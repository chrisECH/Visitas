<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoInstanciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_instancias', function (Blueprint $table) {
            $table->id();
            $table->string('instancia');
            $table->string('entidad');
            $table->date('fecha');
            $table->time('hora');
            $table->string('domicilio')->nullable();
            $table->string('contacto')->nullable();
            $table->string('puesto')->nullable();
            $table->string('telefono')->nullable();
            $table->string('correo')->nullable();

            $table->string('instanciaSustituta')->nullable();
            $table->string('entidadSustituta')->nullable();
            $table->string('domicilioSustituta')->nullable();
            $table->string('contactoSustituta')->nullable();
            $table->string('puestoSustituta')->nullable();
            $table->string('telefonoSustituta')->nullable();
            $table->string('correoSustituta')->nullable();

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
        Schema::dropIfExists('info_instancias');
    }
}
