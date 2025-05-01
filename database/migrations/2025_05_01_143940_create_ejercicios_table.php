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
        Schema::create('ejercicios', function (Blueprint $table) {
            $table->id('ejercicio_id');
            $table->string('nombre', 100);
            $table->string('categoria', 50)->nullable();
            $table->string('grupo_muscular', 50)->nullable();
            $table->string('nivel_dificultad', 20)->nullable();
            $table->text('descripcion')->nullable();
            $table->text('instrucciones')->nullable();
            $table->string('video_url', 255)->nullable();
            $table->string('imagen_url', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ejercicios');
    }
};
