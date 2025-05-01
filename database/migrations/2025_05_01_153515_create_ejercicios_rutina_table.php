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
        Schema::create('ejercicios_rutina', function (Blueprint $table) {
            $table->id('ejercicio_rutina_id');
            $table->foreignId('dia_id')->constrained('dias_rutina')->onDelete('cascade');
            $table->foreignId('ejercicio_id')->constrained('ejercicios')->onDelete('restrict');
            $table->integer('sets')->nullable();
            $table->string('repeticiones', 50)->nullable();
            $table->string('peso', 30)->nullable();
            $table->integer('descanso')->nullable();
            $table->integer('orden')->nullable();
            $table->text('notas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ejercicios_rutina');
    }
};
