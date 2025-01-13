<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;

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

     // Muestra el foro
     public function forum()
     {
         return view('proyectos.forum');
     }

     public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'especie_id' => 'required|exists:especies_coniferas,id',
            'altura' => 'required|numeric|min:0',
            'valor_y' => 'required|numeric',
            'valor_final' => 'required|numeric',
        ]);

        $proyecto = new Proyecto();
        $proyecto->nombre = $request->nombre;
        $proyecto->descripcion = $request->descripcion;
        $proyecto->user_id = auth()->id(); // Guardar el ID del usuario autenticado
        $proyecto->especie_id = $request->especie_id; // Guardar el ID de la especie
        $proyecto->altura = $request->altura; // Guardar la altura
        $proyecto->valor_y = $request->valor_y; // Guardar el valor 'y'
        $proyecto->valor_final = $request->valor_final; // Guardar el valor final
        $proyecto->save();

        return redirect()->route('proyectos.index')->with('success', 'Proyecto guardado con éxito.');
    }

}
