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
        Schema::create('valores_y', function (Blueprint $table) {
            $table->id();
            $table->enum('grupo', ['B', 'C', 'D', 'E']); // Grupo de la conífera
            $table->float('altura_min'); // Altura mínima del rango
            $table->float('altura_max'); // Altura máxima del rango
            $table->float('valor_y'); // Valor de "y" asociado
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('valores_y');
    }
};
