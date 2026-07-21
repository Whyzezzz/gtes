<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('carrinho', function (Blueprint $table) {
            $table->id('id_carrinho');
            $table->foreignId('id')->constrained('users', 'id');
            $table->foreignId('id_jogo')->constrained('jogos', 'id_jogo');
            $table->integer('quantidade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carrinho');
    }
};
