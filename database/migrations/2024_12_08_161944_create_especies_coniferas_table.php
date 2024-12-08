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
        Schema::create('especies_coniferas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_cientifico'); // Nombre científico de la especie
            $table->enum('grupo', ['B', 'C', 'D', 'E']); // Grupo de la especie
            $table->enum('longevidad', ['PocoLongeva', 'Longeva']); // Longevidad de la especie
            $table->enum('velocidad_crecimiento',['lenta','media','rapida']);//Velocidad de crecimiento
            $table->float('k_factor'); // Factor máximo (k)
            $table->float('xi_factor'); // Punto de inflexión (xi)
            $table->float('b_factor'); // Pendiente de la curva logística (b)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('especies_coniferas');
    }
};
