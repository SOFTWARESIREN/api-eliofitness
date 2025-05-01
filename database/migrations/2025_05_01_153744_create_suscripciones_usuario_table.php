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
        Schema::create('suscripciones_usuario', function (Blueprint $table) {
            $table->id('suscripcion_id');
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade');
            $table->foreignId('membresia_id')->constrained('membresias')->onDelete('restrict');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('estado', 20)->check("estado IN ('activa', 'cancelada', 'pendiente')");
            $table->string('metodo_pago', 50)->nullable();
            $table->boolean('renovacion_automatica')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suscripciones_usuario');
    }
};
