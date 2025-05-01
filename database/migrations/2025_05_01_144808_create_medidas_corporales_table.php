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
        Schema::create('medidas_corporales', function (Blueprint $table) {
            $table->id('medida_id');
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade');
            $table->date('fecha');
            $table->decimal('peso', 5, 2)->nullable();
            $table->decimal('porcentaje_grasa', 5, 2)->nullable()->check('porcentaje_grasa BETWEEN 0 AND 100');
            $table->decimal('porcentaje_musculo', 5, 2)->nullable()->check('porcentaje_musculo BETWEEN 0 AND 100');
            $table->decimal('imc', 5, 2)->nullable();
            $table->decimal('circunferencia_cintura', 5, 2)->nullable();
            $table->decimal('circunferencia_cadera', 5, 2)->nullable();
            $table->decimal('circunferencia_brazos', 5, 2)->nullable();
            $table->decimal('circunferencia_piernas', 5, 2)->nullable();
            $table->text('notas')->nullable();
            $table->unique(['usuario_id', 'fecha']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medidas_corporales');
    }
};
