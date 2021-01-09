<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('rol_id')->after('foto');
            $table->foreignId('depto_id')->after('foto');
            $table->foreign('rol_id')
                    ->references('id')->on('rols')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('depto_id')
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
        //
    }
}
