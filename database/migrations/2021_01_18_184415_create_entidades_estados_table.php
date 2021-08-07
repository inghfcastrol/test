<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntidadesEstadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entidades_estados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('entidad_id')->unsigned();
            $table->integer('estado_id')->unsigned();
            $table->boolean('en_uso');
            $table->integer('numero_ordenamiento');
            $table->timestamps();
            $table->foreign('entidad_id')->references('id')->on('entidades');
            $table->foreign('estado_id')->references('id')->on('estados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entidades_estados');
    }
}
