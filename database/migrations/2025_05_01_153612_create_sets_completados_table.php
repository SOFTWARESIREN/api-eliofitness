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
            $table->foreignId('ejercicio_rutina_id')->constrained('ejercicios_rutina')->onDelete('restrict');
            $table->integer('repeticiones_completadas')->nullable();
            $table->decimal('peso_usado', 6, 2)->nullable();
            $table->string('unidad_peso', 10)->nullable();
            $table->boolean('completado')->default(true);
            $table->text('notas')->nullable();
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
