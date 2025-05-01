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
        Schema::create('perfiles', function (Blueprint $table) {
            $table->id('perfil_id');
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade');
            $table->decimal('altura', 5, 2)->nullable();
            $table->string('objetivo_principal', 50)->nullable();
            $table->string('nivel_actividad', 30)->nullable();
            $table->text('condiciones_medicas')->nullable();
            $table->text('alergias')->nullable();
            $table->string('experiencia_ejercicio', 30)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perfiles');
    }
};
