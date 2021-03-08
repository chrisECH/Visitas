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
            $table->string('asignatura2',100);
            $table->integer('semestre2');
            $table->integer('numAlumnos2');
            $table->integer('totalAlumnos');
            $table->text('objetivo');
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
        Schema::dropIfExists('info_academicas');
    }
}
