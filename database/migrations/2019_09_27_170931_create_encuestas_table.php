<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuestas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha_registro');
            $table->string('recepcion_atencion');
            $table->string('recepcion_tiempo_espera');
            $table->string('tramite_realizado');
            
            $table->bigInteger('id_servidor_publico')->unsigned();
            $table->foreign('id_servidor_publico')->references('id')->on('cat_servidor_publicos')->onDelete('cascade');
            $table->bigInteger('id_tipo_servidor_publico')->unsigned();
            $table->foreign('id_tipo_servidor_publico')->references('id')->on('cat_tipo_servidor_publicos')->onDelete('cascade');

            $table->string('servidor_atencion');
            $table->string('servidor_tiempo_atencion');
            $table->text('observaciones');

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
        Schema::dropIfExists('encuestas');
    }
}
