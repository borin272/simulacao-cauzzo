<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paciente_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('medico_id')->constrained('users')->cascadeOnDelete();
            $table->string('data_consulta');
            $table->string('status')->default('Agendada'); // Agendada, Concluída, Cancelada
            $table->text('anotacoes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('consultas');
    }
};
