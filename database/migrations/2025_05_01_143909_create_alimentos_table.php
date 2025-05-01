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
        Schema::create('alimentos', function (Blueprint $table) {
            $table->id('alimento_id');
            $table->string('nombre', 100);
            $table->string('categoria', 50)->nullable();
            $table->integer('calorias')->nullable();
            $table->decimal('proteinas', 5, 2)->nullable();
            $table->decimal('carbohidratos', 5, 2)->nullable();
            $table->decimal('grasas', 5, 2)->nullable();
            $table->decimal('fibra', 5, 2)->nullable();
            $table->decimal('azucares', 5, 2)->nullable();
            $table->decimal('sodio', 5, 2)->nullable();
            $table->string('imagen_url', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alimentos');
    }
};
