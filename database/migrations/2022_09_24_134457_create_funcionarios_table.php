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
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->string('regime_contratacao');
            $table->decimal('salario');
            $table->unsignedBigInteger('id_granja')->nullable();
            $table->unsignedBigInteger('id_usuario');
            $table->timestamps();

            $table->foreign('id_granja')->references('id')->on('granjas')->onDelete('set null');
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcionarios');
    }
};
