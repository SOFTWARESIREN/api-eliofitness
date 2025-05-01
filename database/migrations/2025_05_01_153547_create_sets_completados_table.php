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
        Schema::create('sets_completados', function (Blueprint $table) {
            $table->id('set_id');
            $table->foreignId('registro_id')->constrained('registros_entrenamiento')->onDelete('cascade');
            $table->foreignId('ejercicio_id')->constrained('ejercicios')->onDelete('restrict');
            $table->integer('numero_set');
            $table->integer('repeticiones')->nullable();
            $table->decimal('peso', 6, 2)->nullable();
            $table->integer('duracion_segundos')->nullable();
            $table->string('notas', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sets_completados');
    }
};
