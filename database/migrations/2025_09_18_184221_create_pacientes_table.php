<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('cpf')->unique();
            $table->string('telefone')->nullable();
            $table->string('endereco')->nullable();
            $table->string('data_nascimento')->nullable();
            $table->string('convenio')->nullable();
            $table->string('observacoes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('pacientes');
    }
};
