<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //Essa função cria palavras novas
    public function up(): void
    {
        Schema::create('termo', function (Blueprint $table) {
            $table->id();
            $table->string('palavras-do-termo');
        });
    }

    //Caso a palavra já exista, a palavra não será criada
    public function down(): void
    {
        Schema::dropIfExists('termo');
    }
};
