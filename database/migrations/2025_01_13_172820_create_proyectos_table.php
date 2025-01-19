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
            $table->float('altura'); 
            $table->enum('tamano_fotosintetico', ['excelente', 'buena', 'media', 'regular', 'poca', 'escasa']);
        $table->enum('estado_sanitario', ['excelente', 'buena', 'media', 'regular', 'poca', 'escasa']);
        $table->enum('expectativa_vida', ['excelente', 'buena', 'media', 'regular', 'poca', 'escasa']);
        $table->enum('estetico_funcional', ['excelente', 'buena', 'media', 'regular', 'poca', 'escasa']);
        $table->enum('representatividad_rareza', ['excelente', 'buena', 'media', 'regular', 'poca', 'escasa']);
        $table->enum('situacion', ['excelente', 'buena', 'media', 'regular', 'poca', 'escasa']);
        $table->enum('factores_extraordinarios', ['excelente', 'buena', 'media', 'regular', 'poca', 'escasa']);
            $table->float('valor_y'); 
            $table->float('valor_intrinseco');
            $table->float('valor_extrinseco');
            $table->float('valor_final');  
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
