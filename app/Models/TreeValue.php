<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreeValue extends Model
{
    protected $table = 'tree_values';

    // Relación de muchos a uno con 'conifer_species'
    public function coniferSpecies()
    {
        return $this->belongsTo(ConiferSpecies::class);
    }
    
    
    
    // Has Factory sirve para crear datos ficticios para hacer pruebas unitarias
    use HasFactory;
}
