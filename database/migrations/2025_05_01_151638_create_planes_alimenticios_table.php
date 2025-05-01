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
        Schema::create('planes_alimenticios', function (Blueprint $table) {
            $table->id('plan_id');
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade');
            $table->string('nombre', 100);
            $table->date('fecha_creacion')->default(DB::raw('CURRENT_DATE'));
            $table->integer('calorias_objetivo')->nullable();
            $table->integer('proteinas_objetivo')->nullable();
            $table->integer('carbohidratos_objetivo')->nullable();
            $table->integer('grasas_objetivo')->nullable();
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planes_alimenticios');
    }
};
