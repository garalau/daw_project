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
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id') // Relación con la tabla de usuarios
                  ->constrained('users')
                  ->onDelete('cascade');
            $table->string('nombre'); 
            $table->text('descripcion'); 
            $table->foreignId('especie_id') // Relación con la tabla especies_coniferas
                  ->constrained('especies_coniferas')
                  ->onDelete('cascade');
            $table->float('altura'); // Altura introducida por el usuario
            $table->float('diametro')->nullable(); // Diámetro (si es necesario)
            $table->float('valor_y'); // Valor de "y" calculado
            $table->float('valor_final'); // Valor final calculado
            $table->text('notas')->nullable(); // Notas adicionales (opcional)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyectos');
    }
};
