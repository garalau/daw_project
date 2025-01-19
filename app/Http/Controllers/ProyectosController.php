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
            'estado_sanitario' => 'required|string',
        'expectativa_vida' => 'required|string',
        'estetico_funcional' => 'required|string',
        'representatividad_rareza' => 'required|string',
        'situacion' => 'required|string',
        'factores_extraordinarios' => 'nullable|string',
            'valor_intrinseco' => 'required|numeric',
            'valor_extrinseco' => 'required|numeric',
            'valor_final' => 'required|numeric',
        ]);

        Proyecto::create([
            'user_id' => auth()->id(),
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'especie_id' => $request->especie_id,
            'altura' => $request->altura,
            'valor_y' => $request->valor_y,
            'tamano_fotosintetico' => $request->tamano_fotosintetico,
            'estado_sanitario' => $request->estado_sanitario,
            'expectativa_vida' => $request->expectativa_vida,
            'estetico_funcional' => $request->estetico_funcional,
            'representatividad_rareza' => $request->representatividad_rareza,
            'situacion' => $request->situacion,
            'factores_extraordinarios' => $request->factores_extraordinarios,
            'valor_intrinseco' => $request->valor_intrinseco,
            'valor_extrinseco' => $request->valor_extrinseco,
            'valor_final' => $request->valor_final,
        ]);
        

        return response()->json(['success' => true, 'message' => 'Proyecto guardado con éxito.']);

        //return redirect()->route('proyectos.index')->with('success', 'Proyecto guardado con éxito.');
    }

}
