<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProyectosController extends Controller
{
    // Muestra el formulario para crear un nuevo proyecto
    public function create()
    {
        return view('proyectos.create');
    }

    // Muestra la lista de proyectos
    public function index()
    {
        return view('proyectos.index');
    }

    // Muestra los proyectos en la papelera
    public function trash()
    {
        return view('proyectos.trash');
    }
}
