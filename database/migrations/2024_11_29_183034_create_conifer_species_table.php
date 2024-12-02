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
        Schema::create('conifer_species', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nombre de la especie
            $table->enum('longevity', ['pocoLongeva', 'medio', 'longeva']); // Longevidad
            $table->enum('growth_rate', ['lento', 'medio', 'rapido']); // Velocidad de crecimiento
            $table->enum('group_name', ['A', 'B', 'C', 'D', 'E', 'F']); // Grupo de especie
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conifer_species');
    }
};
