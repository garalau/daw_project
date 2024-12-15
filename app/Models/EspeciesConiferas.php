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


    //RELACION CON REGISTROS PROYECTOS. TODAVIA NO FUNCIONA
    public function registrosProyectos()
    {
        return $this->hasMany(RegistrosProyectos::class, 'especie_id');
    }

}
