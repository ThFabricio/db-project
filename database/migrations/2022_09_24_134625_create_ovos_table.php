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
        Schema::create('ovos', function (Blueprint $table) {
            $table->id();
            $table->unsignedDouble('peso');
            $table->unsignedBigInteger('id_historico');
            $table->timestamps();

            $table->foreign('id_historico')->references('id')->on('historicos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ovos');
    }
};
