<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    /**
     * La tabla asociada al modelo.
     *
     * @var string
     */
    protected $table = 'proyectos';

    /**
     * Los atributos que se pueden asignar de manera masiva.
     *
     * @var array
     */

     protected $fillable = [
        'user_id',
        'nombre',
        'descripcion',
        'especie_id',
        'altura',
        'valor_y',
        'tamano_fotosintetico',
        'estado_sanitario',
        'expectativa_vida',
        'estetico_funcional',
        'representatividad_rareza',
        'situacion',
        'factores_extraordinarios',
        'valor_intrinseco',
        'valor_extrinseco',
        'valor_final',
    ];
    

    /**
     * Relación con el modelo User (Usuario).
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relación con el modelo EspeciesConiferas (Especie).
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function especie()
    {
        return $this->belongsTo(EspeciesConiferas::class, 'especie_id');
    }
}
