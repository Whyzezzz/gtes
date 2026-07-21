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
        Schema::create('jogos_comprados', function (Blueprint $table) {
            $table->foreignId('id')->constrained('users','id');
            $table->foreignId('id_compra')->constrained('compras','id_compra');
            $table->foreignId('id_jogo')->constrained('jogos', 'id_jogo');
            $table->string('hash');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jogos_comprados');
    }
};
