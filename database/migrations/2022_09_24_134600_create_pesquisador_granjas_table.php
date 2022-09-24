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
        Schema::create('pesquisador_granjas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pesquisador');
            $table->unsignedBigInteger('id_granja');
            $table->timestamps();

            $table->foreign('id_pesquisador')->references('id')->on('pesquisadors');
            $table->foreign('id_granja')->references('id')->on('granjas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesquisador_granjas');
    }
};
