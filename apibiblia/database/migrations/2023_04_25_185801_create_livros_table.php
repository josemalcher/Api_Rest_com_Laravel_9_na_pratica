<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->id();

            $table->integer('posicao');
            $table->string('nome');
            $table->string('abreviacao');

            $table->unsignedBigInteger('testamento_id');
            $table->unsignedBigInteger('versao_id')->nullable();

            $table->string('capa')->nullable();

            $table->timestamps();

            $table->foreign('testamento_id')->references('id')->on('testamentos');
            $table->foreign('versao_id')->references('id')->on('versoes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livros');
    }
};
