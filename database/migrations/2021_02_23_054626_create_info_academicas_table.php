<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoAcademicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_academicas', function (Blueprint $table) {
            $table->id();
            $table->string('asignatura1',100);
            $table->integer('semestre1');
            $table->integer('numAlumnos1');
            $table->string('asignatura2',100)->nullable();
            $table->integer('semestre2')->nullable();
            $table->integer('numAlumnos2')->nullable();
            $table->integer('totalAlumnos');
            $table->text('objetivo');
            $table->foreignId('solicitud_id');
            $table->foreignId('carrera_id');

            $table->foreign('solicitud_id')
                ->references('id')->on('solicituds')
                ->onUpdate('cascade')
                ->onUpdate('cascade');
            
            $table->foreign('carrera_id')
                ->references('id')->on('carreras')
                ->onUpdate('cascade')
                ->onDelete('no action');
            


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info_academicas');
    }
}
