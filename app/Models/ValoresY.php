<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ValoresY extends Model
{
    use HasFactory;
    
    protected $table = 'valores_y';

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'grupo',
        'altura_min',
        'altura_max',
        'valor_y',
    ];
}
