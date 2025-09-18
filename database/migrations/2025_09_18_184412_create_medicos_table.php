<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('medicos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('crm')->unique();
            $table->string('especialidade');
            $table->string('telefone')->nullable();
            $table->string('horarios_atendimento')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('medicos');
    }
};
