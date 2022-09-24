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
        Schema::create('albumens', function (Blueprint $table) {
            $table->id();
            $table->unsignedDouble('peso');
            $table->unsignedDouble('altura');
            $table->unsignedDouble('diametro');
            $table->unsignedDouble('unidade_haugh');
            $table->unsignedInteger('ph');
            $table->unsignedBigInteger('id_ovo');
            $table->timestamps();

            $table->foreign('id_ovo')->references('id')->on('ovos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('albumens');
    }
};
