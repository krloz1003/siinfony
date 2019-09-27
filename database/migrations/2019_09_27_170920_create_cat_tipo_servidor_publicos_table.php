<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatTipoServidorPublicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_tipo_servidor_publicos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_servidor_publico')->unsigned();
            $table->foreign('id_servidor_publico')->references('id')->on('cat_servidor_publicos')->onDelete('cascade');
            $table->string('nombre');
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
        Schema::dropIfExists('cat_tipo_servidor_publicos');
    }
}
