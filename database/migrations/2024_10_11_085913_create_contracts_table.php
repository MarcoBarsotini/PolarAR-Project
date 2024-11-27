<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    public function up() {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contractor_id');
            $table->unsignedBigInteger('contracted_id');
            $table->text('descricao_servico');
            $table->string('status')->default('pendente');
            $table->timestamps();

            $table->foreign('contractor_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('contracted_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('contracts');
    }
}