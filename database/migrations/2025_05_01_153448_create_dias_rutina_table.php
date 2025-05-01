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
        Schema::create('dias_rutina', function (Blueprint $table) {
            $table->id('dia_id');
            $table->foreignId('rutina_id')->constrained('rutinas')->onDelete('cascade');
            $table->string('nombre', 50);
            $table->integer('orden');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dias_rutina');
    }
};
