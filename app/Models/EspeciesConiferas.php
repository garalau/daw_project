<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EspeciesConiferas extends Model
{
    use HasFactory;


    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'nombre_cientifico',
        'grupo',
        'longevidad',
        'velocidad_crecimiento',
        'k_factor',
        'xi_factor',
        'b_factor',
    ];

    /**
     * Relación con el modelo Proyecto.
     * Una especie puede estar asociada a varios proyectos.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proyectos()
    {
        return $this->hasMany(Proyecto::class, 'especie_id');
    }
   

}
