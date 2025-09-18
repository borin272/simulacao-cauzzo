<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('prescricoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('consulta_id')->constrained()->cascadeOnDelete();
            $table->string('medicamento');
            $table->string('posologia')->nullable();
            $table->text('observacoes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('prescricoes');
    }
};
