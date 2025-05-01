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
        Schema::create('horarios_entrenadores', function (Blueprint $table) {
            $table->id('horario_id');
            $table->foreignId('empleado_id')->constrained('empleados')->onDelete('cascade');
            $table->string('dia_semana', 10);
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->unique(['empleado_id', 'dia_semana', 'hora_inicio', 'hora_fin']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios_entrenadores');
    }
};
