<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicituds', function (Blueprint $table) {
            $table->id();
            $table->string('folio',25);
            $table->string('tipoVisita',25)->nullable();
            $table->char('autorizacion', 1)->comment('0 = no autorizado, 1 = autorizado, 2 = pendiente por autorizar, 3=cancelada'); 
            $table->text('observaciones')->nullable();
            $table->foreignId('user_id')->nullable();

            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onUpdate('cascade')
                    ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicituds');
    }
}
