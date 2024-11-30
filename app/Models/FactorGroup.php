<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactorGroup extends Model
{
    protected $table = 'factor_groups';

    // Relación de uno a muchos con 'conifer_species'
    public function coniferSpecies()
    {
        return $this->belongsTo(ConiferSpecies::class, 'group_name', 'group_name');
    }
    
    
    
    // Has Factory sirve para crear datos ficticios para hacer pruebas unitarias
    use HasFactory;
}
