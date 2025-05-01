<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id('pedido_id');
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('restrict');
            $table->date('fecha')->default(DB::raw('CURRENT_DATE'));
            $table->string('estado', 30)->check("estado IN ('pendiente', 'procesando', 'enviado', 'entregado', 'cancelado')");
            $table->text('direccion_envio');
            $table->string('metodo_pago', 50);
            $table->decimal('total', 10, 2)->check('total >= 0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
