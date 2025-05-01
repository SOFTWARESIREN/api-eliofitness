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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id('pago_id');
            $table->foreignId('suscripcion_id')->constrained('suscripciones_usuario')->onDelete('cascade');
            $table->decimal('monto', 10, 2)->check('monto > 0');
            $table->date('fecha');
            $table->string('metodo', 50);
            $table->string('estado', 20)->check("estado IN ('completado', 'pendiente', 'fallido')");
            $table->string('referencia', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
