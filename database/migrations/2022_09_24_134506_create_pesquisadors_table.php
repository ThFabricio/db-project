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
        Schema::create('pesquisadors', function (Blueprint $table) {
            $table->id();
            $table->string('universidade');
            $table->unsignedBigInteger('id_pesquisador_supervisor');
            $table->timestamps();

            $table->foreign('id_pesquisador_supervisor')->references('id')->on('pesquisadors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesquisadors');
    }
};
