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
        Schema::create('localizacaos', function (Blueprint $table) {
            $table->id();
            $table->string('endereco');
            $table->unsignedBigInteger('id_granja');
            $table->timestamps();

            $table->foreign('id_granja')->references('id')->on('granjas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('localizacaos');
    }
};
