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
        Schema::create('participaciones_reto', function (Blueprint $table) {
            $table->id('participacion_id');
            $table->foreignId('reto_id')->constrained('retos')->onDelete('cascade');
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade');
            $table->date('fecha_union');
            $table->string('estado', 20)->check("estado IN ('activo', 'completado', 'abandonado')");
            $table->decimal('progreso', 5, 2)->check('progreso BETWEEN 0 AND 100');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participaciones_reto');
    }
};
