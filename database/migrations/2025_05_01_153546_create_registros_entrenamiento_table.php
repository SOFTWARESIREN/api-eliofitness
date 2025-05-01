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
        Schema::create('registros_entrenamiento', function (Blueprint $table) {
            $table->id('registro_id');
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade');
            $table->foreignId('rutina_id')->nullable()->constrained('rutinas')->onDelete('set null');
            $table->foreignId('dia_id')->nullable()->constrained('dias_rutina')->onDelete('set null');
            $table->date('fecha');
            $table->time('hora_inicio')->nullable();
            $table->time('hora_fin')->nullable();
            $table->text('notas')->nullable();
            $table->integer('valoracion')->nullable()->check('valoracion BETWEEN 1 AND 5');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registros_entrenamiento');
    }
};
