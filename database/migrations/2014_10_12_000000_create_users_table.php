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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('profile_photo')->nullable();
            $table->string('descricao_perfil');
            $table->unsignedTinyInteger('user_rating')->default(0);
            $table->string('user_type')->default('cliente');
            $table->string('user_class')->default('nada');
            $table->string('user_isAdmin')->default('false');
            
            $table->date('CLIENTE_DATA_NASC')->nullable();
            $table->string('CLIENTE_TEL')->nullable()->unique();
            $table->string('CLIENTE_CPF')->nullable()->unique();
            $table->string('CLIENTE_ENDERECO')->nullable();
            $table->string('CLIENTE_CEP')->nullable();
            $table->string('CLIENTE_CIDADE')->nullable();
            $table->string('CLIENTE_ESTADO')->nullable();
            $table->string('CLIENTE_PAIS')->nullable();
            $table->string('CLIENTE_IP')->nullable();
            
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
