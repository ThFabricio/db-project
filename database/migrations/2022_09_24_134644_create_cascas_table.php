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
        Schema::create('cascas', function (Blueprint $table) {
            $table->id();
            $table->unsignedDouble('peso');
            $table->unsignedInteger('cor');
            $table->unsignedInteger('espessura1');
            $table->unsignedInteger('espessura2');
            $table->unsignedInteger('espessura3');
            $table->unsignedBigInteger('id_ovo');
            $table->timestamps();

            $table->foreign('id_ovo')->references('id')->on('ovos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cascas');
    }
};
