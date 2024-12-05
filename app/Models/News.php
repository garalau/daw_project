<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    //columnas que se pueden rellenar automáticamente con asignacion masiva
    protected $fillable = ['title', 'description', 'content', 'image'];

}
