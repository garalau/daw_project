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
        Schema::create('tree_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('conifer_species_id'); // Relación con la especie
            $table->float('height'); // Altura del árbol
            $table->float('width'); // Anchura del árbol
            $table->float('calculated_value'); // Valor calculado basado en la especie, altura y grupo
            $table->foreign('conifer_species_id')->references('id')->on('conifer_species')->onDelete('cascade'); // Clave foránea con la tabla 'conifer_species'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tree_values');
    }
};
