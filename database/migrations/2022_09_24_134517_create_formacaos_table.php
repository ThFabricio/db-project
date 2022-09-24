<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formacaos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->unsignedBigInteger('id_pesquisador');
            $table->timestamps();

            $table->foreign('id_pesquisador')->references('id')->on('pesquisadors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formacaos');
    }
};
