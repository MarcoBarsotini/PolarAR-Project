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
        Schema::create('ordem_de_servico', function (Blueprint $table) {
            $table->id();
            $table->string('OS_IDENTIFICACAO');
            $table->string('OS_TIPO');
            $table->string('OS_DATA_ENTRADA');
            $table->string('OS_CLITENTE_RESPONSAVEL');
            $table->string('OS_FUNCIONARIO_RESPONSAVEL');
            $table->string('OS_DATA_PREVISAO');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('os');
    }
};
