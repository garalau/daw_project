<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConiferSpecies extends Model
{
    protected $table = 'conifer_species';

    // Campos que se pueden rellenar masivamente usando Tinker
  /*  protected $fillable = [
        'name', 
        'longevity', 
        'growth_rate', 
        'group_name'
    ];*/


    // Relación de uno a muchos con 'tree_values'
    public function treeValues()
    {
        return $this->hasMany(TreeValue::class);
    }

    // Relación de uno a muchos con 'factor_groups', pero primero debes asociar la especie con su grupo.
    public function factorGroups()
    {
        return $this->hasMany(FactorGroup::class, 'group_name', 'group_name');
    }
    
    
    // Has Factory sirve para crear datos ficticios para hacer pruebas unitarias
    
    use HasFactory;
}
